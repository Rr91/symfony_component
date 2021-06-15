<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 07.06.2021
 * Time: 20:42
 */

namespace App\System\view;

use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

class View implements IView
{
    private $templating;

    public function __construct()
    {
        $filesystemLoader = new FilesystemLoader(BASEPATH."/resources/views/%name%.php");
        $this->templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
    }

    public function make($path, $data = [])
    {
        // TODO: Implement make() method.

        return $this->templating->render($path, $data);
    }
}