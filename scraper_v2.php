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
        $result['boats'] = array_values($result['boats']);
        $result['payouts']['trifecta'] = array_values($result['payouts']['trifecta']);
        $result['payouts']['trio'] = array_values($result['payouts']['trio']);
        $result['payouts']['exacta'] = array_values($result['payouts']['exacta']);
        $result['payouts']['quinella'] = array_values($result['payouts']['quinella']);
        $result['payouts']['quinella_place'] = array_values($result['payouts']['quinella_place']);
        $result['payouts']['win'] = array_values($result['payouts']['win']);
        $result['payouts']['place'] = array_values($result['payouts']['place']);
        $newResults[] = $result;
    }
}

if (empty($newResults)) {
    exit;
}

$name = 'docs/v2/' . $date->format('Ymd') . '.json';
file_put_contents($name, json_encode(['results' => $newResults]));

$name = 'docs/v2/today.json';
file_put_contents($name, json_encode(['results' => $newResults]));
