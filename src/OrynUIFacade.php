<?php

namespace Oryn\UI;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oryn\UI\OrynUIManager
 */
class OrynUIFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'oryn-ui';
    }
}
