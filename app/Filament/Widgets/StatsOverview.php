<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Varer solgt denne måned', '1928'),
            Stat::make('Totalt varer på lager', '23412'),
            Stat::make('Gjennomsnittlig toalett tid', '4:12'),
        ];
    }
}
