<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function render()
    {
        return view('components.table.pagination');
    }
}

