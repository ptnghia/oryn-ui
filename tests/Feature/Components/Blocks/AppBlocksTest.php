<?php

// App page blocks tests

test('project list renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::project-list>
            <p>Project cards</p>
        </x-oryn-block-app::project-list>
    ');
    $view->assertSee('Projects');
    $view->assertSee('Project cards');
});

test('project list renders with favorites', function () {
    $view = $this->blade('
        <x-oryn-block-app::project-list>
            <x-slot:favorites>Favorite cards</x-slot:favorites>
            Other projects
        </x-oryn-block-app::project-list>
    ');
    $view->assertSee('Favorite');
    $view->assertSee('Favorite cards');
});

test('project detail renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::project-detail title="My Project">
            <p>Project content</p>
        </x-oryn-block-app::project-detail>
    ');
    $view->assertSee('My Project');
    $view->assertSee('Project content');
});

test('project detail renders with navigation', function () {
    $view = $this->blade('
        <x-oryn-block-app::project-detail title="My Project">
            <x-slot:navigation>Nav items</x-slot:navigation>
            Content
        </x-oryn-block-app::project-detail>
    ');
    $view->assertSee('Nav items');
});

test('scrum board renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::scrum-board title="Sprint 2">
            <div>Column 1</div>
            <div>Column 2</div>
        </x-oryn-block-app::scrum-board>
    ');
    $view->assertSee('Sprint 2');
    $view->assertSee('Column 1');
    $view->assertSee('overflow-x-auto');
});

test('chat renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::chat>
            <x-slot:sidebar>Contacts</x-slot:sidebar>
            Messages
        </x-oryn-block-app::chat>
    ');
    $view->assertSee('Contacts');
    $view->assertSee('Messages');
});

test('chat renders with header and input', function () {
    $view = $this->blade('
        <x-oryn-block-app::chat>
            <x-slot:header>John Doe</x-slot:header>
            Messages
            <x-slot:input><textarea></textarea></x-slot:input>
        </x-oryn-block-app::chat>
    ');
    $view->assertSee('John Doe');
    $view->assertSee('Messages');
    $view->assertSee('textarea');
});

test('ai chat renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::ai-chat>
            <p>Chat content</p>
        </x-oryn-block-app::ai-chat>
    ');
    $view->assertSee('Chat content');
});

test('ai chat renders with side nav', function () {
    $view = $this->blade('
        <x-oryn-block-app::ai-chat>
            Chat content
            <x-slot:sideNav>History</x-slot:sideNav>
        </x-oryn-block-app::ai-chat>
    ');
    $view->assertSee('History');
});

test('ai image generator renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::ai-image>
            <x-slot:generator>Prompt area</x-slot:generator>
            Gallery
        </x-oryn-block-app::ai-image>
    ');
    $view->assertSee('Prompt area');
    $view->assertSee('Gallery');
});

test('calendar renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::calendar>
            <p>Calendar view</p>
        </x-oryn-block-app::calendar>
    ');
    $view->assertSee('Calendar view');
});

test('file manager renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::file-manager>
            <x-slot:header>Breadcrumb</x-slot:header>
            <x-slot:folders>Folder grid</x-slot:folders>
            File list
        </x-oryn-block-app::file-manager>
    ');
    $view->assertSee('Breadcrumb');
    $view->assertSee('Folders');
    $view->assertSee('Folder grid');
    $view->assertSee('File list');
});

test('tasks renders', function () {
    $view = $this->blade('
        <x-oryn-block-app::tasks>
            <p>Task items</p>
        </x-oryn-block-app::tasks>
    ');
    $view->assertSee('Tasks');
    $view->assertSee('Task items');
});
