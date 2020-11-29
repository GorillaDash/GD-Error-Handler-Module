<?php

namespace GorillaDash\ErrorHandler\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Handler
 *
 * @method push($websiteUrl, $message, $context, $traceString)
 * @package GorillaDash\ErrorHandler\Facade
 */
class Handler extends Facade
{
    /**
     * @see \GorillaDash\ErrorHandler\Handler
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'gd.error-handler';
    }
}
