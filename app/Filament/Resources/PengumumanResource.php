<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Models\Pengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                Forms\Components\RichEditor::make('isi')
                    ->label('Isi')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->required(),
                Forms\Components\Toggle::make('status_publikasi')
                    ->label('Publikasikan')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_publikasi')
                    ->label('Status')
                    ->boolean(),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengumuman::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
