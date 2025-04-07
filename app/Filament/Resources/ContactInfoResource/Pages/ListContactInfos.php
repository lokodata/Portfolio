<?php

namespace App\Filament\Resources\ContactInfoResource\Pages;

use App\Filament\Resources\ContactInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\ContactInfo;
use Filament\Notifications\Notification;

class ListContactInfos extends ListRecords
{
    protected static string $resource = ContactInfoResource::class;

    public function mount(): void
    {
        $record = ContactInfo::first();

        if ($record) {
            redirect()->to(static::getResource()::getUrl('edit', ['record' => $record->id]));
            return;
        } else {
            parent::mount();

            Notification::make()
                ->title('Setup Required')
                ->body('Contact information record not found. Please run: php artisan db:seed')
                ->warning()
                ->persistent()
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
