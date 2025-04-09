<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Barangay;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Faker\Provider\DateTime;
use Doctrine\DBAL\Query\Limit;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\BarangayResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BarangayResource\RelationManagers;

class BarangayResource extends Resource
{
    protected static ?string $model = Barangay::class;

    protected static ?string $navigationIcon = 'heroicon-m-home-modern';

    protected static ?string $navigationGroup = 'System Management';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Barangay';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('barangay_name')
                ->required()
                ->maxLength(255),

                TextInput::make('contact_person')
                ->required()
                ->maxLength(255),

                TextInput::make('contact_number')
                ->required()
                ->numeric()
                ->maxLength(11),


                Repeater::make('events')
                ->label('Festivals')
                ->relationship('events')
                ->schema([
                    TextInput::make('event_name')->label('Festival')
                    ->required()
                    ->maxLength(255),

                    DatePicker::make('event_date')->label('Date')
                    ->required(),

                    DateTimePicker::make('event_time')
                    ->required(),

                    TextInput::make('event_venue')->label('Venue')
                    ->required()
                    ->maxLength(255),

                    Textarea::make('event_description')->label('Description')
                    ->required()
                    ->maxLength(602975),

                    FileUpload::make('event_image')->label('Image')
                    ->image()
                    ->maxSize(1024)
                    ->columnSpanFull()
                   

                ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barangay_name')->searchable()->label('Barangay'),
                TextColumn::make('contact_person')->searchable()->label('Contact Person'),
                TextColumn::make('contact_number')->label('Contact Number'),
                TextColumn::make('events.event_name')->searchable()->label('Festival'),
                TextColumn::make('events.event_time')->label('Date')->sortable(),
                ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ])
               
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
            'index' => Pages\ListBarangays::route('/'),
            'create' => Pages\CreateBarangay::route('/create'),
            'edit' => Pages\EditBarangay::route('/{record}/edit'),
        ];
    }
}
