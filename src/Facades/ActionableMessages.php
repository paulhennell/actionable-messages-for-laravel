<?php

namespace PaulHennell\ActionableMessages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PaulHennell\ActionableMessages\ActionableMessages
 */
class ActionableMessages extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \PaulHennell\ActionableMessages\ActionableMessages::class;
    }
}
