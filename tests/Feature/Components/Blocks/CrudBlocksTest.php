<?php

// CRUD blocks tests

test('crud list renders with title and slot', function () {
    $view = $this->blade('
        <x-oryn-block-crud::crud-list title="Items">
            <p>Table content</p>
        </x-oryn-block-crud::crud-list>
    ');
    $view->assertSee('Items');
    $view->assertSee('Table content');
});

test('crud list renders with actions and tools', function () {
    $view = $this->blade('
        <x-oryn-block-crud::crud-list title="Items">
            <x-slot:actions><button>Add</button></x-slot:actions>
            <x-slot:tools><input type="search" /></x-slot:tools>
            Table
        </x-oryn-block-crud::crud-list>
    ');
    $view->assertSee('Add');
    $view->assertSee('search');
});

test('crud form renders with method spoofing', function () {
    $view = $this->blade('
        <x-oryn-block-crud::crud-form action="/items/1" method="PUT" submitLabel="Update">
            <p>Form fields</p>
        </x-oryn-block-crud::crud-form>
    ');
    $view->assertSee('Form fields');
    $view->assertSee('Update');
    $view->assertSee('PUT', false);
});

test('crud form renders with sidebar', function () {
    $view = $this->blade('
        <x-oryn-block-crud::crud-form action="/items">
            Main content
            <x-slot:sidebar>Side content</x-slot:sidebar>
        </x-oryn-block-crud::crud-form>
    ');
    $view->assertSee('Main content');
    $view->assertSee('Side content');
});

test('crud detail renders with sidebar', function () {
    $view = $this->blade('
        <x-oryn-block-crud::crud-detail>
            Detail content
            <x-slot:sidebar>Sidebar</x-slot:sidebar>
        </x-oryn-block-crud::crud-detail>
    ');
    $view->assertSee('Detail content');
    $view->assertSee('Sidebar');
});

test('customer list renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::customer-list createUrl="/customers/create">
            <p>Customer table</p>
        </x-oryn-block-crud::customer-list>
    ');
    $view->assertSee('Customers');
    $view->assertSee('Add New');
    $view->assertSee('Customer table');
});

test('customer create renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::customer-create action="/customers">
            <p>Form fields</p>
        </x-oryn-block-crud::customer-create>
    ');
    $view->assertSee('Form fields');
    $view->assertSee('Create');
});

test('customer edit renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::customer-edit action="/customers/1">
            <p>Edit fields</p>
        </x-oryn-block-crud::customer-edit>
    ');
    $view->assertSee('Edit fields');
    $view->assertSee('Save');
});

test('customer detail renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::customer-detail>
            <p>Customer info</p>
        </x-oryn-block-crud::customer-detail>
    ');
    $view->assertSee('Customer info');
});

test('product list renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::product-list createUrl="/products/create">
            <p>Product table</p>
        </x-oryn-block-crud::product-list>
    ');
    $view->assertSee('Products');
    $view->assertSee('Product table');
});

test('product create renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::product-create action="/products">
            <p>Product form</p>
        </x-oryn-block-crud::product-create>
    ');
    $view->assertSee('Product form');
    $view->assertSee('Create');
});

test('product edit renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::product-edit action="/products/1">
            <p>Edit product</p>
        </x-oryn-block-crud::product-edit>
    ');
    $view->assertSee('Edit product');
    $view->assertSee('Save');
});

test('order list renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::order-list>
            <p>Order table</p>
        </x-oryn-block-crud::order-list>
    ');
    $view->assertSee('Orders');
    $view->assertSee('Order table');
});

test('order create renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::order-create action="/orders">
            <p>Order form</p>
        </x-oryn-block-crud::order-create>
    ');
    $view->assertSee('Order form');
});

test('order edit renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::order-edit action="/orders/1">
            <p>Edit order</p>
        </x-oryn-block-crud::order-edit>
    ');
    $view->assertSee('Edit order');
});

test('order detail renders', function () {
    $view = $this->blade('
        <x-oryn-block-crud::order-detail>
            <p>Order info</p>
        </x-oryn-block-crud::order-detail>
    ');
    $view->assertSee('Order info');
});
