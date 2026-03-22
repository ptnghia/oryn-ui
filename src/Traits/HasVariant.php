<?php

namespace Oryn\UI\Traits;

trait HasVariant
{
    public string $variant = 'default';

    public function variantClass(string $prefix): string
    {
        return "{$prefix}-{$this->variant}";
    }

    public static function variants(): array
    {
        return ['default', 'success', 'warning', 'error', 'info'];
    }
}
