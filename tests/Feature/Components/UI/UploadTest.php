<?php

test('upload renders with default props', function () {
    $view = $this->blade('<x-oryn-upload><button>Choose file</button></x-oryn-upload>');
    $view->assertSee('upload');
    $view->assertSee('Choose file');
    $view->assertSee('x-data');
    $view->assertSee('type="file"', false);
});

test('upload renders draggable', function () {
    $view = $this->blade('<x-oryn-upload :draggable="true"><span>Drop files</span></x-oryn-upload>');
    $view->assertSee('upload-draggable');
    $view->assertSee('Drop files');
});

test('upload renders with accept', function () {
    $view = $this->blade('<x-oryn-upload accept="image/*"><button>Upload</button></x-oryn-upload>');
    $view->assertSee('accept="image/*"', false);
});

test('upload renders with multiple', function () {
    $view = $this->blade('<x-oryn-upload :multiple="true"><button>Upload</button></x-oryn-upload>');
    $view->assertSee('multiple');
});

test('upload renders disabled', function () {
    $view = $this->blade('<x-oryn-upload :disabled="true"><button>Upload</button></x-oryn-upload>');
    $view->assertSee('disabled');
});

test('upload renders tip text', function () {
    $view = $this->blade('<x-oryn-upload tip="Max 5MB"><button>Upload</button></x-oryn-upload>');
    $view->assertSee('Max 5MB');
});

test('upload renders file list', function () {
    $view = $this->blade('<x-oryn-upload><button>Upload</button></x-oryn-upload>');
    $view->assertSee('upload-file-list');
});

test('upload hides file list when disabled', function () {
    $view = $this->blade('<x-oryn-upload :showList="false"><button>Upload</button></x-oryn-upload>');
    $view->assertDontSee('upload-file-list');
});
