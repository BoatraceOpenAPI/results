<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BOA\Results\ResultScraper;
use BOA\Results\ResultSaver;
use BOA\Results\ScraperAdapter;
use BVP\Scraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

// コマンドライン引数からバージョンを取得（デフォルトは v2）
$version = $argv[1] ?? 'v2';

// 本日の日付を東京時間で取得
$date = Carbon::today('Asia/Tokyo');

// v2 or v3 の場合のみ ResultScraper を利用して結果データを取得
if ($version === 'v2' || $version === 'v3') {
    $scraperInstance = Scraper::getInstance();
    $scraperAdapter = new ScraperAdapter($scraperInstance);
    $scraper = new ResultScraper($scraperAdapter);

    // 指定日付の結果データをスクレイピング
    $results = $scraper->scrape($date);
}

// 結果データが取得できなかった場合は処理終了
if (empty($results ?? [])) {
    exit;
}

// 結果データを JSON ファイルとして保存
// 日付付きの JSON ファイルとして保存（例: docs/{version}/YYYY/YYYYMMDD.json）
// 最新データとして today.json にも保存
$saver = new ResultSaver();
$saver->save($results, "docs/{$version}/" . $date->format('Y') . '/' . $date->format('Ymd') . '.json');
$saver->save($results, "docs/{$version}/today.json");
