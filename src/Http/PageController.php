<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 07.06.2021
 * Time: 20:49
 */
namespace App\Http;


class PageController extends Controller
{
    public function showAction($alias)
    {
        return $this->render('page', ['alias' => $alias]);
    }
}