<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 04.06.2021
 * Time: 20:12
 */

if(!function_exists('app')){
    function app(){ return \App\System\App::getInstance();}
}

if(!function_exists('config')){
    function config($keyValue){
        $config = app()->get('config');
        return $config->get($keyValue);
    }
}

