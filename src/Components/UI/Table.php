<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Table extends Component
{
    public function __construct(
        public bool $hoverable = false,
        public bool $compact = false,
        public bool $borderless = false,
        public bool $cellBorder = false,
    ) {}

    public function tableClasses(): string
    {
        $classes = ['table-default'];
        if ($this->hoverable) $classes[] = 'table-hover';
        if ($this->compact) $classes[] = 'table-compact';
        if ($this->cellBorder) $classes[] = 'table-border';

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oryn-ui::components.ui.table');
    }
}
