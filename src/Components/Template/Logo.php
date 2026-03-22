<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class Logo extends Component
{
    public function __construct(
        public ?string $lightSrc = null,
        public ?string $darkSrc = null,
        public ?string $streamlineLightSrc = null,
        public ?string $streamlineDarkSrc = null,
        public string $type = 'full',
        public string $alt = 'Logo',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.logo');
    }
}
