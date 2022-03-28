<?php
namespace Template\Infra;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;


class EntityManagerCreator
{
    /**
     * 
     * 
     * 
     * 
     */
    public function getEntityManager(): EntityManagerInterface
    {
/**O usuário “mazukimcom_root” foi adicionado ao banco de dados “mazukimcom_beachpark_db”. */
define('URL_HOST', 'localhost');
define('URL_PORT', '3306');
define('DB_NAME', 'mazukimcom_beachpark_db');
define('DB_USER', 'root');
define('DB_PASS', 'mazukimcom_root');
        
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = true;

        $dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => DB_USER ? DB_USER : 'root',
            'password' => DB_PASS ? DB_PASS : '',
            'dbname'   => DB_NAME ? DB_NAME : 'root',
            'host' =>URL_HOST ? URL_HOST.':'.URL_PORT : 'localhost'
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
