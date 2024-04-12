<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ItemsRecievedChart extends ChartWidget
{
    protected static ?string $heading = 'Vareflyt';

    protected static string $color = 'warning';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Deler inn til lager',
                    'data' => [1132, 109, 554, 228, 1112, 443, 149, 1100, 790, 490, 876, 985],
                    'backgroundColor' => ['#b8e6bf'],
                    'borderColor' => 'Grey',
                ],
                [
                    'label' => 'Deler ut av lager',
                    'data' => [563, 78, 343, 112, 654, 23, 156, 122, 543, 231, 642, 344],
                    'backgroundColor' => ['#FF6384'],
                    'borderColor' => 'Grey',
                ],
            ],
            'labels' => ['Januar', 'Februar', 'Mars', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Desember'],


        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
