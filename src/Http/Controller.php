<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 07.06.2021
 * Time: 20:35
 */

namespace App\Http;

use App\System\Controllers\IController;
use App\System\view\View;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller implements IController
{

    protected $view;

    public function render($path, $data = [])
    {
        // TODO: Implement render() method.
        return new Response($this->view->make($path, $data));
    }

    public function __construct()
    {
        $this->view = new View();
    }
}