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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadsResource extends Resource
{
    protected static ?string $model = Leads::class;
    protected static ?int $navigationSort = 1;
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
                    ->options([
                        'Новый' => 'Новый',
                        'Связались' => 'Связались',
                        'Квалифицирован' => 'Квалифицирован',
                        'Неквалифицирован' => 'Неквалифицирован',
                        'Впроцессе' => 'Впроцессе',
                        'Потерян' => 'Потерян',
                    ])
                    ->label('Статус'),
                Forms\Components\Textarea::make('comments.message')
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
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->searchable()
                    ->badge()
                    ->color(fn ($record) => $record->getStatusColor()),
                Panel::make([
                    Stack::make([
                        Tables\Columns\TextColumn::make('comments.message')
                            ->label('Комментарий')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text'),
                    ]),
                ])->collapsible()
                    ->visible(fn ($record) => $record->comments->isNotEmpty()),
            ])
            ->contentGrid([
                'xl' => 2,
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'Новый' => 'Новый',
                        'Связались' => 'Связались',
                        'Квалифицирован' => 'Квалифицирован',
                        'Неквалифицирован' => 'Неквалифицирован',
                        'Впроцессе' => 'Впроцессе',
                        'Потерян' => 'Потерян',
                    ]),
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
