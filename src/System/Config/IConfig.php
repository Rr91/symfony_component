<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 11.06.2021
 * Time: 19:30
 */

namespace App\System\Config;

interface IConfig{
    public function addConfig($file);
    public function get($keyValue);
}