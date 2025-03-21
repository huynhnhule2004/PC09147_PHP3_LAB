<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Schema;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Danh mục";

    protected static ?string $navigationGroup = "Cài đặt";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Thông tin danh mục')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->placeholder('Nhập tên danh mục')
                            ->columnSpan(12)
                            ->label('Tên danh mục'),

                        RichEditor::make('description')
                            ->nullable()
                            ->placeholder('Nhập mô tả danh mục')
                            ->columnSpanFull()
                            ->label('Mô tả'),
                        Toggle::make('status')
                            ->label('Trạng thái')
                            ->default(1)
                            ->columnSpan(12)
                    ])->columns(8),

                Fieldset::make('Hình ảnh')
                    ->Schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->columnSpanFull()
                    ])->columns(4)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Tên danh mục'),
                TextColumn::make('description')
                    ->label('Mô tả danh mục')
                    ->html(),
                ImageColumn::make('thumbnail'),
                ToggleColumn::make('status')
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        '0' => 'Ẩn',
                        '1' => 'Hiện',
                    ])
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
