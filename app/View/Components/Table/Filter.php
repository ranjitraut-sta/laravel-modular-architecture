<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Filter extends Component
{
    public string $action;
    public ?string $placeholder;

    public function __construct(string $action, ?string $placeholder = null)
    {
        $this->action = $action;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.table.filter');
    }
}
