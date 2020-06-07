<?php

namespace I9w3b\ClearAllCache\Commands;

use Illuminate\Console\Command;

class ClearAllCacheCommand extends Command
{
    public $signature = 'clearall';

    public $description = 'Limpar todos os arquivos em cache';

    public function handle()
    {
        
        $content = file_get_contents(base_path('composer.json'));
        $content = json_decode($content,true);

        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('cache:clear');
        $this->call('optimize:clear');
       
        foreach ($content['require-dev'] as $key => $value) {
            if ($key === 'barryvdh/laravel-debugbar') {
                $this->call('debugbar:clear');
            }
        }

        system('composer dump-autoload');
    }
}
