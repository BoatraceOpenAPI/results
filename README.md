# 🚤 Boatrace Open API for Results

[![cron](https://github.com/BoatraceOpenAPI/results/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/results/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/results/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/results/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/results.svg)](https://github.com/BoatraceOpenAPI/results/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/results.svg)](https://github.com/BoatraceOpenAPI/results/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## ⚠️ 注意事項
>
> ⚡ 本 API は**非公式**であり、BOATRACE 公式サイト・団体とは一切関係ありません。<br>
> 🕒 データはリアルタイム更新ではなく、**約30分間隔で更新**されます。<br>
> 🔍 データの正確性・完全性を保証するものではありません。<br>
> 🙇‍♂️ 利用は自己責任でお願いします。

## 📌 概要
この API では、ボートレース（競艇）の結果データを取得できます。<br>
データは GitHub Pages 上で公開されており、JSON形式で提供されます。

## 🌐 エンドポイント
```bash
https://boatraceopenapi.github.io/results/v2/YYYY/YYYYMMDD.json
```

📅 YYYY → 年<br>
📅 YYYYMMDD → 年月日

## 🧩 サンプル
- 2025年07月15日の結果
  - [https://boatraceopenapi.github.io/results/v2/2025/20250715.json](https://boatraceopenapi.github.io/results/v2/2025/20250715.json)
- 本日の結果
  - [https://boatraceopenapi.github.io/results/v2/today.json](https://boatraceopenapi.github.io/results/v2/today.json)

## 🔗 関連リポジトリ
| 🏷️ 対象 | 📂 リポジトリ |
|:--|:--|
| 🐆 出走表 | [Boatrace Open API for Programs](https://github.com/BoatraceOpenAPI/results) |
| ⏱️ 直前情報 | [Boatrace Open API for Previews](https://github.com/BoatraceOpenAPI/previews) |

## 📄 ライセンス
Boatrace Open API for Results は [MITライセンス](LICENSE) の元で公開されています。
