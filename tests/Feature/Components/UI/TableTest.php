<?php

test('table renders with default classes', function () {
    $view = $this->blade('
        <x-oryn-table>
            <x-oryn-thead>
                <x-oryn-tr><x-oryn-th>Name</x-oryn-th></x-oryn-tr>
            </x-oryn-thead>
            <x-oryn-tbody>
                <x-oryn-tr><x-oryn-td>John</x-oryn-td></x-oryn-tr>
            </x-oryn-tbody>
        </x-oryn-table>
    ');
    $view->assertSee('table-default');
    $view->assertSee('Name');
    $view->assertSee('John');
});

test('table renders hoverable', function () {
    $view = $this->blade('
        <x-oryn-table :hoverable="true">
            <x-oryn-tbody>
                <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
            </x-oryn-tbody>
        </x-oryn-table>
    ');
    $view->assertSee('table-hover');
});

test('table renders compact', function () {
    $view = $this->blade('
        <x-oryn-table :compact="true">
            <x-oryn-tbody>
                <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
            </x-oryn-tbody>
        </x-oryn-table>
    ');
    $view->assertSee('table-compact');
});

test('table renders with cell borders', function () {
    $view = $this->blade('
        <x-oryn-table :cellBorder="true">
            <x-oryn-tbody>
                <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
            </x-oryn-tbody>
        </x-oryn-table>
    ');
    $view->assertSee('table-border');
});

test('table renders with tfoot', function () {
    $view = $this->blade('
        <x-oryn-table>
            <x-oryn-tbody>
                <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
            </x-oryn-tbody>
            <x-oryn-tfoot>
                <x-oryn-tr><x-oryn-td>Total</x-oryn-td></x-oryn-tr>
            </x-oryn-tfoot>
        </x-oryn-table>
    ');
    $view->assertSee('Total');
    $view->assertSee('<tfoot', false);
});

test('table sub-components forward attributes', function () {
    $view = $this->blade('<x-oryn-tr class="custom-row"><x-oryn-td class="custom-cell">Val</x-oryn-td></x-oryn-tr>');
    $view->assertSee('custom-row');
    $view->assertSee('custom-cell');
});

test('sorter renders with column', function () {
    $view = $this->blade('<x-oryn-sorter column="name">Name</x-oryn-sorter>');
    $view->assertSee('Name');
    $view->assertSee('sort');
    $view->assertSee('cursor-pointer');
});

test('table has overflow wrapper', function () {
    $view = $this->blade('
        <x-oryn-table>
            <x-oryn-tbody><x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr></x-oryn-tbody>
        </x-oryn-table>
    ');
    $view->assertSee('overflow-x-auto');
});
