<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Product extends Component implements HasForms
{
    use InteractsWithForms;

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('file')
                ->label('Select Excel / CSV')
                ->required(),
        ];
    }

    public function render()
    {
        return view('livewire.product');
    }
}
