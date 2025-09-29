<?php

namespace App\View\Components\Forms\InputDropdown;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddButton extends Component
{
    public $onClick; // the full function call as a string

    public $label;

    public function __construct($onClick = "openModal('Default')", $label = 'Add New')
    {
        $this->onClick = $onClick;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.input-dropdown.add-button');
    }
}
