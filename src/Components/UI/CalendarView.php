<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class CalendarView extends Component
{
    public function __construct(
        public array $events = [],
        public string $initialView = 'dayGridMonth',
        public bool $editable = false,
        public bool $selectable = false,
        public array $headerToolbar = [],
        public array $eventColors = [],
        public string|int $height = 'auto',
    ) {
        if (empty($this->headerToolbar)) {
            $this->headerToolbar = [
                'left' => 'title',
                'center' => '',
                'right' => 'dayGridMonth,timeGridWeek,timeGridDay prev,next',
            ];
        }

        if (empty($this->eventColors)) {
            $this->eventColors = [
                'red' => ['bg' => '#fbddd9', 'text' => '#1a1a2e'],
                'orange' => ['bg' => '#ffc6ab', 'text' => '#1a1a2e'],
                'yellow' => ['bg' => '#ffd993', 'text' => '#1a1a2e'],
                'green' => ['bg' => '#bee9d3', 'text' => '#1a1a2e'],
                'blue' => ['bg' => '#bce9fb', 'text' => '#1a1a2e'],
                'purple' => ['bg' => '#ccbbfc', 'text' => '#1a1a2e'],
            ];
        }
    }

    public function render()
    {
        return view('oryn-ui::components.ui.calendar-view');
    }
}
