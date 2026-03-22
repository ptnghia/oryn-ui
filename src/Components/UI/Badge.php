<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Badge extends Component
{
    public function __construct(
        public string|int|null $content = null,
        public int $maxCount = 99,
        public ?string $innerClass = null,
    ) {}

    public function displayContent(): string|null
    {
        if (is_int($this->content) && $this->content > $this->maxCount) {
            return $this->maxCount . '+';
        }

        return $this->content;
    }

    public function isDot(): bool
    {
        return is_null($this->content);
    }

    public function render()
    {
        return view('oryn-ui::components.ui.badge');
    }
}
