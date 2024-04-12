<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Items;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Request;

class ItemResource extends Resource
{
    protected static ?string $model = Items::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Deler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Hidden::make('stand_id')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->reactive()
                    ->default(function (Request $request) {
                        $id = $request->input('stand_id');
                        return $id;
                    }),

                Hidden::make('column_placement')->label(__('Kolonne plassering'))
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->reactive()
                    ->default(function (Request $request) {
                        $column = $request->input('column');
                        return $column ?? '';
                    }),

                Hidden::make('row_placement')->label(__('Rad plassering'))
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->reactive()
                    ->default(function (Request $request) {
                        $row = $request->input('row');
                        return $row ?? '';
                    }),

                TextInput::make('name')->label('Navn')
                    ->required(),


                TextInput::make('diameter')->label(__('Diameter'))
                    ->numeric()
                    ->maxValue(999),

                TextInput::make('depth')->label(__('Lengde'))
                    ->numeric()
                    ->maxValue(999),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Navn')->searchable(),
                TextColumn::make('diameter')->label(__('Diameter'))->searchable()->sortable(),
                TextColumn::make('depth')->label(__('Lengde'))->searchable()->sortable(),
                TextColumn::make('stand.name')->label(__('Stativ'))->searchable()->sortable(),
                TextColumn::make('column_placement')->label(__('Kolonne'))
                    ->state(function (Items $record) {
                        return chr($record->column_placement + 64);
                    })
                    ->searchable(),
                TextColumn::make('row_placement')->label(__('Rad'))->searchable(),
            ])
            ->filters([
                Filter::make('MinMax')
                    ->form([
                        TextInput::make('ItemName')->label('Navn'),
                        TextInput::make('MaxDiameter')->label('Max Diameter')->numeric(),
                        TextInput::make('MinDiameter')->label('Min Diameter')->numeric(),
                        TextInput::make('MaxDepth')->label('Max Lengde')->numeric(),
                        TextInput::make('MinDepth')->label('Min Lengde')->numeric(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['ItemName'],
                                fn (Builder $query, $record) => $query->where('name', '=', $record)
                            )
                            ->when(
                                $data['MaxDepth'],
                                fn (Builder $query, $record) => $query->where('depth', '<=', $record)
                            )
                            ->when(
                                $data['MinDepth'],
                                fn (Builder $query, $record) => $query->where('depth', '>=', $record)
                            )
                            ->when(
                                $data['MaxDiameter'],
                                fn (Builder $query, $record) => $query->where('diameter', '<=', $record)
                            )
                            ->when(
                                $data['MinDiameter'],
                                fn (Builder $query, $record) => $query->where('diameter', '>=', $record)
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
