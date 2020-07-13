<?php

namespace I9w3b\ClearAllCache\Commands;

use Illuminate\Console\Command;

class ClearAllCacheCommand extends Command
{
    public $signature = 'clearall';

    public $description = 'Limpar todos os arquivos em cache';

    public function handle()
    {
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('cache:clear');
        $this->call('optimize:clear');
        $this->terminalCommand();
    }

    public function terminalCommand()
    {
        $output = shell_exec('cd ' . base_path() . ' && composer show --format=json');
        $dependencies = json_decode($output, true)['installed'];
        foreach ($dependencies as $composer) {
            if ($composer['name'] === 'barryvdh/laravel-debugbar') {
                $this->call('debugbar:clear');
            }
        }
        system('composer dump-autoload');
    }
}

