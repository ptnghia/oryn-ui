<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class NotificationDropdown extends Component
{
    public function __construct(
        public string $bellIcon = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>',
        public int $unreadCount = 0,
        public string $emptyTitle = 'No notifications!',
        public string $emptyMessage = 'Please try again later',
        public string $emptyImage = '',
        public string $viewAllUrl = '#',
        public string $viewAllText = 'View All Activity',
        public string $height = '280px',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.notification-dropdown');
    }
}
