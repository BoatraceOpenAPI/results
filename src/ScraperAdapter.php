<?php

declare(strict_types=1);

namespace BOA\Results;

use BVP\Scraper\Scraper;
use Carbon\CarbonInterface;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ScraperAdapter implements ScraperInterface
{
    /**
     * @psalm-param \BVP\Scraper\Scraper $scraper
     *
     * @param \BVP\Scraper\Scraper $scraper
     */
    public function __construct(private readonly Scraper $scraper)
    {
        //
    }

    /**
     * @psalm-param \Carbon\CarbonInterface $date
     * @psalm-return ScrapedStadiumRaces
     *
     * @param \Carbon\CarbonInterface $date
     * @return array
     */
    #[\Override]
    public function scrapeResults(CarbonInterface $date): array
    {
        /** @psalm-var ScrapedStadiumRaces */
        return $this->scraper->scrapeResults($date);
    }
}
