<?php

namespace App\System;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;

class App{

    private $request;
    private $router;
    private $routes;
    private $requestContext;
    private $controller;
    private $arguments;
    private $basePath;
    private $container = [];



    public static $instance = null;

    public static function getInstance($basepath = null)
    {
        if(!self::$instance) self::$instance = new App($basepath);
        return self::$instance;

    }

    private function __construct($basepath = null)
    {
        $this->basePath = $basepath;
        $this->setRequest();
        $this->setRequestContext();
        $this->setRouter();
        $this->routes = $this->router->getRouteCollection();
    }

    private function setRequest()
    {
        $this->request = Request::createFromGlobals();
    }

    private function setRequestContext()
    {
        $this->requestContext = new RequestContext();
        $this->requestContext->fromRequest($this->request);
    }
    public function getRequest()
    {
        return $this->request;
    }
    public function getRequestContext()
    {
        return $this->requestContext;
    }

    private function setRouter()
    {
        $fileLocator = new FileLocator(array(__DIR__));
        $this->router = new Router(
            new YamlFileLoader($fileLocator),
            $this->basePath."/config/routers.yaml",
            array('cache_dir' => $this->basePath."/storage/cache")
        );
    }

    public function getController()
    {
        return (new ControllerResolver())->getController($this->request);
    }
    public function getArguments()
    {
        return (new ArgumentResolver())->getArguments($this->request, $this->controller);
    }

    public function run()
    {
        $matcher = new UrlMatcher($this->routes, $this->requestContext);

        try{
            $this->request->attributes->add($matcher->match($this->request->getPathInfo()));
            $this->controller = $this->getController();
            $this->arguments= $this->getArguments();
            $responce = call_user_func_array($this->controller, $this->arguments);

        }catch (\Exception $e){
            exit('error');
        }
        $responce->send();
    }

    public function add($key, $object){
        $this->container[$key] = $object;
        return $object;
    }

    public function get($key){
        if(isset($this->container[$key])) return $this->container[$key];
        return null;
    }
}