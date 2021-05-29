<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Services\ExportOrdersService;
use Carbon\CarbonImmutable;

final class ExportOrdersUseCase
{
    /** @var ExportOrdersService */
    private $service;

    public function __construct(ExportOrdersService $service)
    {
        $this->service = $service;
    }

    public function run(CarbonImmutable $targetDate): string
    {
        $orders = $this->service->findOrders($targetDate);

        $tsv = collect();
        $tsv->push($this->title());

        foreach ($orders as $order) {
            $tsv->push(
                [
                    $order->order_code,
                    $order->order_date,
                    $order->detail_no,
                    $order->item_name,
                    $order->item_price,
                    $order->quantity,
                    $order->subtotal_price,
                    $order->customer_name,
                    $order->customer_email,
                    $order->destination_name,
                    $order->destination_zip,
                    $order->destination_prefecture,
                    $order->destination_address,
                    $order->destination_tel,
                ]
            );
        }

        return $tsv->map(
                function (array $values) {
                    return implode("\t", $values);
                }
            )->implode("\n") . "\n";
    }

    private function title(): array
    {
        return [
            '購入コード',
            '購入日時',
            '明細番号',
            '商品名',
            '商品価格',
            '購入点数',
            '小計金額',
            '合計点数',
            '合計金額',
            '購入者氏名',
            '購入者メールアドレス',
            '送付先氏名',
            '送付先郵便番号',
            '送付先都道府県',
            '送付先住所',
            '送付先電話番号',
        ];
    }
}
