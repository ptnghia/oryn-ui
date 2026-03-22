<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Carousel extends Component
{
    public function __construct(
        public string $orientation = 'horizontal',
        public bool $loop = false,
        public bool $autoPlay = false,
        public int $autoPlayInterval = 3000,
        public bool $showArrow = true,
        public bool $showIndicators = true,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.carousel');
    }
}
