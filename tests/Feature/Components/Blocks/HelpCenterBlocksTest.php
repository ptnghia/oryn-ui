<?php

// Help Center blocks tests

test('support hub renders', function () {
    $view = $this->blade('
        <x-oryn-block-help::support-hub>
            <p>Categories</p>
        </x-oryn-block-help::support-hub>
    ');
    $view->assertSee('Assistance & Support Center');
    $view->assertSee('Categories');
});

test('support hub renders with search', function () {
    $view = $this->blade('
        <x-oryn-block-help::support-hub>
            <x-slot:search><input type="search" placeholder="Search" /></x-slot:search>
            Content
        </x-oryn-block-help::support-hub>
    ');
    $view->assertSee('search');
});

test('support hub renders with custom title', function () {
    $view = $this->blade('
        <x-oryn-block-help::support-hub title="Knowledge Base" subtitle="Find answers here">
            Content
        </x-oryn-block-help::support-hub>
    ');
    $view->assertSee('Knowledge Base');
    $view->assertSee('Find answers here');
});

test('article renders', function () {
    $view = $this->blade('
        <x-oryn-block-help::article>
            <div class="prose">Article body</div>
        </x-oryn-block-help::article>
    ');
    $view->assertSee('Article body');
});

test('article renders with table of contents', function () {
    $view = $this->blade('
        <x-oryn-block-help::article>
            Article content
            <x-slot:tableOfContents>TOC sidebar</x-slot:tableOfContents>
        </x-oryn-block-help::article>
    ');
    $view->assertSee('TOC sidebar');
    $view->assertSee('sticky');
});

test('article renders with feedback', function () {
    $view = $this->blade('
        <x-oryn-block-help::article>
            Article content
            <x-slot:feedback>Was this helpful?</x-slot:feedback>
        </x-oryn-block-help::article>
    ');
    $view->assertSee('Was this helpful?');
});

test('edit article renders', function () {
    $view = $this->blade('
        <x-oryn-block-help::edit-article action="/articles/1">
            <textarea>Editor</textarea>
        </x-oryn-block-help::edit-article>
    ');
    $view->assertSee('Editor');
    $view->assertSee('Save');
    $view->assertSee('articles/1');
});

test('manage articles renders', function () {
    $view = $this->blade('
        <x-oryn-block-help::manage-articles>
            <p>Articles table</p>
        </x-oryn-block-help::manage-articles>
    ');
    $view->assertSee('Manage Articles');
    $view->assertSee('Articles table');
});
