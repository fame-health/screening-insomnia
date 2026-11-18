<?php

namespace App\Filament\Resources\ScreeningQuestions;

use App\Filament\Resources\ScreeningQuestions\Pages\ManageScreeningQuestions;
use App\Models\ScreeningQuestion;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class ScreeningQuestionResource extends Resource
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQuestionMarkCircle;

    protected static string|UnitEnum|null $navigationGroup = 'Konten Screening';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = ScreeningQuestion::class;

    protected static ?string $recordTitleAttribute = 'question_text';

    protected static ?string $modelLabel = 'pertanyaan';

    protected static ?string $pluralModelLabel = 'pertanyaan screening';

    protected static ?string $navigationLabel = 'Pertanyaan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('instrument')
                    ->label('Jenis screening')
                    ->options([
                        'remaja' => 'Screening insomnia remaja',
                        'medis' => 'Screening masalah medis',
                    ])
                    ->helperText('Nilai pilihan remaja makin tinggi untuk kendala lebih besar. Nilai masalah medis mengikuti skala 12, 8, 5, 2 dari file sumber.')
                    ->required(),
                TextInput::make('question_text')
                    ->label('Pertanyaan')
                    ->required()
                    ->maxLength(1000)
                    ->columnSpanFull(),
                Repeater::make('options')
                    ->label('Pilihan jawaban dan nilai')
                    ->schema([
                        TextInput::make('label')
                            ->label('Teks jawaban')
                            ->required()
                            ->maxLength(200),
                        TextInput::make('score')
                            ->label('Nilai skor')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->maxValue(12)
                            ->required(),
                    ])
                    ->columns(2)
                    ->minItems(2)
                    ->maxItems(4)
                    ->defaultItems(4)
                    ->reorderable(false)
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Urutan pertanyaan')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->required()
                    ->default(1),
                Toggle::make('is_active')
                    ->label('Tampilkan pada halaman screening')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question_text')
            ->columns([
                TextColumn::make('question_text')
                    ->label('Pertanyaan')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('instrument')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === 'medis' ? 'Masalah medis' : 'Remaja')
                    ->sortable(),
                TextColumn::make('options')
                    ->label('Pilihan')
                    ->state(fn (ScreeningQuestion $record): string => count($record->options ?? []).' pilihan'),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('instrument')
                    ->label('Jenis screening')
                    ->options([
                        'remaja' => 'Screening insomnia remaja',
                        'medis' => 'Screening masalah medis',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageScreeningQuestions::route('/'),
        ];
    }
}
