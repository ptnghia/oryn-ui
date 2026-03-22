<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Sorter extends Component
{
    public function __construct(
        public ?string $column = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.sorter');
    }
}
