<?php

namespace App\Filament\Resources\CompanyMemberResource\Pages;

use App\Filament\Resources\CompanyMemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyMembers extends ListRecords
{
    protected static string $resource = CompanyMemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
