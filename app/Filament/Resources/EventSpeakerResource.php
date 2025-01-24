<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventSpeakerResource\Pages;
use App\Filament\Resources\EventSpeakerResource\RelationManagers;
use App\Models\EventSpeaker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;

class EventSpeakerResource extends Resource
{
    protected static ?string $model = EventSpeaker::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->maxLength(255),
                Textarea::make('bio')->required(),
                FileUpload::make('foto')->image()->directory('speakers'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
                TextColumn::make('bio')->label('Biography')->limit(50),
                ImageColumn::make('foto')->label('foto'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListEventSpeakers::route('/'),
            'create' => Pages\CreateEventSpeaker::route('/create'),
            'edit' => Pages\EditEventSpeaker::route('/{record}/edit'),
        ];
    }
}
