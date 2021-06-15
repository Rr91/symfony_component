<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 11.06.2021
 * Time: 19:31
 */

namespace App\System\Config;

use Symfony\Component\Config\FileLocator;

class Config implements IConfig
{
    private $config = [];
    private $loader;
    private $locator;

    public function __construct($dir)
    {
        $directories = [
            BASEPATH."/".$dir
        ];
        $this->setLocator($directories);
        $this->setLoader();
    }

    public function addConfig($file)
    {
        // TODO: Implement addConfig() method.

        $configValues = $this->loader->load($this->locator->locate($file));
        if($configValues){
            foreach ($configValues as $key=>$arr){
                $this->config[$key] = $arr;
            }
        }
    }

    public function get($keyValue)
    {
        // TODO: Implement get() method.
        list($key, $value) = explode(".", $keyValue);
        if($key && isset($this->config[$key])){
            if($value && $this->config[$key][$value]){
                return $this->config[$key][$value];
            }
            else{
                return $this->config[$key];
            }
        }
        return null;
    }

    public function getCongig(){
        return $this->config;
    }

    public function setLoader(){
        $this->loader = new YamlConfigLoader($this->locator);
    }

    public function setLocator($dir){
        $this->locator = new FileLocator($dir);
    }
}