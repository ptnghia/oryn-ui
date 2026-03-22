<?php

namespace Oryn\UI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Oryn\UI\Commands\InstallCommand;
use Oryn\UI\Commands\PublishCommand;

class OrynUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/oryn-ui.php', 'oryn-ui');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'oryn-ui');

        $this->registerComponents();
        $this->configurePublishing();
        $this->configureCommands();
    }

    protected function registerComponents(): void
    {
        $prefix = config('oryn-ui.prefix', 'oryn');

        $components = [
            // Sprint 1.1 — Simple display
            'alert' => Components\UI\Alert::class,
            'badge' => Components\UI\Badge::class,
            'tag' => Components\UI\Tag::class,
            'status-icon' => Components\UI\StatusIcon::class,
            'spinner' => Components\UI\Spinner::class,
            'skeleton' => Components\UI\Skeleton::class,
            'close-button' => Components\UI\CloseButton::class,
            'notification' => Components\UI\Notification::class,

            // Sprint 1.2 — Card, Button, Avatar, Input, Form
            'card' => Components\UI\Card::class,
            'button' => Components\UI\Button::class,
            'avatar' => Components\UI\Avatar::class,
            'avatar-group' => Components\UI\AvatarGroup::class,
            'input' => Components\UI\Input::class,
            'input-group' => Components\UI\InputGroup::class,
            'input-addon' => Components\UI\InputAddon::class,
            'form-container' => Components\UI\FormContainer::class,
            'form-item' => Components\UI\FormItem::class,

            // Sprint 1.3 — Progress, Timeline, Steps
            'progress' => Components\UI\Progress::class,
            'timeline' => Components\UI\Timeline::class,
            'timeline-item' => Components\UI\TimelineItem::class,
            'steps' => Components\UI\Steps::class,
            'step-item' => Components\UI\StepItem::class,

            // Sprint 2.1 — Form Controls
            'checkbox' => Components\UI\Checkbox::class,
            'checkbox-group' => Components\UI\CheckboxGroup::class,
            'radio' => Components\UI\Radio::class,
            'radio-group' => Components\UI\RadioGroup::class,
            'switcher' => Components\UI\Switcher::class,
            'segment' => Components\UI\Segment::class,
            'segment-item' => Components\UI\SegmentItem::class,

            // Sprint 2.2 — Overlays & Popups
            'tooltip' => Components\UI\Tooltip::class,
            'dialog' => Components\UI\Dialog::class,
            'drawer' => Components\UI\Drawer::class,
            'dropdown' => Components\UI\Dropdown::class,
            'dropdown-item' => Components\UI\DropdownItem::class,
            'toast' => Components\UI\Toast::class,

            // Sprint 2.3 — Navigation & Tabs
            'tabs' => Components\UI\Tabs::class,
            'tab-list' => Components\UI\TabList::class,
            'tab-nav' => Components\UI\TabNav::class,
            'tab-content' => Components\UI\TabContent::class,
            'menu' => Components\UI\Menu::class,
            'menu-item' => Components\UI\MenuItem::class,
            'menu-collapse' => Components\UI\MenuCollapse::class,
            'menu-group' => Components\UI\MenuGroup::class,
            'pagination' => Components\UI\Pagination::class,

            // Sprint 2.4 — Media & Upload
            'upload' => Components\UI\Upload::class,
            'carousel' => Components\UI\Carousel::class,

            // Sprint 3.1 — Select, AutoComplete, OtpInput
            'select' => Components\UI\Select::class,
            'auto-complete' => Components\UI\AutoComplete::class,
            'otp-input' => Components\UI\OtpInput::class,

            // Sprint 3.2 — DatePicker family & TimeInput
            'date-picker' => Components\UI\DatePicker::class,
            'date-picker-range' => Components\UI\DatePickerRange::class,
            'date-time-picker' => Components\UI\DateTimePicker::class,
            'time-input' => Components\UI\TimeInput::class,

            // Sprint 3.3 — Slider, Table
            'slider' => Components\UI\Slider::class,
            'table' => Components\UI\Table::class,
            'thead' => Components\UI\THead::class,
            'tbody' => Components\UI\TBody::class,
            'tfoot' => Components\UI\TFoot::class,
            'tr' => Components\UI\Tr::class,
            'th' => Components\UI\Th::class,
            'td' => Components\UI\Td::class,
            'sorter' => Components\UI\Sorter::class,
            'data-table' => Components\UI\DataTable::class,

            // Sprint 4.1 — Layout Framework
            'layout-base' => Components\Template\LayoutBase::class,
            'layout-collapsible-side' => Components\Template\LayoutCollapsibleSide::class,
            'layout-stacked-side' => Components\Template\LayoutStackedSide::class,
            'layout-top-bar-classic' => Components\Template\LayoutTopBarClassic::class,
            'layout-frameless-side' => Components\Template\LayoutFramelessSide::class,
            'layout-content-overlay' => Components\Template\LayoutContentOverlay::class,
            'layout-blank' => Components\Template\LayoutBlank::class,

            // Sprint 4.2 — Header & Navigation
            'header' => Components\Template\Header::class,
            'side-nav' => Components\Template\SideNav::class,
            'mobile-nav' => Components\Template\MobileNav::class,
            'footer' => Components\Template\Footer::class,
            'page-container' => Components\Template\PageContainer::class,
            'side-nav-toggle' => Components\Template\SideNavToggle::class,
            'logo' => Components\Template\Logo::class,

            // Sprint 4.3 — Template Utilities
            'search' => Components\Template\Search::class,
            'user-dropdown' => Components\Template\UserDropdown::class,
            'language-selector' => Components\Template\LanguageSelector::class,
            'theme-configurator' => Components\Template\ThemeConfigurator::class,
            'horizontal-nav' => Components\Template\HorizontalNav::class,
            'notification-dropdown' => Components\Template\NotificationDropdown::class,

            // Sprint 4.3 — Shared Components
            'breadcrumb' => Components\Shared\Breadcrumb::class,
            'page-header' => Components\Shared\PageHeader::class,
            'container' => Components\Shared\Container::class,

            // Sprint 5.1 — Charts & Visualization
            'chart' => Components\UI\Chart::class,
            'region-map' => Components\UI\RegionMap::class,

            // Sprint 5.2 — Rich Content
            'rich-text-editor' => Components\UI\RichTextEditor::class,
            'syntax-highlighter' => Components\UI\SyntaxHighlighter::class,

            // Sprint 5.3 — Calendar & Gantt
            'calendar-view' => Components\UI\CalendarView::class,
            'gantt-chart' => Components\UI\GanttChart::class,
        ];

        foreach ($components as $alias => $class) {
            Blade::component($class, "{$prefix}-{$alias}");
        }

        // Register anonymous block components by category
        // Usage: <x-oryn-block-auth-sign-in-simple />, <x-oryn-block-dashboard-ecommerce />, etc.
        $blockCategories = [
            'auth' => 'block',
            'dashboards' => 'block-dashboard',
            'crud' => 'block-crud',
            'apps' => 'block-app',
            'account' => 'block-account',
            'pages' => 'block-page',
            'help-center' => 'block-help',
        ];

        foreach ($blockCategories as $folder => $categoryPrefix) {
            $path = __DIR__ . "/../resources/views/components/blocks/{$folder}";
            if (is_dir($path)) {
                Blade::anonymousComponentPath($path, "{$prefix}-{$categoryPrefix}");
            }
        }
    }

    protected function configurePublishing(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/oryn-ui.php' => config_path('oryn-ui.php'),
        ], 'oryn-ui-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/oryn-ui'),
        ], 'oryn-ui-views');

        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('vendor/oryn-ui/css'),
        ], 'oryn-ui-css');

        $this->publishes([
            __DIR__ . '/../resources/js' => public_path('vendor/oryn-ui/js'),
        ], 'oryn-ui-js');

        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('vendor/oryn-ui/css'),
            __DIR__ . '/../resources/js' => public_path('vendor/oryn-ui/js'),
        ], 'oryn-ui-assets');
    }

    protected function configureCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCommand::class,
            PublishCommand::class,
        ]);
    }
}