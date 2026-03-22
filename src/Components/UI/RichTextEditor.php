<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class RichTextEditor extends Component
{
    public function __construct(
        public string $content = '',
        public string $placeholder = 'Write something...',
        public bool $invalid = false,
        public bool $editable = true,
    ) {}

    /** Default toolbar buttons. */
    public function toolbarButtons(): array
    {
        return [
            ['action' => 'toggleBold', 'icon' => 'bold', 'label' => 'Bold', 'check' => 'bold'],
            ['action' => 'toggleItalic', 'icon' => 'italic', 'label' => 'Italic', 'check' => 'italic'],
            ['action' => 'toggleStrike', 'icon' => 'strikethrough', 'label' => 'Strikethrough', 'check' => 'strike'],
            ['action' => 'toggleCode', 'icon' => 'code', 'label' => 'Code', 'check' => 'code'],
            ['action' => 'toggleBlockquote', 'icon' => 'quote', 'label' => 'Blockquote', 'check' => 'blockquote'],
            ['action' => 'toggleBulletList', 'icon' => 'list-ul', 'label' => 'Bullet List', 'check' => 'bulletList'],
            ['action' => 'toggleOrderedList', 'icon' => 'list-ol', 'label' => 'Ordered List', 'check' => 'orderedList'],
            ['action' => 'toggleCodeBlock', 'icon' => 'code-block', 'label' => 'Code Block', 'check' => 'codeBlock'],
            ['action' => 'setHorizontalRule', 'icon' => 'hr', 'label' => 'Horizontal Rule', 'check' => null],
        ];
    }

    public function render()
    {
        return view('oryn-ui::components.ui.rich-text-editor');
    }
}
