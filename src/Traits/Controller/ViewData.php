<?php

namespace Laratweaky\Traits\Controller;

/**
 * 
 */
trait ViewData
{

    protected static $viewDriver = 'default';

    protected static $currentViewDriver = null;

    private static $DATA;

    private static $preData;

    

    public static function _data()
    {
        return static::$DATA;
    }


    public static function _view(string $view = '')
    {
        self::_fetchDriver();
        return view($view)->with( static::_data() );

    }


    public static function _push(string $key, $data)
    {
        return static::$DATA[$key] = $data;
    }


    public static function _pull(string $key)
    {
        if (isset( static::$DATA[$key] ) ) unset(static::$DATA[$key]);
    }


    public static function _fetchDriver()
    {
        if (!is_null(static::$currentViewDriver) && is_array(static::$currentViewDriver)) return;

        $drivers = config('tweaky.viewdrivers', []);

        if (isset($drivers[static::$viewDriver])){

            static::$currentViewDriver = $drivers[static::$viewDriver];

        }else{

            static::$currentViewDriver = $drivers[static::$viewDriver];

        }
    }
}
