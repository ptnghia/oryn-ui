<?php

namespace Oryn\UI\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'oryn-ui:install
                            {--force : Overwrite existing files}';

    protected $description = 'Install Oryn UI package assets and configuration';

    public function handle(): int
    {
        $this->info('Installing Oryn UI...');

        $this->call('vendor:publish', [
            '--tag' => 'oryn-ui-config',
            '--force' => $this->option('force'),
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'oryn-ui-assets',
            '--force' => $this->option('force'),
        ]);

        $this->updateAppCss();

        $this->info('Oryn UI installed successfully.');
        $this->newLine();
        $this->line('Next steps:');
        $this->line('  1. Add Alpine.js to your app.js (if not already installed)');
        $this->line('  2. Import oryn-ui.css in your app.css');
        $this->line('  3. Run: npm install && npm run build');

        return self::SUCCESS;
    }

    protected function updateAppCss(): void
    {
        $cssPath = resource_path('css/app.css');

        if (! file_exists($cssPath)) {
            return;
        }

        $contents = file_get_contents($cssPath);
        $import = "@import '../../vendor/oryn/ui/resources/css/oryn-ui.css';";

        if (str_contains($contents, 'oryn-ui')) {
            return;
        }

        file_put_contents($cssPath, $import . "\n" . $contents);
        $this->info('Added Oryn UI import to app.css');
    }
}
