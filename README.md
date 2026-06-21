# 🚤 Boatrace Open API for Results

[![cron](https://github.com/BoatraceOpenAPI/results/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/results/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/results/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/results/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/results.svg)](https://github.com/BoatraceOpenAPI/results/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/results.svg)](https://github.com/BoatraceOpenAPI/results/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![v3](https://img.shields.io/badge/Boatrace_Open_API_for_Results-v3-blue)](https://github.com/BoatraceOpenAPI/results/tree/gh-pages/docs/v3)
[![v2](https://img.shields.io/badge/Boatrace_Open_API_for_Results-v2-lightgrey)](https://github.com/BoatraceOpenAPI/results/tree/gh-pages/docs/v2)

## ⚠️ 注意事項

>
> ⚡ 本 API は**非公式**であり、BOATRACE 公式サイト・団体とは一切関係ありません。<br>
> 🕒 データはリアルタイム更新ではなく、**約30分間隔で更新**されます。（ GitHub Actions のスケジュールは cron.yml を参照 ）<br>
> 🔍 データの正確性・完全性を保証するものではありません。<br>
> 🙇‍♂️ 利用は自己責任でお願いします。

## 📌 概要

この API では、ボートレース（ 競艇 ）の結果データを取得できます。<br>
データは GitHub Pages 上で公開されており、JSON形式で提供されます。

## 🌐 エンドポイント

### [![v3](https://img.shields.io/badge/Boatrace_Open_API_for_Results-v3-blue)](https://github.com/BoatraceOpenAPI/results/tree/gh-pages/docs/v3)

```bash
https://boatraceopenapi.github.io/results/v3/YYYY/YYYYMMDD.json
```

### [![v2](https://img.shields.io/badge/Boatrace_Open_API_for_Results-v2-lightgrey)](https://github.com/BoatraceOpenAPI/results/tree/gh-pages/docs/v2)

```bash
https://boatraceopenapi.github.io/results/v2/YYYY/YYYYMMDD.json
```

📅 YYYY → 年<br>
📅 YYYYMMDD → 年月日<br>
（ 日付は日本標準時 JST〔UTC+9〕基準 ）

※ 仕様上の欠陥により **v1** は破棄されました。

## 🧩 サンプル

### [![v3](https://img.shields.io/badge/Boatrace_Open_API_for_Results-v3-blue)](https://github.com/BoatraceOpenAPI/results/tree/gh-pages/docs/v3)

- 2026年03月22日の結果
  - [https://lamrongol.github.io/BoatraceResults/v3/2026/20260322.json](https://lamrongol.github.io/BoatraceResults/v3/2026/20260322.json)
- 昨日の結果（ JST〔UTC+9〕基準 ）
  - [https://lamrongol.github.io/BoatraceResults/v3/yesterday.json](https://lamrongol.github.io/BoatraceResults/v3/yesterday.json)

### [![v2](https://img.shields.io/badge/Boatrace_Open_API_for_Results-v2-lightgrey)](https://github.com/BoatraceOpenAPI/results/tree/gh-pages/docs/v2)

- 2026年03月22日の結果
  - [https://lamrongol.github.io/BoatraceResults/v2/2026/20260322.json](https://lamrongol.github.io/BoatraceResults/v2/2026/20260322.json)
- 昨日の結果（ JST〔UTC+9〕基準 ）
  - [https://lamrongol.github.io/BoatraceResults/v2/yesterday.json](https://lamrongol.github.io/BoatraceResults/v2/yesterday.json)

## 🔗 関連リポジトリ

| 🏷️ 対象 | 📂 リポジトリ |
|:--|:--|
| 🐆 出走表 | [Boatrace Open API for Programs](https://github.com/BoatraceOpenAPI/programs) |
| ⏱️ 直前情報 | [Boatrace Open API for Previews](https://github.com/BoatraceOpenAPI/previews) |

## 📄 ライセンス

Boatrace Open API for Results は [MITライセンス](LICENSE) の元で公開されています。
