<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\BLogCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Fieldset;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Bài viết';

    protected static ?string $modelLabel = "Bài viết";

    protected static ?string $pluralLabel = 'Bài viết';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Thông tin bài viết')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->placeholder('Nhập tiêu đề bài viết')
                            ->label('Tiêu đề'),

                        Select::make('category_id')
                            ->required()
                            ->placeholder('Chọn danh mục bài viết')
                            ->label('Danh mục')
                            ->options(BlogCategory::all()->pluck('name', 'id')),
                    ]),

                Fieldset::make('Nội dung bài viết')
                    ->schema([
                        RichEditor::make('content')
                            ->required()
                            ->placeholder('Nhập nội dung bài viết')
                            ->label('Nội dung')
                            ->columnSpanFull(),
                    ]),

                Fieldset::make('Hình ảnh')
                    ->schema([
                        FileUpload::make('image')
                            ->required()
                            ->directory('blog-images')
                            ->label('Hình ảnh')
                            ->columnSpanFull(),
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable()->label('Tiêu đề')->toggleable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->label('Danh mục')
                    ->toggleable(),
                ImageColumn::make('image')
                    ->label('Hình ảnh')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->image))
                    ->toggleable(),
                TextColumn::make('created_at')->dateTime()->label('Ngày tạo')->toggleable(),
                TextColumn::make('updated_at')->dateTime()->label('Ngày cập nhật')->toggleable(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
