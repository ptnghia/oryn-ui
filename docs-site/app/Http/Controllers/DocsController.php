<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DocsController extends Controller
{
    // Navigation structure shared across all doc pages
    public static array $nav = [
        'Getting Started' => [
            ['title' => 'Installation', 'route' => 'docs.installation', 'slug' => 'installation'],
            ['title' => 'Quick Start', 'route' => 'docs.quick-start', 'slug' => 'quick-start'],
            ['title' => 'Configuration', 'route' => 'docs.configuration', 'slug' => 'configuration'],
        ],
        'Theming' => [
            ['title' => 'Overview', 'route' => 'docs.theming', 'slug' => 'theming'],
            ['title' => 'Colors & Variables', 'route' => 'docs.theming.colors', 'slug' => 'theming/colors'],
            ['title' => 'Dark Mode', 'route' => 'docs.theming.dark-mode', 'slug' => 'theming/dark-mode'],
            ['title' => 'Theme Presets', 'route' => 'docs.theming.presets', 'slug' => 'theming/presets'],
        ],
        'Components — Basic' => [
            ['title' => 'Alert', 'route' => 'docs.component', 'param' => 'alert'],
            ['title' => 'Avatar', 'route' => 'docs.component', 'param' => 'avatar'],
            ['title' => 'Badge', 'route' => 'docs.component', 'param' => 'badge'],
            ['title' => 'Button', 'route' => 'docs.component', 'param' => 'button'],
            ['title' => 'Card', 'route' => 'docs.component', 'param' => 'card'],
            ['title' => 'Close Button', 'route' => 'docs.component', 'param' => 'close-button'],
            ['title' => 'Icon', 'route' => 'docs.component', 'param' => 'icon'],
            ['title' => 'Progress', 'route' => 'docs.component', 'param' => 'progress'],
            ['title' => 'Skeleton', 'route' => 'docs.component', 'param' => 'skeleton'],
            ['title' => 'Spinner', 'route' => 'docs.component', 'param' => 'spinner'],
            ['title' => 'Steps', 'route' => 'docs.component', 'param' => 'steps'],
            ['title' => 'Table', 'route' => 'docs.component', 'param' => 'table'],
            ['title' => 'Tag', 'route' => 'docs.component', 'param' => 'tag'],
            ['title' => 'Timeline', 'route' => 'docs.component', 'param' => 'timeline'],
        ],
        'Components — Form' => [
            ['title' => 'Checkbox', 'route' => 'docs.component', 'param' => 'checkbox'],
            ['title' => 'Form Item', 'route' => 'docs.component', 'param' => 'form-item'],
            ['title' => 'Input', 'route' => 'docs.component', 'param' => 'input'],
            ['title' => 'Radio', 'route' => 'docs.component', 'param' => 'radio'],
            ['title' => 'Segment', 'route' => 'docs.component', 'param' => 'segment'],
            ['title' => 'Select', 'route' => 'docs.component', 'param' => 'select'],
            ['title' => 'Switcher', 'route' => 'docs.component', 'param' => 'switcher'],
            ['title' => 'Textarea', 'route' => 'docs.component', 'param' => 'textarea'],
            ['title' => 'Upload', 'route' => 'docs.component', 'param' => 'upload'],
        ],
        'Components — Interactive' => [
            ['title' => 'Carousel', 'route' => 'docs.component', 'param' => 'carousel'],
            ['title' => 'Dialog', 'route' => 'docs.component', 'param' => 'dialog'],
            ['title' => 'Drawer', 'route' => 'docs.component', 'param' => 'drawer'],
            ['title' => 'Dropdown', 'route' => 'docs.component', 'param' => 'dropdown'],
            ['title' => 'Menu', 'route' => 'docs.component', 'param' => 'menu'],
            ['title' => 'Pagination', 'route' => 'docs.component', 'param' => 'pagination'],
            ['title' => 'Tabs', 'route' => 'docs.component', 'param' => 'tabs'],
            ['title' => 'Toast', 'route' => 'docs.component', 'param' => 'toast'],
            ['title' => 'Tooltip', 'route' => 'docs.component', 'param' => 'tooltip'],
        ],
        'Components — Complex' => [
            ['title' => 'AutoComplete', 'route' => 'docs.component', 'param' => 'auto-complete'],
            ['title' => 'DataTable', 'route' => 'docs.component', 'param' => 'data-table'],
            ['title' => 'Date Picker', 'route' => 'docs.component', 'param' => 'date-picker'],
            ['title' => 'OTP Input', 'route' => 'docs.component', 'param' => 'otp-input'],
            ['title' => 'Slider', 'route' => 'docs.component', 'param' => 'slider'],
            ['title' => 'Time Input', 'route' => 'docs.component', 'param' => 'time-input'],
        ],
        'Layout' => [
            ['title' => 'Overview', 'route' => 'docs.component', 'param' => 'layout'],
            ['title' => 'CollapsibleSide', 'route' => 'docs.component', 'param' => 'layout-collapsible-side'],
            ['title' => 'StackedSide', 'route' => 'docs.component', 'param' => 'layout-stacked-side'],
            ['title' => 'TopBarClassic', 'route' => 'docs.component', 'param' => 'layout-top-bar-classic'],
        ],
    ];

    public function home(): View
    {
        return view('docs.home', ['nav' => self::$nav]);
    }

    public function installation(): View
    {
        return view('docs.getting-started.installation', ['nav' => self::$nav, 'activePage' => 'installation']);
    }

    public function quickStart(): View
    {
        return view('docs.getting-started.quick-start', ['nav' => self::$nav, 'activePage' => 'quick-start']);
    }

    public function configuration(): View
    {
        return view('docs.getting-started.configuration', ['nav' => self::$nav, 'activePage' => 'configuration']);
    }

    public function theming(): View
    {
        return view('docs.theming.overview', ['nav' => self::$nav, 'activePage' => 'theming']);
    }

    public function themingColors(): View
    {
        return view('docs.theming.colors', ['nav' => self::$nav, 'activePage' => 'theming/colors']);
    }

    public function themingDarkMode(): View
    {
        return view('docs.theming.dark-mode', ['nav' => self::$nav, 'activePage' => 'theming/dark-mode']);
    }

    public function themingPresets(): View
    {
        return view('docs.theming.presets', ['nav' => self::$nav, 'activePage' => 'theming/presets']);
    }

    public function component(string $component): View
    {
        $view = 'docs.components.' . $component;

        if (!view()->exists($view)) {
            $view = 'docs.components._placeholder';
        }

        return view($view, [
            'nav' => self::$nav,
            'activePage' => $component,
            'component' => $component,
        ]);
    }
}
