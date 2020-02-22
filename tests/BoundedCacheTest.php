<?php

declare(strict_types=1);

/*
 * This file is part of Bounded Cache.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\BoundedCache;

use GrahamCampbell\BoundedCache\BoundedCache;
use GrahamCampbell\TestBenchCore\MockeryTrait;
use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\CacheInterface;

/**
 * This is the bounded test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class BoundedCacheTest extends TestCase
{
    use MockeryTrait;

    public function testCanConstruct()
    {
        $this->assertInstanceOf(CacheInterface::class, new BoundedCache(Mockery::mock(CacheInterface::class), 5, 10));
    }
}
