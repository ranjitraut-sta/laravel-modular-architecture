<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Scaffold a fully structured Laravel module with all stubs';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $lowerName = strtolower($name);
        $basePath = app_path("Modules/{$name}");

        $folders = [
            'Controllers',
            'DTOs',
            'Models',
            'Requests',
            'Resources/views',
            'Routes',
            'Providers',
            'Services/Interfaces',
            'Services/Implementations',
            'Repositories/Interfaces',
            'Repositories/Implementations',
            'Database/Migrations',
            'Traits',
            'Config',
        ];

        foreach ($folders as $folder) {
            File::makeDirectory("{$basePath}/{$folder}", 0755, true, true);
        }

        // Create stub files
        $this->createController($basePath, $name);
        $this->createServiceInterface($basePath, $name);
        $this->createServiceImpl($basePath, $name);
        $this->createRepoInterface($basePath, $name);
        $this->createRepoImpl($basePath, $name);
        $this->createDto($basePath, $name);
        $this->createProvider($basePath, $name);
        $this->createRoute($basePath, $name);
        $this->createView($basePath, $name);
        $this->createMigration($basePath, $name);
        $this->createModuleDatabaseSeeder($basePath, $name);
        $this->createTrait($basePath, $name);
        $this->createConfig($basePath, $name);
        $this->createAssets($basePath, $name);

        $this->info("Module '{$name}' scaffolded successfully.");
    }

    protected function createController($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\Controllers;

        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;
        use App\Modules\\$name\Services\Interfaces\\{$name}ServiceInterface;

        class {$name}Controller extends Controller
        {
            protected \$service;

            public function __construct({$name}ServiceInterface \$service)
            {
                \$this->service = \$service;
            }

            public function index()
            {
                \$data = \$this->service->getAll();
                return view('" . strtolower($name) . "::index', compact('data'));
            }
        }";
        File::put("$path/Controllers/{$name}Controller.php", $content);
    }

    protected function createServiceInterface($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\Services\Interfaces;

        interface {$name}ServiceInterface
        {
            public function getAll();
        }";
        File::put("$path/Services/Interfaces/{$name}ServiceInterface.php", $content);
    }

    protected function createServiceImpl($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\Services\Implementations;

        use App\Modules\\$name\Services\Interfaces\\{$name}ServiceInterface;
        use App\Modules\\$name\Repositories\Interfaces\\{$name}RepositoryInterface;

        class {$name}Service implements {$name}ServiceInterface
        {
            protected \$repo;

            public function __construct({$name}RepositoryInterface \$repo)
            {
                \$this->repo = \$repo;
            }

            public function getAll()
            {
                return \$this->repo->getAll();
            }
        }";
        File::put("$path/Services/Implementations/{$name}Service.php", $content);
    }

    protected function createRepoInterface($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\Repositories\Interfaces;

        interface {$name}RepositoryInterface
        {
            public function getAll();
        }";
        File::put("$path/Repositories/Interfaces/{$name}RepositoryInterface.php", $content);
    }

    protected function createRepoImpl($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\Repositories\Implementations;

        use App\Modules\\$name\Repositories\Interfaces\\{$name}RepositoryInterface;

        class {$name}Repository implements {$name}RepositoryInterface
        {
            public function getAll()
            {
                return []; // return model::all() later
            }
        }";
        File::put("$path/Repositories/Implementations/{$name}Repository.php", $content);
    }

    protected function createDto($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\DTOs;

        class {$name}DTO
        {
            public string \$example;

            public function __construct(string \$example)
            {
                \$this->example = \$example;
            }

            public static function fromArray(array \$data): self
            {
                return new self(
                    \$data['example'] ?? ''
                );
            }

            public function toArray(): array
            {
                return ['example' => \$this->example];
            }
        }";
        File::put("$path/DTOs/{$name}DTO.php", $content);
    }

    protected function createProvider($path, $name)
    {
        $lowerName = strtolower($name);
        $content = "<?php

        namespace App\Modules\\$name\Providers;

        use Illuminate\Support\ServiceProvider;
        use App\Modules\\$name\Services\Interfaces\\{$name}ServiceInterface;
        use App\Modules\\$name\Services\Implementations\\{$name}Service;
        use App\Modules\\$name\Repositories\Interfaces\\{$name}RepositoryInterface;
        use App\Modules\\$name\Repositories\Implementations\\{$name}Repository;

        class {$name}ServiceProvider extends ServiceProvider
        {
            public function register()
            {
                \$this->app->bind({$name}ServiceInterface::class, {$name}Service::class);
                \$this->app->bind({$name}RepositoryInterface::class, {$name}Repository::class);
                \$this->mergeConfigFrom(__DIR__ . '/../Config/{$lowerName}.php', '{$lowerName}');
            }

            public function boot()
            {
                \$this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
                \$this->loadViewsFrom(__DIR__ . '/../Resources/views', '{$lowerName}');
                \$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
                \$this->publishes([
                    __DIR__ . '/../Resources/assets' => public_path('modules/{$lowerName}'),
                    ], '{$lowerName}-assets');
                }
        }";
        File::put("$path/Providers/{$name}ServiceProvider.php", $content);
    }

    protected function createRoute($path, $name)
    {
        $lowerName = strtolower($name);
        $content = "<?php

        use Illuminate\Support\Facades\Route;
        use App\Modules\\$name\Controllers\\{$name}Controller;

        Route::get('/{$lowerName}', [{$name}Controller::class, 'index']);
        ";
        File::put("$path/Routes/web.php", $content);
    }

    protected function createView($path, $name)
    {
        $viewContent = "<h1>{$name} Module Index View</h1>\n<p>This is the {$name} module view loaded successfully.</p>";
        File::put("$path/Resources/views/index.blade.php", $viewContent);
    }

    protected function createMigration($path, $name)
    {
        $timestamp = date('Y_m_d_His');
        $migrationName = "create_" . strtolower($name) . "_table.php";
        $migrationDir = $path . "/Database/Migrations";

        if (!File::exists($migrationDir)) {
            File::makeDirectory($migrationDir, 0755, true);
        }

        $content = "<?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        class Create" . $name . "Table extends Migration
        {
            public function up()
            {
                Schema::create('" . strtolower($name) . "', function (Blueprint \$table) {
                    \$table->id();
                    \$table->string('example_field');
                    \$table->timestamps();
                });
            }

            public function down()
            {
                Schema::dropIfExists('" . strtolower($name) . "');
            }
        }
        ";

        $migrationPath = $migrationDir . "/{$timestamp}_{$migrationName}";
        File::put($migrationPath, $content);
    }

    protected function createModuleDatabaseSeeder($path, $name)
    {
        $seederDir = "{$path}/Database/Seeders";
        File::ensureDirectoryExists($seederDir);

        $content = "<?php

        namespace App\Modules\\$name\Database\Seeders;

        use Illuminate\Database\Seeder;
        use App\Modules\\$name\Database\Seeders\\{$name}Seeder;

        class DatabaseSeeder extends Seeder
        {
            public function run(): void
            {
                \$this->call([
                    {$name}Seeder::class,
                ]);
            }
        }";
        File::put("{$seederDir}/DatabaseSeeder.php", $content);
    }


    protected function createTrait($path, $name)
    {
        $content = "<?php

        namespace App\Modules\\$name\Traits;

        trait {$name}Trait
        {
            public function exampleTraitMethod()
            {
                // TODO: implement your module specific trait logic
            }
        }";
        File::put("$path/Traits/{$name}Trait.php", $content);
    }


    protected function createConfig($path, $name)
    {
        $lowerName = strtolower($name);

        $content = "<?php

        return [
            'module_name' => '{$name}',
            'version' => '1.0.0',
            'enabled' => true,
            // add your module-specific config here
        ];";

        File::put("$path/Config/{$lowerName}.php", $content);
    }


    protected function createAssets($path, $name)
    {
        $assetsPath = $path . '/Resources/assets';

        $cssPath = $assetsPath . '/css';
        $jsPath = $assetsPath . '/js';
        $imagesPath = $assetsPath . '/images';

        File::makeDirectory($cssPath, 0755, true);
        File::makeDirectory($jsPath, 0755, true);
        File::makeDirectory($imagesPath, 0755, true);

        // Create basic CSS file
        $cssContent = "/* Basic styles for {$name} module */\n\nbody { font-family: Arial, sans-serif; }";
        File::put($cssPath . '/style.css', $cssContent);

        // Create basic JS file
        $jsContent = "// Basic JS for {$name} module\nconsole.log('{$name} module loaded');";
        File::put($jsPath . '/app.js', $jsContent);

        // Create a placeholder image (optional)
        // You can copy a placeholder or leave empty for now
    }


}
