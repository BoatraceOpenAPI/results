<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BVP\BoatraceScraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

$date = Carbon::today('Asia/Tokyo');
$results = Scraper::scrapeResults($date);

$newResults = [];
foreach (array_values($results) as $data) {
    foreach (array_values($data) as $result) {
        $result['courses'] = array_values($result['courses']);
        $result['places'] = array_values($result['places']);
        $result['refunds'] = array_values($result['refunds']);
        $newResults[] = $result;
    }
}

if (empty($newResults)) {
    exit;
}

$name = 'docs/v1/' . $date->format('Ymd') . '.json';
file_put_contents($name, json_encode(['results' => $newResults]));

$name = 'docs/v1/today.json';
file_put_contents($name, json_encode(['results' => $newResults]));
