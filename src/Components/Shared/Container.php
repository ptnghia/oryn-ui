<?php

namespace Oryn\UI\Components\Shared;

use Illuminate\View\Component;

class Container extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('oryn-ui::components.shared.container');
    }
}
