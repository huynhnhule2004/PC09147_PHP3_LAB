<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogCategoryResource\Pages;
use App\Filament\Resources\BlogCategoryResource\RelationManagers;
use App\Models\BlogCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class BlogCategoryResource extends Resource
{

    protected static ?string $navigationLabel = 'Danh mục bài viết';

    protected static ?string $modelLabel = "Danh mục bài viết";

    protected static ?string $pluralLabel = 'Danh mục bài viết';
    protected static ?string $model = BlogCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Tên danh mục')
                    ->required()
                    ->placeholder('Nhập tên danh mục')
                    ->unique(BlogCategory::class, 'name')
                    ->maxLength(255)
                    ->reactive(),

                Textarea::make('description')
                    ->placeholder('Nhập mô tả danh mục')
                    ->label('Mô tả')
                    ->nullable()
                    ->rows(3),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('Tên danh mục'),
                TextColumn::make('description')->limit(50)->wrap()->label('Mô tả'),
                TextColumn::make('created_at')->dateTime('d/m/Y H:i')->label('Ngày tạo'),
            ])
            ->filters([])
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
            'index' => Pages\ListBlogCategories::route('/'),
            'create' => Pages\CreateBlogCategory::route('/create'),
            'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
        ];
    }
}
