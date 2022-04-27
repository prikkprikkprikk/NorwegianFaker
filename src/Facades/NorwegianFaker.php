<?php

namespace Prikkprikkprikk\NorwegianFaker\Facades;

use Illuminate\Support\Facades\Facade;

class NorwegianFaker extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'norwegianfaker';
    }
}
