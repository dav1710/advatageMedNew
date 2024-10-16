<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title.en')
                    ->label('English Title')
                    ->columnSpan('1/4')
                    ->required(),
                Forms\Components\TextInput::make('title.ru')
                    ->label('Russian Title')
                    ->columnSpan('1/4'),
                Forms\Components\TextInput::make('title.am')
                    ->label('Armenian Title')
                    ->columnSpan('1/4'),
                Forms\Components\TextInput::make('title.es')
                    ->label('Espanol Title')
                    ->columnSpan('1/4'),
                Forms\Components\TextInput::make('subtitle.en')
                    ->label('English Subtitle')
                    ->columnSpan('1/4')
                    ->required(),
                Forms\Components\TextInput::make('subtitle.ru')
                    ->label('Russian Subtitle')
                    ->columnSpan('1/4'),
                Forms\Components\TextInput::make('subtitle.am')
                    ->label('Armenian Subtitle')
                    ->columnSpan('1/4'),
                Forms\Components\TextInput::make('subtitle.es')
                    ->label('Espanol Subtitle')
                    ->columnSpan('1/4'),
                Forms\Components\FileUpload::make('img')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('1600')
                    ->imageResizeTargetHeight('830')
                    ->directory('sliders')
                    ->visibility('public')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('img')->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title.en'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
