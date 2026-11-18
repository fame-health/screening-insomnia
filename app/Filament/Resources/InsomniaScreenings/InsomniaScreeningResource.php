<?php

namespace App\Filament\Resources\InsomniaScreenings;

use App\Filament\Resources\InsomniaScreenings\Pages\ManageInsomniaScreenings;
use App\Models\InsomniaScreening;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class InsomniaScreeningResource extends Resource
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static string|UnitEnum|null $navigationGroup = 'Data Screening';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = InsomniaScreening::class;

    protected static ?string $recordTitleAttribute = 'participant_name';

    protected static ?string $modelLabel = 'data screening';

    protected static ?string $pluralModelLabel = 'data screening insomnia';

    protected static ?string $navigationLabel = 'Data insomnia';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('participant_name')
                    ->label('Nama peserta')
                    ->required()
                    ->maxLength(80),
                TextInput::make('age')
                    ->label('Umur')
                    ->numeric()
                    ->integer()
                    ->minValue(10)
                    ->maxValue(25)
                    ->suffix('tahun')
                    ->required(),
                Select::make('gender')
                    ->label('Jenis kelamin')
                    ->options([
                        'Perempuan' => 'Perempuan',
                        'Laki-laki' => 'Laki-laki',
                    ])
                    ->required(),
                Select::make('instrument')
                    ->label('Jenis screening')
                    ->options([
                        'remaja' => 'Screening insomnia remaja',
                        'medis' => 'Screening masalah medis',
                    ])
                    ->required(),
                TextInput::make('score')
                    ->label('Skor')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->step('0.01')
                    ->suffix('/ 100')
                    ->required(),
                TextInput::make('result_label')
                    ->label('Ringkasan hasil')
                    ->required()
                    ->maxLength(120)
                    ->columnSpanFull(),
                Repeater::make('answers')
                    ->label('Jawaban (opsional untuk data manual)')
                    ->schema([
                        TextInput::make('question')
                            ->label('Pertanyaan')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('answer')
                            ->label('Jawaban')
                            ->required(),
                        TextInput::make('score')
                            ->label('Nilai')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->maxValue(12)
                            ->required(),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->columnSpanFull(),
                Textarea::make('admin_notes')
                    ->label('Catatan admin')
                    ->rows(3)
                    ->maxLength(5000)
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('participant_name')->label('Nama peserta'),
                TextEntry::make('age')->label('Umur')->suffix(' tahun'),
                TextEntry::make('gender')->label('Jenis kelamin'),
                TextEntry::make('instrument')
                    ->label('Jenis screening')
                    ->formatStateUsing(fn (string $state): string => $state === 'medis' ? 'Masalah medis' : 'Remaja'),
                TextEntry::make('score')->label('Skor')->suffix(' / 100'),
                TextEntry::make('result_label')->label('Ringkasan hasil')->columnSpanFull(),
                TextEntry::make('answers')
                    ->label('Jawaban')
                    ->formatStateUsing(fn ($state): string => collect($state ?? [])
                        ->map(fn (array $answer): string => ($answer['question'] ?? 'Pertanyaan').': '.($answer['answer'] ?? ''))
                        ->implode("\n"))
                    ->columnSpanFull(),
                TextEntry::make('admin_notes')->label('Catatan admin')->placeholder('Belum ada catatan')->columnSpanFull(),
                TextEntry::make('created_at')->label('Tanggal')->dateTime('d M Y, H:i'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('participant_name')
            ->columns([
                TextColumn::make('participant_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('age')
                    ->label('Umur')
                    ->suffix(' thn')
                    ->sortable(),
                TextColumn::make('gender')
                    ->label('Jenis kelamin')
                    ->toggleable(),
                TextColumn::make('instrument')
                    ->label('Jenis screening')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === 'medis' ? 'Masalah medis' : 'Remaja')
                    ->sortable(),
                TextColumn::make('score')
                    ->label('Skor')
                    ->numeric(decimalPlaces: 2)
                    ->suffix(' / 100')
                    ->sortable(),
                TextColumn::make('result_label')
                    ->label('Ringkasan')
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('answers')
                    ->label('Jawaban')
                    ->formatStateUsing(fn ($state): string => collect($state ?? [])
                        ->map(fn (array $answer): string => $answer['answer'] ?? '')
                        ->implode(' · '))
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
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
                ViewAction::make(),
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
            'index' => ManageInsomniaScreenings::route('/'),
        ];
    }
}
