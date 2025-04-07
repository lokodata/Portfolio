<?php

namespace App\Filament\Resources\ContactInfoResource\Pages;

use App\Filament\Resources\ContactInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\ContactInfo; // Import the model
use Illuminate\Contracts\Support\Htmlable; // Import Htmlable


class EditContactInfo extends EditRecord
{
    protected static string $resource = ContactInfoResource::class;

     // Override resolveRecord to always fetch the first record if ID isn't standard
    protected function resolveRecord(int | string $key): \Illuminate\Database\Eloquent\Model
    {
         // Always fetch the first record, ensuring it exists (or fail)
         // We rely on seeding or manual creation for the first record.
         return ContactInfo::firstOrFail();
    }

     // Override getTitle to be static
    public function getTitle(): string | Htmlable
    {
        return 'Edit Contact Information';
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(), // Remove delete action
        ];
    }

     // Redirect back to the same edit page after saving
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }
}
