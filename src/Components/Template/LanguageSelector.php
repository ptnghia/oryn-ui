<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class LanguageSelector extends Component
{
    public function __construct(
        public array $languages = [],
        public ?string $current = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.language-selector');
    }
}
