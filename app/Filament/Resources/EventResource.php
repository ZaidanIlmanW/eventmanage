<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Livewire\TemporaryUploadedFile;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-asia-australia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required(),
            Textarea::make('description'),
            TextInput::make('location')
                ->required()
                ->maxLength(255)
                ,
            DateTimePicker::make('start_date'),
            DateTimePicker::make('end_date'),
            FileUpload::make('image')
            ->directory('events') // Folder khusus untuk file gambar
            ->required(),
            Select::make('event_category_id')
                ->relationship('category', 'nama')
                ->searchable(),
            Select::make('event_speaker_id')
                ->relationship('speaker', 'nama')
                ->searchable()
                ->nullable(),
            // Select::make('status')
            //     ->options([
            //         'published' => 'Published',
            //         'draft' => 'Draft',
            //         'cancelled' => 'Cancelled',
            //     ])
                // ->default('draft'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([ 
                TextColumn::make('title')
                ->label('Judul')
               ->searchable(),
                
                TextColumn::make('location')
                ->label('Lokasi'),
                ImageColumn::make('image')
                ->label('Poster')
                ->rounded()
                ->url(fn ($record) => $record->image ? asset('storage/' . $record->image) : null),
                TextColumn::make('speaker.nama')->label('Pembicara'),
                TextColumn::make('category.nama')->label('Kategori Acara'),
                // TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
