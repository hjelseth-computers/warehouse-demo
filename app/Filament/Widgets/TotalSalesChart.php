<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TotalSalesChart extends ChartWidget
{
    protected static ?string $heading = 'Salg';

    protected static ?int $sort = 4;


    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => '2024',
                    'data' => [563, 432, 343, 222, 654, 230, 156, 167, 543, 231, 642, 344],
                    'backgroundColor' => ['#B8E6BF'],
                    'borderColor' => '#B8E6BF',
                ],
                [
                    'label' => '2023',
                    'data' => [323, 145, 432, 111, 456, 354, 245, 211, 287, 251, 530, 310],
                    'backgroundColor' => ['#C9CBCF'],
                    'borderColor' => '#C9CBCF',
                ],
            ],
            'labels' => ['Januar', 'Februar', 'Mars', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Desember'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
