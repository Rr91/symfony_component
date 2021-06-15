<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 04.06.2021
 * Time: 20:17
 */

define("BASEPATH", dirname(__DIR__));

$app = \App\System\App::getInstance(BASEPATH);

$config = new App\System\Config\Config('config');
$config->addConfig('database.yaml');
$config->addConfig('app.yaml');

$app->add('config', $config);
//dd($config->get('database.user'));

if(config('system.orm')){
    $orm = new \App\System\Orm\Orm(config('database'));
    $app->add('orm', $orm);
}

return $app;