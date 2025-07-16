<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveModule extends Command
{
    protected $signature = 'module:remove {name}';
    protected $description = 'Remove a Laravel module completely from app/Modules';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $modulePath = app_path("Modules/{$name}");

        if (!File::exists($modulePath)) {
            $this->error("Module '{$name}' does not exist at {$modulePath}");
            return;
        }

        // Confirmation prompt
        if (! $this->confirm("Are you sure you want to delete the '{$name}' module? This action is irreversible.")) {
            $this->info("Operation cancelled.");
            return;
        }

        File::deleteDirectory($modulePath);

        $this->info("Module '{$name}' has been removed successfully.");
    }
}
