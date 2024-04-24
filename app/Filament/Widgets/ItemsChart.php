<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ItemsChart extends ChartWidget
{
    protected static ?string $heading = 'Totalt deler på lager';

    protected static string $color = 'warning';

    protected static ?int $sort = 2;



    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Deler',
                    'data' => [11, 10, 5, 2, 11, 4, 14, 1, 7, 4],
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#FF9F40', '#9966FF', '#FFCD56', '#C9CBCF', '#ed9f66', 'teal', '#b8e6bf', '#facfd2'],
                    'borderColor' => 'Grey',
                ],
            ],
            'labels' => ['Bend', 'Nippel', 'Muffe', 'Overgang', 'lydfelle', 'Rør', 'Ventil', 'Lydplater', 'Klammer', 'Rister'],


        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
