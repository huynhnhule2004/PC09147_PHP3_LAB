<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Fieldset;
use Filament\Notifications\Notification;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Đơn hàng';

    protected static ?string $modelLabel = "Đơn hàng";

    protected static ?string $pluralLabel = 'Đơn hàng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Thông tin khách hàng')
                    ->schema([
                        TextInput::make('id')
                            ->label('Mã đơn')
                            ->readonly(),
                        TextInput::make('customer_name')
                            ->label('Tên khách hàng')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone_number')
                            ->label('Số điện thoại')
                            ->tel()
                            ->required(),

                        TextInput::make('shipping_address')
                            ->label('Địa chỉ')
                            ->required(),
                    ]),

                Fieldset::make('Thông tin đơn hàng')
                    ->schema([
                        TextInput::make('total_price')
                            ->label('Tổng tiền')
                            ->numeric()
                            ->required(),

                        Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'pending' => 'Chờ xử lý',
                                'processing' => 'Đang xử lý',
                                'shipped' => 'Đã vận chuyển',
                                'delivered' => 'Đã giao hàng',
                                'cancelled' => 'Đã hủy',
                            ])
                            ->default(fn($record) => $record?->status ?? 'pending')
                            ->selectablePlaceholder(false)
                            ->disabled(fn($record) => in_array($record->status, ['delivered', 'cancelled'])) // Không cho chỉnh sửa khi đã giao hoặc đã hủy
                            ->live()
                            ->afterStateUpdated(function ($state, $record, $set) {
                                $validTransitions = [
                                    'pending' => ['processing'],
                                    'processing' => ['shipped'],
                                    'shipped' => ['delivered'],
                                    'delivered' => [],
                                    'cancelled' => [],
                                ];

                                if (!isset($validTransitions[$record->status]) || !in_array($state, $validTransitions[$record->status])) {
                                    $set('status', $record->status);
                                    Notification::make()
                                        ->title('Không thể cập nhật trạng thái này!')
                                        ->danger()
                                        ->send();
                                }
                            }),




                        Select::make('payment_method')
                            ->label('Phương thức thanh toán')
                            ->options([
                                'cod' => 'Thanh toán khi nhận hàng',
                                'online' => 'Thanh toán online',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->label('Trạng thái thanh toán')
                            ->options([
                                'paid' => 'Đã thanh toán',
                                'unpaid' => 'Chưa thanh toán',
                                'refunded' => 'Đã hoàn tiền',
                            ])
                            ->required(),
                    ]),

                Fieldset::make('Chi tiết đơn hàng')
                    ->schema([
                        Section::make('Chi tiết đơn hàng')
                            ->schema([
                                Repeater::make('orderDetails')
                                    ->label('Chi tiết')
                                    ->relationship('details')
                                    ->schema([
                                        Select::make('product_id')
                                            ->label('Tên sản phẩm')
                                            ->relationship('product', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->disabled(),

                                        TextInput::make('quantity')
                                            ->label('Số lượng')
                                            ->numeric(),

                                        TextInput::make('price')
                                            ->label('Giá')
                                            ->numeric(),
                                    ])
                                    ->columns(3)
                                    ->disabled(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Mã đơn')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('customer_name')
                    ->label('Tên khách hàng')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('phone_number')
                    ->label('SĐT')
                    ->toggleable(),

                TextColumn::make('shipping_address')
                    ->label('Địa chỉ')
                    ->toggleable(),

                TextColumn::make('total_price')
                    ->label('Tổng tiền')
                    ->money('VND')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->sortable()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'shipped' => 'primary',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đã vận chuyển',
                        'delivered' => 'Đã giao hàng',
                        'cancelled' => 'Đã hủy',
                        default => 'Không xác định',
                    })
                    ->toggleable(),

                TextColumn::make('payment_method')
                    ->label('Phương thức thanh toán')
                    ->badge()
                    ->sortable()
                    ->color(fn(string $state): string => match ($state) {
                        'cod' => 'warning',
                        'online' => 'primary',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'cod' => 'Tiền mặt khi nhận',
                        'online' => 'Thanh toán online',
                        default => 'Không xác định',
                    })
                    ->toggleable(),

                TextColumn::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->badge()
                    ->sortable()
                    ->color(fn(string $state): string => match ($state) {
                        'paid' => 'success',
                        'unpaid' => 'danger',
                        'refunded' => 'warning',
                        default => 'secondary',
                    })
                    ->toggleable()

                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'paid' => 'Đã thanh toán',
                        'unpaid' => 'Chưa thanh toán',
                        'refunded' => 'Đã hoàn tiền',
                        default => 'Không xác định',
                    })
                    ->toggleable(),

                TextColumn::make('created_at')->label('Ngày đặt')->dateTime()->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đã vận chuyển',
                        'delivered' => 'Đã giao hàng',
                        'canceled' => 'Đã hủy',
                    ]),
                SelectFilter::make('payment_method')
                    ->label('Phương thức thanh toán')
                    ->options([
                        'cod' => 'Tiền mặt',
                        'online' => 'Thanh toán online',
                    ]),
                SelectFilter::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->options([
                        'paid' => 'Đã thanh toán',
                        'unpaid' => 'Chưa thanh toán',
                        'refunded' => 'Đã hoàn tiền',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Không cho phép tạo mới
    }
}
