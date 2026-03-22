<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class FormContainer extends Component
{
    public function __construct(
        public string $layout = 'vertical',
        public string $size = 'md',
        public string|int $labelWidth = 100,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.form-container');
    }
}
