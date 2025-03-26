<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $modelLabel = 'sản phẩm';
    protected static ?string $pluralModelLabel = 'Sản phẩm';
    protected static ?string $navigationLabel = 'Sản phẩm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Tên sản phẩm')
                    ->placeholder('Nhập tên sản phẩm'),

                Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'name')
                    ->required()
                    ->label('Danh mục'),

                RichEditor::make('short_description')
                    ->label('Mô tả ngắn')
                    ->placeholder('Nhập mô tả ngắn cho sản phẩm'),

                RichEditor::make('long_description')
                    ->label('Mô tả dài')
                    ->placeholder('Nhập mô tả dài cho sản phẩm'),

                TextInput::make('price')
                    ->label('Giá')
                    ->formatStateUsing(fn($state) => $state && $state != 0 ? number_format($state, 0, ',', '.') : '')
                    ->dehydrateStateUsing(fn($state) => $state !== '' ? (float) str_replace('.', '', $state) : null)
                    ->nullable()
                    ->placeholder('Nhập giá cho sản phẩm')
                    ->required(),

                TextInput::make('discount_price')
                    ->label('Giá giảm')
                    ->formatStateUsing(fn($state) => $state && $state != 0 ? number_format($state, 0, ',', '.') : '')
                    ->dehydrateStateUsing(fn($state) => $state !== '' ? (float) str_replace('.', '', $state) : null)
                    ->nullable()
                    ->placeholder('Nhập giá giảm cho sản phẩm')
                    ->required(),


                Toggle::make('is_featured')
                    ->label('Sản phẩm nổi bật'),

                Select::make('status')
                    ->options([
                        'active' => 'Hoạt động',
                        'inactive' => 'Không hoạt động',
                    ])
                    ->default('active')
                    ->label('Trạng thái'),

                FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->required()
                    ->disk('public')
                    ->label('Hình ảnh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('ID'
                )->sortable(),
                TextColumn::make('title')
                ->label('Tên sản phẩm')
                ->sortable()
                ->searchable(),
                TextColumn::make('category.name')
                ->label('Danh mục')
                ->sortable(),
                TextColumn::make('price')
                ->label('Giá')
                ->sortable()
                ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.')),
                TextColumn::make('sale_price')
                ->label('Giá giảm')
                ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.')),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->sortable()
                    ->formatStateUsing(fn($state) => $state === 'active' ? 'Hoạt động' : 'Không hoạt động'),
                ImageColumn::make('thumbnail')
                    ->label('Hình ảnh')
                    ->disk('public')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->image))
                    ->size(50),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}