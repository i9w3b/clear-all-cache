<?php

namespace I9w3b\ClearAllCache;

use Illuminate\Support\Facades\Facade;

class ClearAllCacheFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'clearallcache';
    }
}
