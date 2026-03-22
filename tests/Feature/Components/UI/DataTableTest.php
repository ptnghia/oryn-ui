<?php

// ============================================================
// DataTable — Rendering
// ============================================================

test('data-table renders with columns and rows', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[
                [\'header\' => \'Name\', \'accessorKey\' => \'name\'],
                [\'header\' => \'Email\', \'accessorKey\' => \'email\'],
            ]"
            :pagingData="[\'total\' => 2, \'pageIndex\' => 1, \'pageSize\' => 10]"
        >
            <x-oryn-tr><x-oryn-td>John</x-oryn-td><x-oryn-td>john@test.com</x-oryn-td></x-oryn-tr>
            <x-oryn-tr><x-oryn-td>Jane</x-oryn-td><x-oryn-td>jane@test.com</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    $view->assertSee('Name');
    $view->assertSee('Email');
    $view->assertSee('John');
    $view->assertSee('jane@test.com');
});

test('data-table renders with alpine x-data', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain('x-data');
    expect($html)->toContain('sorting');
    expect($html)->toContain('selected');
});

test('data-table renders hoverable table by default', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    $view->assertSee('table-hover');
});

// ============================================================
// DataTable — Sorting
// ============================================================

test('data-table renders sortable column headers', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\', \'sortable\' => true]]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain("sort('name')");
    expect($html)->toContain("sortIcon('name')");
});

test('data-table renders non-sortable column without sort controls', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Actions\', \'accessorKey\' => \'actions\']]"
        >
            <x-oryn-tr><x-oryn-td>Edit</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->not->toContain("sort('actions')");
    expect($html)->toContain('Actions');
});

// ============================================================
// DataTable — Selection
// ============================================================

test('data-table renders selectable checkboxes', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :selectable="true"
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain('toggleSelectAll');
    expect($html)->toContain('type="checkbox"');
});

test('data-table without selectable has no select-all checkbox', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->not->toContain('type="checkbox"');
});

// ============================================================
// DataTable — Pagination
// ============================================================

test('data-table renders pagination when total > 0', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :pagingData="[\'total\' => 50, \'pageIndex\' => 1, \'pageSize\' => 10]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    $view->assertSee('pagination');
});

test('data-table hides pagination when total is 0', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :pagingData="[\'total\' => 0, \'pageIndex\' => 1, \'pageSize\' => 10]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->not->toContain('pagination');
});

test('data-table renders page size selector', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :pagingData="[\'total\' => 50, \'pageIndex\' => 1, \'pageSize\' => 10]"
            :pageSizes="[10, 25, 50]"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain('10 \/ page');
    expect($html)->toContain('select');
});

// ============================================================
// DataTable — No Data / Loading
// ============================================================

test('data-table renders no data state', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :noData="true"
        />
    ');
    $view->assertSee('No data found!');
});

test('data-table renders custom no data text', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :noData="true"
            noDataText="Nothing here"
        />
    ');
    $view->assertSee('Nothing here');
});

test('data-table renders custom no data icon slot', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :noData="true"
        >
            <x-slot:noDataIcon><span>CustomEmpty</span></x-slot:noDataIcon>
        </x-oryn-data-table>
    ');
    $view->assertSee('CustomEmpty');
});

test('data-table renders skeleton loading rows', function () {
    $view = $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :loading="true"
            :noData="true"
            :skeletonRows="3"
        />
    ');
    $view->assertSee('skeleton');
});

test('data-table renders loading spinner overlay', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            :loading="true"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain('loading');
    expect($html)->toContain('animate-spin');
});

// ============================================================
// DataTable — Column Width
// ============================================================

test('data-table renders column with custom width', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'ID\', \'accessorKey\' => \'id\', \'width\' => 80]]"
        >
            <x-oryn-tr><x-oryn-td>1</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain('width: 80px');
});

// ============================================================
// DataTable — PHP class unit tests
// ============================================================

test('data-table php class returns correct total', function () {
    $table = new \Oryn\UI\Components\UI\DataTable(
        pagingData: ['total' => 100, 'pageIndex' => 2, 'pageSize' => 25]
    );
    expect($table->total())->toBe(100);
    expect($table->pageIndex())->toBe(2);
    expect($table->pageSize())->toBe(25);
});

test('data-table php class returns page size options', function () {
    $table = new \Oryn\UI\Components\UI\DataTable(pageSizes: [10, 25]);
    $options = $table->pageSizeOptions();
    expect($options)->toHaveCount(2);
    expect($options[0]['value'])->toBe(10);
    expect($options[0]['label'])->toBe('10 / page');
    expect($options[1]['value'])->toBe(25);
    expect($options[1]['label'])->toBe('25 / page');
});

test('data-table forwards extra attributes', function () {
    $html = (string) $this->blade('
        <x-oryn-data-table
            :columns="[[\'header\' => \'Name\', \'accessorKey\' => \'name\']]"
            class="my-custom-class"
            id="users-table"
        >
            <x-oryn-tr><x-oryn-td>Data</x-oryn-td></x-oryn-tr>
        </x-oryn-data-table>
    ');
    expect($html)->toContain('my-custom-class');
    expect($html)->toContain('id="users-table"');
});
