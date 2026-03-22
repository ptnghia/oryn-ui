<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class GanttChart extends Component
{
    public function __construct(
        public array $tasks = [],
        public string $viewMode = 'Day',
        public bool $readOnly = false,
        public bool $showArrow = true,
        public array $colorsMap = [],
        public string|int $rowHeight = 50,
        public string|int $columnWidth = 65,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.gantt-chart');
    }
}
