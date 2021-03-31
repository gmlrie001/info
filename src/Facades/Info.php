<?php

namespace Vault\Info\Facades;

// Illuminate Facades
use Illuminate\Support\Facades\Facade;


class Info extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'info';
    }

}
