<?php

namespace Oryn\UI\Traits;

trait HasSize
{
    public string $size = 'md';

    public function sizeClass(string $prefix): string
    {
        return "{$prefix}-{$this->size}";
    }

    public static function sizes(): array
    {
        return ['sm', 'md', 'lg'];
    }
}
