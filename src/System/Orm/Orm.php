<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 15.06.2021
 * Time: 19:22
 */

namespace App\System\Orm;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;


class Orm
{
    private $params;
    private $entityManager;

    public function __construct($params)
    {
        $this->params = $params;
        $config = Setup::createAnnotationMetadataConfiguration(array("src/Entities"), true);
        $entityManager = EntityManager::create($this->params, $config);
        $this->setEntityManager($entityManager);
    }

    public function setEntityManager($entityManager){
        $this->entityManager = $entityManager;
    }
    public function getEntityManager(){
        return $this->entityManager;
    }
}