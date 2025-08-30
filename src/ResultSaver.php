<?php

declare(strict_types=1);

namespace BOA\Results;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ResultSaver
{
    /**
     * @psalm-param ScrapedStadiumRaces $results
     * @psalm-param non-empty-string $path
     * @psalm-return void
     *
     * @param array $results
     * @param string $path
     * @return void
     * @throws \RuntimeException
     */
    public function save(array $results, string $path): void
    {
        $contents = json_encode(['results' => $results]);
        if ($contents === false) {
            throw new \RuntimeException("Failed to encode results to JSON");
        }

        $dir = dirname($path);
        if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
            throw new \RuntimeException("Failed to create directory: {$dir}");
        }

        if (file_put_contents($path, $contents) === false) {
            throw new \RuntimeException("Failed to save results to {$path}");
        }
    }
}
