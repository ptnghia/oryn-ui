<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class HorizontalNav extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('oryn-ui::components.template.horizontal-nav');
    }
}
