<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectSearchableQisti extends Component
{
    public $options;

    public $placeholder;

    public $id;

    public $name;

    public $value;

    public $model;

    public $width;

    public function __construct($options = [], $placeholder = 'Select...', $id = null, $name = null, $value = null, $model = null, $width = '')
    {
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->id = $id ?? 'select-'.uniqid();
        $this->name = $name ?? $this->id;
        $this->value = $value;
        $this->model = $model;
        $this->width = $width;
    }

    public function render(): View|Closure|string
    {
        return view('components.select-searchable-qisti');
    }
}
