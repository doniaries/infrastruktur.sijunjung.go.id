<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->prefixIcon('heroicon-m-user')
                    ->placeholder('Nama Lengkap')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->placeholder('email')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required()
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create'),
                Forms\Components\Select::make('roles')
                    ->prefixIcon('heroicon-o-bolt')
                    ->label('Role')
                    ->multiple()
                    ->preload()
                    ->relationship('roles', 'name')
                    ->searchable(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                    ->onColor('success')
                    ->offColor('danger')
                    ->inline(false)
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->copyable()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('roles.name')
                    ->badge()
                    ->color(function (string $state): string {
                        return match ($state) {
                            'super_admin' => 'danger',
                            'petugas' => 'success',
                            default => 'gray',
                        };
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status User')
                    ->boolean()
                    ->action(function ($record, $column) {
                        if (!auth()->user()->hasRole(['super_admin'])) {
                            Notification::make()
                                ->title("Hanya Super Admin yang dapat mengubah status user")
                                ->danger()
                                ->send();
                            return;
                        }

                        $name = $record->name;
                        $record->update(['is_active' => !$record->is_active]);
                        Notification::make()
                            ->title($record->is_active ? "User $name telah diaktifkan" : "User $name telah dinonaktifkan")
                            ->success()
                            ->send();
                    })
                    ->visible(fn() => auth()->user()->hasAnyRole(['super_admin'])),
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
                Tables\Actions\Action::make('Change Password')
                    ->authorize('update')
                    ->icon('heroicon-o-key')
                    ->visible(
                        fn($record) =>
                        auth()->user()->hasRole('super_admin') ||
                            auth()->user()->id === $record->id
                    )
                    ->form([
                        Forms\Components\TextInput::make('password')
                            ->required()
                            ->revealable()
                            ->password()
                            ->rule(Password::default())
                            ->same('passwordConfirmation'),
                        Forms\Components\TextInput::make('passwordConfirmation')
                            ->required()
                            ->revealable()
                            ->password(),
                    ])
                    ->action(function (User $user, array $data) {
                        $user->update(['password' => Hash::make($data['password'])]);

                        Notification::make()
                            ->success()
                            ->title('Password Sukses Diganti')
                            ->send();
                    }),
                Impersonate::make() //untuk peniruan user
                    ->visible(
                        fn($record) =>
                        auth()->user()->hasRole('super_admin')
                    ),
                Tables\Actions\EditAction::make()
                    ->closeModalByClickingAway(false)
                    ->stickyModalFooter()
                    ->stickyModalHeader() // judul modal tetap
                    ->visible(
                        fn($record) =>
                        auth()->user()->hasRole('super_admin') ||
                            auth()->user()->id === $record->id
                    ),
                // ->slideOver(),
                Tables\Actions\DeleteAction::make()
                    ->visible(
                        fn($record) =>
                        auth()->user()->hasRole('super_admin')
                    ),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
