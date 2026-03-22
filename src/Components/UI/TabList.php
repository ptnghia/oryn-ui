<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class TabList extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('oryn-ui::components.ui.tab-list');
    }
}
