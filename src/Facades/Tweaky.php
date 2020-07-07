<?php

namespace Laratweaky\Facades;

use Illuminate\Support\Facades\Facade;

class Tweaky extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tweaky';
    }
}
