<?php

// Dashboard blocks tests

test('ecommerce dashboard renders', function () {
    $view = $this->blade('
        <x-oryn-block-dashboard::ecommerce>
            <x-slot:overview>Overview</x-slot:overview>
            <x-slot:recentOrders>Orders Table</x-slot:recentOrders>
        </x-oryn-block-dashboard::ecommerce>
    ');
    $view->assertSee('Overview');
    $view->assertSee('Orders Table');
});

test('ecommerce dashboard renders with sidebar slots', function () {
    $view = $this->blade('
        <x-oryn-block-dashboard::ecommerce>
            <x-slot:overview>Overview</x-slot:overview>
            <x-slot:demographic>Demographic</x-slot:demographic>
            <x-slot:salesTarget>Sales</x-slot:salesTarget>
            <x-slot:topProduct>Products</x-slot:topProduct>
        </x-oryn-block-dashboard::ecommerce>
    ');
    $view->assertSee('Demographic');
    $view->assertSee('Sales');
    $view->assertSee('Products');
});

test('project dashboard renders', function () {
    $view = $this->blade('
        <x-oryn-block-dashboard::project>
            <x-slot:projectOverview>Overview</x-slot:projectOverview>
            <x-slot:currentTasks>Tasks</x-slot:currentTasks>
        </x-oryn-block-dashboard::project>
    ');
    $view->assertSee('Overview');
    $view->assertSee('Tasks');
});

test('analytic dashboard renders', function () {
    $view = $this->blade('
        <x-oryn-block-dashboard::analytic>
            <x-slot:analyticChart>Chart</x-slot:analyticChart>
            <x-slot:metrics>Metrics</x-slot:metrics>
        </x-oryn-block-dashboard::analytic>
    ');
    $view->assertSee('Chart');
    $view->assertSee('Metrics');
});

test('marketing dashboard renders', function () {
    $view = $this->blade('
        <x-oryn-block-dashboard::marketing>
            <x-slot:kpiSummary>KPIs</x-slot:kpiSummary>
            <x-slot:adsPerformance>Ads</x-slot:adsPerformance>
            <x-slot:recentCampaign>Campaigns</x-slot:recentCampaign>
        </x-oryn-block-dashboard::marketing>
    ');
    $view->assertSee('KPIs');
    $view->assertSee('Ads');
    $view->assertSee('Campaigns');
});
