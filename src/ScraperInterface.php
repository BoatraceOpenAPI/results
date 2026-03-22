<?php

declare(strict_types=1);

namespace BOA\Results;

use Carbon\CarbonInterface;

/**
 * @psalm-type ScrapedBoat = array{
 *     racer_boat_number: int,
 *     racer_course_number: ?int,
 *     racer_start_timing: ?float,
 *     racer_place_number: ?int,
 *     racer_number: ?int,
 *     racer_name: ?string
 * }
 * @psalm-type ScrapedBetPayout = array{
 *     combination: string,
 *     amount: int
 * }
 * @psalm-type ScrapedPayouts = array{
 *     trifecta: array<int, ScrapedBetPayout>,
 *     trio: array<int, ScrapedBetPayout>,
 *     exacta: array<int, ScrapedBetPayout>,
 *     quinella: array<int, ScrapedBetPayout>,
 *     quinella_place: array<int, ScrapedBetPayout>,
 *     win: array<int, ScrapedBetPayout>,
 *     place: array<int, ScrapedBetPayout>
 * }
 * @psalm-type ScrapedRace = array{
 *     date: string,
 *     stadium_number: int,
 *     number: int,
 *     wind_speed: ?int,
 *     wind_direction_number: ?int,
 *     wave_height: ?int,
 *     weather_number: ?int,
 *     air_temperature: ?int,
 *     water_temperature: ?int,
 *     technique_number: ?int,
 *     boats: array<int, ScrapedBoat>,
 *     payouts: ScrapedPayouts
 * }
 * @psalm-type ScrapedRaces = array<int, ScrapedRace>
 * @psalm-type ScrapedStadiumRaces = array<int, ScrapedRaces>
 *
 * @author shimomo
 */
interface ScraperInterface
{
    /**
     * @psalm-param \Carbon\CarbonInterface $date
     * @psalm-return ScrapedStadiumRaces
     *
     * @param \Carbon\CarbonInterface $date
     * @return array
     */
    public function scrapeResults(CarbonInterface $date): array;
}
