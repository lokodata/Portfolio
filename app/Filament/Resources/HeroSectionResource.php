<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path')
                    ->label('Hero Image')
                    ->image()
                    ->directory('hero-images')
                    ->imageEditor()
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('job_titles')
                    ->label('Job Titles (for typing animation)')
                    ->schema([
                        Forms\Components\TextInput::make('title')->required(),
                    ])
                    ->addActionLabel('Add Job Title')
                    ->columnSpanFull()
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->grid(2),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('social_links')
                    ->label('Social Links')
                    ->schema([
                        Forms\Components\TextInput::make('label')->required()->placeholder('e.g., LinkedIn'),
                        Forms\Components\TextInput::make('url')->required()->url()->placeholder('https://linkedin.com/...'),
                    ])
                    ->addActionLabel('Add Social Link')
                    ->columnSpanFull()
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->grid(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Image'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_titles')
                    ->label('Titles Count')
                    ->getStateUsing(fn (HeroSection $record): int => count($record->job_titles ?? [])),
                Tables\Columns\TextColumn::make('social_links')
                    ->label('Links Count')
                    ->getStateUsing(fn (HeroSection $record): int => count($record->social_links ?? [])),
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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }

    // --- Optional: Limit to one Hero Section ---
    // public static function canCreate(): bool
    // {
    //     return static::getModel()::count() === 0;
    // }
}
