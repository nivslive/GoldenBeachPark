<?php

use Template\Infra\EntityManagerCreator;


$entityManagerFactory = new EntityManagerCreator();
return $entityManager = $entityManagerFactory->getEntityManager();

