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

use DateInterval;
use GrahamCampbell\BoundedCache\TtlHelper;
use PHPUnit\Framework\TestCase;

/**
 * This is the TTL helper test class.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
class TtlHelperTest extends TestCase
{
    /**
     * @dataProvider provideTtlCases
     */
    public function testComputeTtl(int $min, int $max, null|int|DateInterval $ttl, int $expected): void
    {
        self::assertSame($expected, TtlHelper::computeTtl($min, $max, $ttl));
    }

    public static function provideTtlCases(): array
    {
        return [
            [5, 30, 123, 30],
            [5, 30, 2, 5],
            [2, 3000, null, 2],
            [50, 300, new DateInterval('P0Y0DT0H2M'), 120],
            [50, 300, new DateInterval('P0Y0DT10H0M'), 300],
        ];
    }
}
