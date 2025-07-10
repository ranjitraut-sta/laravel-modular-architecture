<?php

namespace App\Core\Services\Interface;

use Illuminate\Http\Request;

interface FileUploadServiceInterface
{
    public function upload(
        Request $request,
        string $field,
        string $uploadKey,
        bool $public,
        ?string $oldFilename,
        ?string $id
    ): ?string;
   public function trashOldFileIfExists(string $uploadKey, string $filename, string $id, bool $public): void;
   public function deleteFile(string $folder, string $filename, bool $public): bool;
   public function clearTempFiles(array $fields);
}
