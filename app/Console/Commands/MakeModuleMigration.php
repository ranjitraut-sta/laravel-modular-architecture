<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModuleMigration extends Command
{
    // php artisan make:module-migration Post create_posts_table
    protected $signature = 'make:module-migration {module} {name}';
    protected $description = 'Create a new migration inside a module';

    public function handle()
    {
        $module = ucfirst($this->argument('module'));
        $name = $this->argument('name');
        $timestamp = date('Y_m_d_His');
        $filename = "{$timestamp}_{$name}.php";
        $path = app_path("Modules/{$module}/Database/Migrations");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true, true);
        }

        $className = Str::studly($name);

        $content = "<?php

            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            return new class extends Migration
            {
                public function up(): void
                {
                    Schema::create('replace_this_table', function (Blueprint \$table) {
                        \$table->id();
                        \$table->timestamps();
                    });
                }

                public function down(): void
                {
                    Schema::dropIfExists('replace_this_table');
                }
            };
            ";

        File::put("{$path}/{$filename}", $content);
        $this->info("Migration {$filename} created in module {$module}.");
    }
}
