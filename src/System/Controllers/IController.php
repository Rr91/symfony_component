<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 07.06.2021
 * Time: 20:33
 */

namespace App\System\Controllers;

interface IController
{
    public function render($path, $data = []);
}