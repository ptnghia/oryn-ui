@props([
    'variant' => 'light',
    'sideCollapsed' => false,
    'defaultActiveKey' => null,
    'defaultExpandedKey' => null,
    'routeMatching' => false,
])

<nav
    x-data="{
        activeKey: '{{ $defaultActiveKey }}',
        expandedKey: '{{ $defaultExpandedKey }}',
        sideCollapsed: {{ $sideCollapsed ? 'true' : 'false' }},
        routeMatching: {{ $routeMatching ? 'true' : 'false' }},
        setActive(key) { this.activeKey = key; },
        toggleExpand(key) { this.expandedKey = this.expandedKey === key ? '' : key; },
        isActive(key) { return this.activeKey === key; },
        isExpanded(key) { return this.expandedKey === key; },
        init() {
            if (!this.routeMatching || this.activeKey) return;
            const path = window.location.pathname;
            const links = this.$el.querySelectorAll('a[href]');
            let bestMatch = null;
            let bestLength = 0;
            links.forEach(link => {
                const href = new URL(link.href, window.location.origin).pathname;
                if (path === href || (href !== '/' && path.startsWith(href))) {
                    if (href.length > bestLength) {
                        bestMatch = link;
                        bestLength = href.length;
                    }
                }
            });
            if (bestMatch) {
                const key = bestMatch.getAttribute('data-event-key');
                if (key) {
                    this.activeKey = key;
                    const collapse = bestMatch.closest('[data-collapse-key]');
                    if (collapse) this.expandedKey = collapse.getAttribute('data-collapse-key');
                }
            }
        }
    }"
    {{ $attributes->merge(['class' => $variantClass()]) }}
>
    {{ $slot }}
</nav>
