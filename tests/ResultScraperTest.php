<?php

declare(strict_types=1);

namespace BOA\Results\Tests;

use BOA\Results\ResultScraper;
use BOA\Results\ScraperInterface;
use Carbon\CarbonImmutable as Carbon;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ResultScraperTest extends TestCase
{
    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testScrape(): void
    {
        $mockScraper = $this->createMock(ScraperInterface::class);
        $mockScraper->method('scrapeResults')
            ->with(Carbon::create(2025, 7, 15))
            ->willReturn([
                $this->testScrapeData(0),
            ]);
        $scraper = new ResultScraper($mockScraper);
        $results = $scraper->scrape(Carbon::create(2025, 7, 15));
        $this->assertSame($this->testScrapeData(0), $results);
    }

    /**
     * @psalm-param int $keyIndex
     * @psalm-return ScrapedStadiumRaces
     *
     * @param int $keyIndex
     * @return array
     */
    private function testScrapeData(int $keyIndex): array
    {
        return [
            $keyIndex => [
                'date' => '2025-07-15',
                'stadium_number' => 1,
                'number' => 1,
                'wind_speed' => 4,
                'wind_direction_number' => 10,
                'wave_height' => 3,
                'weather_number' => 2,
                'air_temperature' => 26,
                'water_temperature' => 27,
                'technique_number' => 1,
                'boats' => [
                    $keyIndex => [
                        'racer_boat_number' => 1,
                        'racer_course_number' => 1,
                        'racer_start_timing' => 0.22,
                        'racer_place_number' => 1,
                        'racer_number' => 3860,
                        'racer_name' => '松本 浩貴',
                    ],
                ],
                'payouts' => [
                    'trifecta' => [
                        $keyIndex => [
                            'combination' => "1-5-3",
                            'amount' => 12690,
                        ],
                    ],
                    'trio' => [
                        $keyIndex => [
                            'combination' => '1=3=5',
                            'amount' => 2110,
                        ],
                    ],
                    'exacta' => [
                        $keyIndex => [
                            'combination' => '1-5',
                            'amount' => 1860,
                        ],
                    ],
                    'quinella' => [
                        $keyIndex => [
                            'combination' => '1=5',
                            'amount' => 1190,
                        ],
                    ],
                    'quinella_place' => [
                        $keyIndex => [
                            'combination' => '1=5',
                            'amount' => 690,
                        ],
                        $keyIndex + 1 => [
                            'combination' => '1=3',
                            'amount' => 740,
                        ],
                        $keyIndex + 2 => [
                            'combination' => '3=5',
                            'amount' => 1160,
                        ],
                    ],
                    'win' => [
                        $keyIndex => [
                            'combination' => '1',
                            'amount' => 290,
                        ],
                    ],
                    'place' => [
                        $keyIndex => [
                            'combination' => '1',
                            'amount' => 320,
                        ],
                        $keyIndex + 1 => [
                            'combination' => '5',
                            'amount' => 260,
                        ],
                    ],
                ],
            ],
        ];
    }
}
