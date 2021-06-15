<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 07.06.2021
 * Time: 20:40
 */

namespace App\System\view;

interface IView
{
    public function make($path, $data=[]);
}