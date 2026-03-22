<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public bool $clickable = false,
        public bool $bordered = false,
        public ?string $bodyClass = null,
        public bool $headerBordered = false,
        public bool $footerBordered = false,
    ) {}

    public function cardClass(): string
    {
        return $this->bordered ? 'card card-border' : 'card card-shadow';
    }

    public function render()
    {
        return view('oryn-ui::components.ui.card');
    }
}
