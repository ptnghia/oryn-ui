<?php

namespace Oryn\UI\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    protected $signature = 'oryn-ui:publish
                            {--config : Publish config file only}
                            {--views : Publish views only}
                            {--assets : Publish CSS/JS assets only}
                            {--force : Overwrite existing files}';

    protected $description = 'Publish Oryn UI package resources';

    public function handle(): int
    {
        $force = $this->option('force');
        $published = false;

        if ($this->option('config') || $this->noSpecificOption()) {
            $this->call('vendor:publish', [
                '--tag' => 'oryn-ui-config',
                '--force' => $force,
            ]);
            $published = true;
        }

        if ($this->option('views') || $this->noSpecificOption()) {
            $this->call('vendor:publish', [
                '--tag' => 'oryn-ui-views',
                '--force' => $force,
            ]);
            $published = true;
        }

        if ($this->option('assets') || $this->noSpecificOption()) {
            $this->call('vendor:publish', [
                '--tag' => 'oryn-ui-assets',
                '--force' => $force,
            ]);
            $published = true;
        }

        if ($published) {
            $this->info('Oryn UI resources published successfully.');
        }

        return self::SUCCESS;
    }

    protected function noSpecificOption(): bool
    {
        return ! $this->option('config')
            && ! $this->option('views')
            && ! $this->option('assets');
    }
}
