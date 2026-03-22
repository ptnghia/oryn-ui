<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Slider extends Component
{
    public function __construct(
        public ?string $name = null,
        public float $min = 0,
        public float $max = 100,
        public float $step = 1,
        public mixed $value = 0,
        public bool $range = false,
        public bool $disabled = false,
        public bool $tooltip = true,
        public array $marks = [],
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.slider');
    }
}
