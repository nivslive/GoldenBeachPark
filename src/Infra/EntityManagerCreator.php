<?php
namespace Template\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . "/../Entity"];
        $isDevMode = false;

        $dbParams = [
            "driver"   => "pdo_mysql",
            "user"     => "root",
            "password" => "",
            "dbname"   => "mazukimcom_beachpark_db",
	    "port" => "localhost:3306"
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
