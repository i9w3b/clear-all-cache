<?php

declare(strict_types=1);

namespace I9w3b\ClearAllCache;

use PHPUnit\Framework\TestCase;

class ClearAllCacheTest extends TestCase
{
    /**
     * @var ClearAllCache
     */
    protected $clearallcache;

    protected function setUp() : void
    {
        $this->clearallcache = new ClearAllCache;
    }

    public function testIsInstanceOfClearAllCache() : void
    {
        $actual = $this->clearallcache;
        $this->assertInstanceOf(ClearAllCache::class, $actual);
    }
}
