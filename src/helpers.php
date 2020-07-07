<?php

use Laratweaky\Tweaky;


if (!function_exists('tweaky')){

    /**
     * Return an active tweaky instance
     */
    function tweaky() : Tweaky
    {

        return Tweaky::instance();

    }

}