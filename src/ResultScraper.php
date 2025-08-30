<?php

declare(strict_types=1);

namespace BOA\Results;

use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ResultScraper
{
    /**
     * @psalm-param \BOA\Results\ScraperInterface $scraper
     *
     * @param \BOA\Results\ScraperInterface $scraper
     */
    public function __construct(private readonly ScraperInterface $scraper)
    {
        //
    }

    /**
     * @psalm-param \Carbon\CarbonInterface|string $date
     * @psalm-return ScrapedStadiumRaces
     *
     * @param \Carbon\CarbonInterface|string $date
     * @return array
     */
    public function scrape(CarbonInterface|string $date = 'today'): array
    {
        $date = Carbon::parse($date, 'Asia/Tokyo');
        /** @psalm-var ScrapedStadiumRaces $results */
        $results = $this->scraper->scrapeResults($date);
        return $this->normalize($results);
    }

    /**
     * @psalm-param ScrapedStadiumRaces $results
     * @psalm-return ScrapedStadiumRaces
     *
     * @param array $results
     * @return array
     */
    private function normalize(array $results): array
    {
        $newResults = [];

        foreach (array_values($results) as $data) {
            foreach (array_values($data) as $result) {
                $result['boats'] = isset($result['boats']) ? array_values($result['boats']) : [];

                $payoutKeys = ['trifecta', 'trio', 'exacta', 'quinella', 'quinella_place', 'win', 'place'];
                foreach ($payoutKeys as $key) {
                    $result['payouts'][$key] = isset($result['payouts'][$key])
                        ? array_values($result['payouts'][$key])
                        : [];
                }

                $newResults[] = $result;
            }
        }

        /** @psalm-var ScrapedStadiumRaces */
        return $newResults;
    }
}
