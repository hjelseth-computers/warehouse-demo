<?php

namespace App\Filament\Resources\StandResource\Pages;

use App\Filament\Resources\StandResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Page;


class Stand extends Page implements HasForms
{
    protected static string $resource = StandResource::class;

    protected static string $view = 'filament.resources.stand-resource.pages.stand';

    use InteractsWithRecord;

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);

        static::authorizeResourceAccess();
    }
}
