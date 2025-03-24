<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationLabel = 'Bình luận';

    protected static ?string $modelLabel = "Bình luận";

    protected static ?string $pluralLabel = 'Bình luận';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Người dùng')
                    ->relationship('user', 'name')
                    ->disabled(), // Không cho chỉnh sửa

                Forms\Components\Select::make('product_id')
                    ->label('Sản phẩm')
                    ->relationship('product', 'name')
                    ->disabled(), // Không cho chỉnh sửa

                Forms\Components\Textarea::make('content')
                    ->label('Nội dung bình luận')
                    ->disabled(), // Không cho chỉnh sửa

                Forms\Components\Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'visible' => 'Hiển thị',
                        'hidden' => 'Ẩn',
                    ])
                    ->default('visible'), // Chỉ có thể chỉnh sửa trạng thái
            ]);
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Người dùng')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('product.name')
                    ->label('Sản phẩm')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('content')
                    ->label('Nội dung')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Trạng thái')
                    ->formatStateUsing(fn(string $state): string => $state === 'visible' ? 'Hiển thị' : 'Ẩn')
                    ->colors([
                        'hidden' => 'gray',
                        'visible' => 'green',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'visible' => 'Hiển thị',
                        'hidden' => 'Ẩn',
                    ]),

                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Người dùng')
                    ->relationship('user', 'name')
                    ->searchable(),

                Tables\Filters\SelectFilter::make('product_id')
                    ->label('Sản phẩm')
                    ->relationship('product', 'name')
                    ->searchable(),

                Tables\Filters\Filter::make('created_at')
                    ->label('Ngày tạo')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Từ ngày'),
                        Forms\Components\DatePicker::make('to')->label('Đến ngày'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['to'], fn($q) => $q->whereDate('created_at', '<=', $data['to']));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }



    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Không cho phép tạo mới
    }
}
