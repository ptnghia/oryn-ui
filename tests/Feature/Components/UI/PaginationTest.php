<?php

test('pagination renders with total', function () {
    $view = $this->blade('<x-oryn-pagination :total="50" :pageSize="10" />');
    $view->assertSee('pagination');
    $view->assertSee('pagination-pager');
});

test('pagination renders correct page count', function () {
    $view = $this->blade('<x-oryn-pagination :total="50" :pageSize="10" />');
    // Should have 5 pages
    $view->assertSee('5');
});

test('pagination renders display total', function () {
    $view = $this->blade('<x-oryn-pagination :total="100" :pageSize="10" :displayTotal="true" />');
    $view->assertSee('Total 100');
});

test('pagination renders navigation arrows', function () {
    $view = $this->blade('<x-oryn-pagination :total="30" :pageSize="10" />');
    $view->assertSee('pagination-pager-prev');
    $view->assertSee('pagination-pager-next');
});

test('pagination dispatches page change', function () {
    $view = $this->blade('<x-oryn-pagination :total="30" :pageSize="10" />');
    $view->assertSee('page-change');
});

test('pagination renders with custom current page', function () {
    $view = $this->blade('<x-oryn-pagination :total="50" :pageSize="10" :currentPage="3" />');
    $view->assertSee('current: 3');
});

test('pagination component calculates page count', function () {
    $component = new \Oryn\UI\Components\UI\Pagination(total: 55, pageSize: 10);
    expect($component->pageCount())->toBe(6);
});
