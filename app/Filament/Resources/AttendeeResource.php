<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Attendee;
use App\Models\Barangay;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AttendeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AttendeeResource\RelationManagers;

class AttendeeResource extends Resource
{
    protected static ?string $model = Attendee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $navigationLabel = 'Attendee';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Attendee';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')
                ->searchable()
                ->required()
                ->label('Name')
                ->optionsLimit(5)
                ->live()  // Makes the field reactive
                ->afterStateUpdated(function ($state, Forms\Set $set) {
                    // Fetch the user's email if a user is selected
                    if ($state) {
                        $user = User::find($state);
                        $set('email', $user->email); // Updates the 'email' field
                    }
                })
                ->preload(),
                

                

                Forms\Components\TextInput::make('age')
                ->required()
                ->numeric()
                ->maxLength(2),
                

                Forms\Components\TextInput::make('contact_number')
                ->required()
                ->maxLength(255),

               select::make('gender')
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                ]),


                Forms\Components\TextInput::make('email')
                ->label('Email')
                ->required()
                ->disabled()
                ->dehydrated()
                ->maxLength(255),
            

                Select::make('event_id')->relationship('event', 'event_name')
                ->searchable()
                ->required()
                ->preload()
                ->label('Festival')
                ->optionsLimit(5)

                ->live()  // Makes the field reactive
                ->afterStateUpdated(function ($state, Forms\Set $set) {
                    // Fetch the user's email if a user is selected
                    if ($state) {
                        $event = Barangay::find($state);
                        $set('barangay_id', $event->barangay_id); // Updates the 'email' field
                    }
                })
                ->preload(),

                Forms\Components\TextInput::make('barangay_id')
                ->label('Barangay')
                ->required()
                ->disabled()
                ->dehydrated()
                ->maxLength(255),
                
            
    
            ])->columns(1);
         }


         
    public static function table(Table $table): Table
    {


        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAttendees::route('/'),
            'create' => Pages\CreateAttendee::route('/create'),
            'edit' => Pages\EditAttendee::route('/{record}/edit'),
        ];
    }
}
