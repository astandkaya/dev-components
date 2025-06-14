# 後で書くREADNED.md

デザインのコンポーネントだったり良く使う機能をまとめていくところ

## 環境構築

```
$ composer install
$ cp .env.example .env
$ sail up -d
$ sail art key:generate
$ sail art migrate --seed
```

## メモ書きしておくところ

`git config core.hooksPath .githooks`の実行が必要
`php artisan vendor:publish --tag=log-viewer-assets --force`が必要