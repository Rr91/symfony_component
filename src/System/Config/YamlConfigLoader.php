<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 11.06.2021
 * Time: 19:36
 */

namespace App\System\Config;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;


class YamlConfigLoader extends FileLoader
{
    public function load($resource, $type = null)
    {
        // TODO: Implement load() method.
        return Yaml::parse(file_get_contents($resource));
    }

    public function supports($resource, $type = null)
    {
        // TODO: Implement supports() method.
        return is_string($resource) && "yaml" == pathinfo($resource, PATHINFO_EXTENSION);
    }


}