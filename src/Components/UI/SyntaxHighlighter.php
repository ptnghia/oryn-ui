<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class SyntaxHighlighter extends Component
{
    public function __construct(
        public string $language = 'javascript',
        public string $code = '',
        public bool $showLineNumbers = false,
        public bool $showCopyButton = true,
        public string $theme = 'oneDark',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.syntax-highlighter');
    }
}
