<?php

namespace App\Filament\Resources;

use App\Enum\Lead\Status;
use App\Filament\Resources\LeadsResource\Pages;
use App\Models\Leads;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsResource extends Resource
{
    protected static ?string $model = Leads::class;
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Лиды';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->placeholder('Введите имя')
                    ->label('Имя')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->placeholder('Введите телефон')
                    ->label('Телефон')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->placeholder('Введите email')
                    ->email()
                    ->label('Email'),
                Forms\Components\Select::make('status')
                    ->options(Status::getRussianLabels())
                    ->label('Статус'),
                Forms\Components\Textarea::make('comment')
                    ->label('Комментарий')
                    ->placeholder('Введите комментарий')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_label_in_russian')
                    ->label('Статус')
                    ->searchable()
                    ->badge()
                    ->color(fn (Leads $record) => $record->getStatusColor()),
                Panel::make([
                        Tables\Columns\TextInputColumn::make('comment')->columnSpan(6),
                ])->collapsible(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->options(Status::getRussianLabels()),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('Completed')
                        ->label('Завершить')
                        ->requiresConfirmation()
                        ->hidden(fn (Leads $record) => $record->status == 'completed')
                        ->icon('heroicon-o-check-badge')
                        ->action(fn (Leads $record) => $record->update(['status' => 'completed'])),
                ]),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLeads::route('/create'),
            'edit' => Pages\EditLeads::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }

    public static function getPluralLabel(): string
    {
        return 'Лиды';
    }
}
