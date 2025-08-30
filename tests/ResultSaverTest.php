<?php

declare(strict_types=1);

namespace BOA\Results\Tests;

use BOA\Results\ResultSaver;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ResultSaverTest extends TestCase
{
    /**
     * @psalm-var non-empty-string
     *
     * @var string
     */
    private string $tempDir;

    /**
     * @psalm-return void
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->tempDir = sys_get_temp_dir() . '/program_saver_test_' . bin2hex(random_bytes(8));
        if (!mkdir($this->tempDir, 0755, true) && !is_dir($this->tempDir)) {
            $this->fail('Failed to create temp dir: ' . $this->tempDir);
        }
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    protected function tearDown(): void
    {
        if (is_dir($this->tempDir)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->tempDir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $file) {
                $file->isDir() ? rmdir($file->getRealPath()) : unlink($file->getRealPath());
            }

            rmdir($this->tempDir);
        }
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testSave(): void
    {
        $saver = new ResultSaver();
        $path = $this->tempDir . '/results.json';

        $results = [
            [
                'race_date' => '2025-07-15',
                'race_stadium_number' => 1,
                'race_number' => 1,
                'race_wind' => 4,
                'race_wind_direction_number' => 10,
                'race_wave' => 3,
                'race_weather_number' => 2,
                'race_temperature' => 26,
                'race_water_temperature' => 27,
                'race_technique_number' => 1,
                'boats' => [
                    [
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
                        [
                            'combination' => "1-5-3",
                            'payout' => 12690,
                        ],
                    ],
                    'trio' => [
                        [
                            'combination' => '1=3=5',
                            'payout' => 2110,
                        ],
                    ],
                    'exacta' => [
                        [
                            'combination' => '1-5',
                            'payout' => 1860,
                        ],
                    ],
                    'quinella' => [
                        [
                            'combination' => '1=5',
                            'payout' => 1190,
                        ],
                    ],
                    'quinella_place' => [
                        [
                            'combination' => '1=5',
                            'payout' => 690,
                        ],
                        [
                            'combination' => '1=3',
                            'payout' => 740,
                        ],
                        [
                            'combination' => '3=5',
                            'payout' => 1160,
                        ],
                    ],
                    'win' => [
                        [
                            'combination' => '1',
                            'payout' => 290,
                        ],
                    ],
                    'place' => [
                        [
                            'combination' => '1',
                            'payout' => 320,
                        ],
                        [
                            'combination' => '5',
                            'payout' => 260,
                        ],
                    ],
                ],
            ],
        ];

        $saver->save($results, $path);

        $this->assertFileExists($path);

        $content = json_decode(file_get_contents($path), true);
        $this->assertArrayHasKey('results', $content);
        $this->assertSame($results, $content['results']);
    }
}
