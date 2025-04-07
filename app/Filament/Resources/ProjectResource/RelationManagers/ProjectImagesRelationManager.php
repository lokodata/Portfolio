<?php

// Verify this namespace declaration is EXACTLY correct
namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager; // Ensure it extends RelationManager
use Filament\Tables;
use Filament\Tables\Table;
// ... other imports

// Ensure the class name matches what's used in ProjectResource.php
class ProjectImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    // ... rest of the class
} 