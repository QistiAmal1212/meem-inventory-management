<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layouts.app')] 
class Product extends Component 
{
    public function render()
    {
        return view('livewire.product');
    }
}
