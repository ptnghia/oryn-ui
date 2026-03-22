<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class OtpInput extends Component
{
    public function __construct(
        public int $length = 6,
        public ?string $name = null,
        public bool $disabled = false,
        public bool $invalid = false,
        public string $placeholder = '',
        public ?string $value = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.otp-input');
    }
}
