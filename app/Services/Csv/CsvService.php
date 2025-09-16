<?php

declare(strict_types=1);

namespace App\Services\Csv;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;
use Symfony\Component\HttpFoundation\StreamedResponse;

abstract class CsvService
{
    protected const CHUNK_COUNT = 1000;

    /**
     * CSVダウンロード
     *
     *
     *
     * @throws RuntimeException
     */
    public function download(Builder $query, string $filename): StreamedResponse
    {
        return response()->streamDownload(
            fn () => $this->output($query, 'php://output'),
            $filename,
            ['Content-Type' => 'text/csv'],
        );
    }

    /**
     * CSVをローカルファイルに出力
     *
     *
     *
     * @throws RuntimeException
     */
    public function exportFile(Builder $query, ?string $filePathWithName = null): string
    {
        $this->output(
            $query,
            $filePathWithName ??= tempnam(sys_get_temp_dir(), 'csv_').'.csv',
        );

        return $filePathWithName;
    }

    /**
     * CSV出力
     *
     *
     * @throws RuntimeException
     */
    public function output(Builder $query, string $handler): void
    {
        $handle = fopen($handler, 'w') ?: throw new RuntimeException('php://outputに失敗しました。', 1);

        // MEMO: UTF-8から文字コードを変えたり、改行コードを変更したりする場合はここであれこれやる必要がある。
        //       下記はCSV本文を utf-8 → cp932（Windows）へ。改行コードを変換するフィルタクラス（作らないと無い）を指定して改行コードを変更する例。
        // stream_filter_append($handle, 'convert.iconv.utf-8/cp932//TRANSLIT');
        // stream_filter_register('CrlfFilter', CrlfFilter::class);
        // stream_filter_append($handle, 'CrlfFilter');

        // S_JISへ変換
        stream_filter_append($handle, 'convert.iconv.utf-8/sjis//TRANSLIT');

        // BOM付与
        fwrite($handle, "\xEF\xBB\xBF");

        $query->each(
            function (Model $element, int $i) use ($handle) {
                $row = $this->getColumns($element);

                // 1回目かつ、連想配列の場合はキーをヘッダーとして出力
                if ($i === 0 && ! array_is_list($row)) {
                    $this->writeRow($handle, array_keys($row));
                }
                // データ出力
                $this->writeRow($handle, $row);
            },
            static::CHUNK_COUNT,
        );
    }

    /**
     * 出力項目を定義する
     *
     *
     * @return array<int|string, mixed>
     */
    abstract public function getColumns(Model $element): array;

    /**
     * 配列をCSV形式でファイルに書き込むメソッド
     * fputcsv()を使ってしまうと囲い記号を常につけることが困難なため全てfwrite()で書き出しをする
     *
     * @param  resource  $handle
     */
    private function writeRow($handle, array $row): void
    {
        // 要素に「"」が含まれる場合は「""」に変換する
        $row = array_map(fn ($value) => str_replace('"', '""', (string) $value), $row);

        fwrite($handle, '"'.implode('","', $row)."\"\n");
    }
}
