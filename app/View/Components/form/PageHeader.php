<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public string $title;
    public string $backRoute;

    public function __construct(string $title, string $backRoute)
    {
        $this->title = $title;
        $this->backRoute = $backRoute;
    }

    public function render()
    {
        return view('components.form.page-header');
    }
}
