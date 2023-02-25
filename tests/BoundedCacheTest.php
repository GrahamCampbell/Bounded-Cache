<?php

declare(strict_types=1);

/*
 * This file is part of Bounded Cache.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
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
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
class BoundedCacheTest extends TestCase
{
    use MockeryTrait;

    public function testCanConstruct(): void
    {
        self::assertInstanceOf(CacheInterface::class, new BoundedCache(Mockery::mock(CacheInterface::class), 5, 10));
    }

    public function testGet(): void
    {
        $m = Mockery::mock(CacheInterface::class);
        $m->shouldReceive('get')
            ->once()
            ->with('123', null)
            ->andReturn('qwertyuiop');

        $c = new BoundedCache($m, 0, 123);

        self::assertSame('qwertyuiop', $c->get('123'));
    }

    public function testSet(): void
    {
        $m = Mockery::mock(CacheInterface::class);
        $m->shouldReceive('set')
            ->once()
            ->with('123', 'abc', 4)
            ->andReturn(true);

        $c = new BoundedCache($m, 4, 123);

        self::assertTrue($c->set('123', 'abc'));
    }
}
