<?php

declare(strict_types=1);

namespace BOA\Results;

use Carbon\CarbonInterface;

/**
 * @psalm-type ScrapedBoat = array{
 *     racer_boat_number: int,
 *     racer_course_number: int|null,
 *     racer_start_timing: float|null,
 *     racer_place_number: int|null,
 *     racer_number: int|null,
 *     racer_name: string|null
 * }
 * @psalm-type ScrapedBetPayout = array{
 *     combination: string,
 *     payout: int
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
 *     race_date: string,
 *     race_stadium_number: int,
 *     race_number: int,
 *     race_wind: int|null,
 *     race_wind_direction_number: int|null,
 *     race_wave: int|null,
 *     race_weather_number: int|null,
 *     race_temperature: int|null,
 *     race_water_temperature: int|null
 *     race_technique_number: int|null,
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
