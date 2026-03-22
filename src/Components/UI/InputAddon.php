<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class InputAddon extends Component
{
    public function __construct(
        public string $size = 'md',
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'lg' => 'input-addon-lg h-14',
            'sm' => 'input-addon-sm h-9',
            'xs' => 'input-addon-xs h-7',
            default => 'input-addon-md h-11',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.input-addon');
    }
}
