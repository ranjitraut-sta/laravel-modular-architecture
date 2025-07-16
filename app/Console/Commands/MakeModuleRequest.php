<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModuleRequest extends Command
{
    // php artisan make:module-request Post StorePostRequest
    protected $signature = 'make:module-request {module} {name}';
    protected $description = 'Create a new form request inside a module';

    public function handle()
    {
        $module = ucfirst($this->argument('module'));
        $name = ucfirst($this->argument('name'));
        $path = app_path("Modules/{$module}/Requests");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $content = "<?php

        namespace App\Modules\\{$module}\Requests;

        use Illuminate\Foundation\Http\FormRequest;

        class {$name} extends FormRequest
        {
            public function authorize(): bool
            {
                return true;
            }

            public function rules(): array
            {
                return [
                    // 'field' => 'required|string|max:255',
                ];
            }
        }
        ";
        File::put("{$path}/{$name}.php", $content);
        $this->info("Request {$name} created in module {$module}.");
    }
}
