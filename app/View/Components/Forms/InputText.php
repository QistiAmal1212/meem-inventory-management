<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    public $label;

    public $name;

    public $maxlength;

    public $placeholder;

    public $required;

    public function __construct($label, $name, $maxlength = 30, $placeholder = '', $required = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->maxlength = $maxlength;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.input-text');
    }
}
