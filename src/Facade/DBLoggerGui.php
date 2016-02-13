<?php namespace Gazatem\DBLoggerGui\Facade;

use Illuminate\Support\Facades\Facade;

class DBLoggerGui extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'dblogger-gui';
    }

}