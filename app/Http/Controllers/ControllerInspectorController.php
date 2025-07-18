<?php
namespace App\Http\Controllers;

use App\Modules\UserManagement\Models\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ReflectionClass;

class ControllerInspectorController extends Controller
{
    // http://127.0.0.1:8000/controllerName/get

    public function getControllerMethods($controller)
    {
        $controllerName = Str::finish($controller, 'Controller');
        $basePath = app_path('Modules'); // app/Modules vitra khojna

        $controllerFile = collect(File::allFiles($basePath))
            ->first(function ($file) use ($controllerName) {
                return Str::endsWith($file->getFilename(), $controllerName . '.php');
            });

        if (!$controllerFile) {
            return response()->json(['error' => 'Controller not found'], 404);
        }

        // Namespace generate garne
        $relativePath = Str::replaceFirst(app_path(), 'App', $controllerFile->getPathname());
        $class = str_replace(['/', '.php'], ['\\', ''], $relativePath);

        try {
            if (!class_exists($class)) {
                return response()->json(['error' => 'Class not found: ' . $class], 404);
            }

            $reflection = new ReflectionClass($class);
            $methods = collect($reflection->getMethods(\ReflectionMethod::IS_PUBLIC))
                ->filter(fn($method) => $method->class === $class && !$method->isConstructor())
                ->pluck('name');

            // Permission table ma insert
            $inserted = [];
            foreach ($methods as $method) {
                $permission = [
                    'name' => Str::headline($method),
                    'action' => $method,
                    'controller' => class_basename($class),
                    'group_name' => Str::headline(class_basename($class)), // optional
                ];

                // Check if exists
                $exists = Permission::where('action', $method)
                    ->where('controller', class_basename($class))
                    ->exists();

                if (!$exists) {
                    Permission::create($permission);
                    $inserted[] = $permission;
                }
            }

            return response()->json([
                'controller' => $class,
                'methods' => $methods->values(),
                'inserted_permissions' => $inserted
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
