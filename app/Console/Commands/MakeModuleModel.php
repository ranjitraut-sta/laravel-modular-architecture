<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModuleModel extends Command
{
    // php artisan module:make-model Post Sample
    protected $signature = 'make:module-model {module} {name}';
    protected $description = 'Create a new model inside a module';

    public function handle()
    {
        $module = ucfirst($this->argument('module'));
        $name = ucfirst($this->argument('name'));
        $path = app_path("Modules/{$module}/Models");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $content = "<?php

        namespace App\Modules\\{$module}\Models;

        use Illuminate\Database\Eloquent\Model;

        class {$name} extends Model
        {
            protected \$guarded = [];
        }
        ";
        File::put("{$path}/{$name}.php", $content);

        $this->info("Model {$name} created in module {$module}.");
    }
}
