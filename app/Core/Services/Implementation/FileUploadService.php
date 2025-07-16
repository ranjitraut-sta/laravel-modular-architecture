<?php

namespace App\Core\Services\Implementation;

use App\Core\Services\Interface\FileUploadServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;

class FileUploadService implements FileUploadServiceInterface
{
    protected array $uploadPaths;

    public function __construct()
    {
        $this->uploadPaths = \App\Constants\UploadPaths::PATHS;
    }

    /**
     * Upload a file from request field using config key.
     */
    public function upload(
        Request $request,
        string $field,
        string $uploadKey,
        bool $public = true,
        ?string $oldFilename = null,
        ?string $id = null
    ): ?string {
        if (!$request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);

        $config = $this->uploadPaths[$uploadKey] ?? null;

        if (!$config || !isset($config['path'], $config['prefix'])) {
            throw new InvalidArgumentException("Invalid upload key: {$uploadKey}");
        }

        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
        $disk = Storage::disk($public ? 'public' : config('filesystems.default'));

        $filename = time() . '_' . $config['prefix'] . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Move old file to trash if needed
        if ($oldFilename) {
            $this->moveToTrash($config['path'], $oldFilename, $id, $public);
        }

        $disk->putFileAs($config['path'], $file, $filename);

        return $filename;
    }

    /**
     * Move an old file to a trash/archive folder.
     */
    public function moveToTrash(
        string $folder,
        string $filename,
        ?string $id = null,
        bool $public = false
    ): bool {
        $disk = Storage::disk($public ? 'public' : config('filesystems.default'));

        $originalPath = $folder . '/' . $filename;
        $trashPath = $folder . '/trash/' . ($id ?? 'unknown') . '/' . $filename;

        if ($disk->exists($originalPath)) {
            return $disk->move($originalPath, $trashPath);
        }

        return false;
    }

    public function trashOldFileIfExists(string $uploadKey, string $filename, string $id, bool $public = true): void
    {
        $config = $this->uploadPaths[$uploadKey] ?? null;

        if (!$config || !isset($config['path'])) {
            throw new InvalidArgumentException("Invalid upload key: {$uploadKey}");
        }

        if (!empty($filename)) {
            $this->moveToTrash($config['path'], $filename, $id, $public);
        }
    }


    /**
     * Delete a file permanently.
     */
    public function deleteFile(string $folder, string $filename, bool $public = false): bool
    {
        $disk = Storage::disk($public ? 'public' : config('filesystems.default'));
        return $disk->delete($folder . '/' . $filename);
    }

    // clear temp files

    public function clearTempFiles(array $fields)
    {
        foreach ($fields as $field) {
            $tempKey = $field . '_temp_path';

            if (session()->has($tempKey)) {
                $tempPath = session($tempKey);
                $storage = Storage::disk('public');

                if ($storage->exists($tempPath)) {
                    $storage->delete($tempPath);
                }

                session()->forget($tempKey);
            }
        }

    }

}
