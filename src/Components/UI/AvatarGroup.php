<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class AvatarGroup extends Component
{
    public function __construct(
        public bool $chained = true,
        public ?int $maxCount = null,
        public ?string $omittedAvatarContent = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.avatar-group');
    }
}
