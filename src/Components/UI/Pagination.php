<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Pagination extends Component
{
    public function __construct(
        public int $total = 0,
        public int $pageSize = 10,
        public int $currentPage = 1,
        public bool $displayTotal = false,
    ) {}

    public function pageCount(): int
    {
        return $this->pageSize > 0 ? (int) ceil($this->total / $this->pageSize) : 0;
    }

    public function render()
    {
        return view('oryn-ui::components.ui.pagination');
    }
}
