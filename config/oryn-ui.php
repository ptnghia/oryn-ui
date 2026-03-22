<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Theme Schema
    |--------------------------------------------------------------------------
    |
    | The active theme preset. Available: 'default', 'dark', 'green', 'purple', 'orange'
    | Leave empty to use the default theme.
    |
    */

    'theme_schema' => '',

    /*
    |--------------------------------------------------------------------------
    | Direction
    |--------------------------------------------------------------------------
    |
    | The text direction. Supports 'ltr' (left-to-right) and 'rtl' (right-to-left).
    |
    */

    'direction' => 'ltr',

    /*
    |--------------------------------------------------------------------------
    | Mode
    |--------------------------------------------------------------------------
    |
    | The default color mode. Supports 'light' and 'dark'.
    |
    */

    'mode' => 'light',

    /*
    |--------------------------------------------------------------------------
    | Control Size
    |--------------------------------------------------------------------------
    |
    | The default size for form controls. Supports 'sm', 'md', 'lg'.
    |
    */

    'control_size' => 'md',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Default layout configuration.
    |
    */

    'layout' => [
        'type' => 'collapsible-side',
        'side_nav_collapse' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | CSS class prefix and Blade component prefix.
    |
    */

    'prefix' => 'oryn',

    /*
    |--------------------------------------------------------------------------
    | Theme Presets
    |--------------------------------------------------------------------------
    |
    | Color definitions for each theme preset.
    | Each preset defines light and dark mode variables.
    |
    */

    'presets' => [
        'default' => [
            'light' => [
                'primary' => '#2a85ff',
                'primary-deep' => '#0069f6',
                'primary-mild' => '#4996ff',
                'primary-subtle' => '#2a85ff1a',
                'neutral' => '#ffffff',
            ],
            'dark' => [
                'primary' => '#2a85ff',
                'primary-deep' => '#0069f6',
                'primary-mild' => '#4996ff',
                'primary-subtle' => '#2a85ff1a',
                'neutral' => '#ffffff',
            ],
        ],
        'dark' => [
            'light' => [
                'primary' => '#18181b',
                'primary-deep' => '#09090b',
                'primary-mild' => '#27272a',
                'primary-subtle' => '#18181b0d',
                'neutral' => '#ffffff',
            ],
            'dark' => [
                'primary' => '#ffffff',
                'primary-deep' => '#09090b',
                'primary-mild' => '#e5e7eb',
                'primary-subtle' => '#ffffff1a',
                'neutral' => '#111827',
            ],
        ],
        'green' => [
            'light' => [
                'primary' => '#0CAF60',
                'primary-deep' => '#088d50',
                'primary-mild' => '#34c779',
                'primary-subtle' => '#0CAF601a',
                'neutral' => '#ffffff',
            ],
            'dark' => [
                'primary' => '#0CAF60',
                'primary-deep' => '#088d50',
                'primary-mild' => '#34c779',
                'primary-subtle' => '#0CAF601a',
                'neutral' => '#ffffff',
            ],
        ],
        'purple' => [
            'light' => [
                'primary' => '#8C62FF',
                'primary-deep' => '#704acc',
                'primary-mild' => '#a784ff',
                'primary-subtle' => '#8C62FF1a',
                'neutral' => '#ffffff',
            ],
            'dark' => [
                'primary' => '#8C62FF',
                'primary-deep' => '#704acc',
                'primary-mild' => '#a784ff',
                'primary-subtle' => '#8C62FF1a',
                'neutral' => '#ffffff',
            ],
        ],
        'orange' => [
            'light' => [
                'primary' => '#fb732c',
                'primary-deep' => '#cc5c24',
                'primary-mild' => '#fc8f56',
                'primary-subtle' => '#fb732c1a',
                'neutral' => '#ffffff',
            ],
            'dark' => [
                'primary' => '#fb732c',
                'primary-deep' => '#cc5c24',
                'primary-mild' => '#fc8f56',
                'primary-subtle' => '#fb732c1a',
                'neutral' => '#ffffff',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout Constants
    |--------------------------------------------------------------------------
    */

    'side_nav_width' => 290,
    'side_nav_collapsed_width' => 80,
    'stacked_side_nav_mini_width' => 80,
    'stacked_side_nav_secondary_width' => 270,
    'header_height' => 64,

    /*
    |--------------------------------------------------------------------------
    | Vendor Libraries (CDN)
    |--------------------------------------------------------------------------
    |
    | CDN URLs for third-party libraries used by Tier 4 components.
    | Set 'cdn' => true to auto-inject CDN scripts, or false if loading via npm.
    | Override individual URLs if you need a specific version.
    |
    */

    'vendors' => [
        'cdn' => false,

        'apexcharts' => [
            'js' => 'https://cdn.jsdelivr.net/npm/apexcharts@4.3.0/dist/apexcharts.min.js',
        ],

        'leaflet' => [
            'js' => 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
            'css' => 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
        ],

        'tiptap' => [
            'js' => 'https://cdn.jsdelivr.net/npm/@tiptap/core@2.11.5/dist/index.umd.min.js',
        ],

        'prismjs' => [
            'js' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js',
            'css' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism-tomorrow.min.css',
        ],

        'fullcalendar' => [
            'js' => 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js',
        ],

        'frappe_gantt' => [
            'js' => 'https://cdn.jsdelivr.net/npm/frappe-gantt@0.6.1/dist/frappe-gantt.min.js',
            'css' => 'https://cdn.jsdelivr.net/npm/frappe-gantt@0.6.1/dist/frappe-gantt.min.css',
        ],
    ],

];
