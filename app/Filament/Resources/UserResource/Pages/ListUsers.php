<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('Semua')
                ->badge(\App\Models\User::count()),
        ];

        $roles = Role::orderBy('name')->get();

        foreach ($roles as $role) {
            $count = \App\Models\User::role($role->name)->count();
            
            $tabs[str_replace(' ', '_', strtolower($role->name))] = Tab::make(ucfirst($role->name))
                ->badge($count)
                ->modifyQueryUsing(function (Builder $query) use ($role) {
                    return $query->role($role->name);
                });
        }

        return $tabs;
    }
}
