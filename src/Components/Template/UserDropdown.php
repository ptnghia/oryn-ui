<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class UserDropdown extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $email = null,
        public ?string $avatar = null,
        public array $items = [],
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.user-dropdown');
    }
}
