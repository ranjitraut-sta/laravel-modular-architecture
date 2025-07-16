<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Closure;

class TopHeader extends Component
{
    public string $title;
    public ?string $createRoute;
    public ?string $createLabel;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, ?string $createRoute = null, ?string $createLabel = 'Add New', ?string $class = '')
    {
        $this->title = $title;
        $this->createRoute = $createRoute;
        $this->createLabel = $createLabel;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.top-header');
    }
}
