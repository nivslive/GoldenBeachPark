<?php

namespace Template\Controller;

use Doctrine\ORM\EntityManagerInterface;
use League\Plates\Engine;

use Template\Entity\Acomodacao;
use Template\Entity\Banner;
use Template\Entity\Depoimento;
use Template\Entity\Diferenciais;
use Template\Entity\ItensAcomodacao;

use Template\Entity\Tarifa;
use Template\Entity\ItensTarifa;
use Template\Entity\Maravilhas;
use Template\Entity\Politica;
use Template\Entity\Section;
use Template\Entity\Servico;

class Web 
{

    private $view;
    private $banner;
    private $repositoryAcomodacao;
    private $repositoryItensAcomodacao;
    
    private $repositoryMaravilhas;

    private $repositoryDiferenciais;

    private $repositoryTarifas;
    private $repositoryItensTarifas;

    private $repositorySection;
    private $repositoryPolitica;
    private $repositoryServicos;






    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/site/');
        $this->repositoryAcomodacao = $entityManager->getRepository(Acomodacao::class);
        $this->repositoryItensAcomodacao = $entityManager->getRepository(ItensAcomodacao::class);

        $this->banner = $entityManager->getRepository(Banner::class);

        $this->repositoryServicos = $entityManager->getRepository(Servico::class);

        $this->repositoryMaravilhas = $entityManager->getRepository(Maravilhas::class);

        $this->repositoryDiferenciais = $entityManager->getRepository(Diferenciais::class);

        $this->repositoryTarifas = $entityManager->getRepository(Tarifa::class);
        $this->repositoryItensTarifas = $entityManager->getRepository(ItensTarifa::class);

        $this->repositoryDepoimentos = $entityManager->getRepository(Depoimento::class);

        $this->repositorySection = $entityManager->getRepository(Section::class);

        $this->repositoryPolitica = $entityManager->getRepository(Politica::class);

        
    }

    public function index()
    {

        $_SESSION['reservas_persist'] = false; 
        echo $this->view->render('home', [
            'banner' => $this->banner->findBy(['page' => 'home']),
            'ceara' => $this->repositorySection->findBy(['section' => 'ceara']),
            'fortaleza' => $this->repositorySection->findBy(['section' => 'fortaleza']),
            'depoimentos' => $this->repositoryDepoimentos->findAll(),
            'hotel' => $this->repositoryMaravilhas->findBy(['section' => 'hotel']),
            'quartos' => $this->repositoryMaravilhas->findBy(['section' => 'quartos']),
            'lazer' => $this->repositoryMaravilhas->findBy(['section' => 'lazer']),
            'passeios' => $this->repositoryMaravilhas->findBy(['section' => 'passeios']),
            'diferenciais' => $this->repositoryDiferenciais->findAll(),

        ]);
    }

    public function reservas_persist() {

        $_SESSION['reservas_persist'] = true; 
        echo $this->view->render('home', [ 
            'banner' => $this->banner->findBy(['page' => 'home']),

        ]);

    }

    public function quemsomos()
    {
        echo $this->view->render('QuemSomos', [
            'banner' => $this->banner->findBy(['page' => 'quemsomos']),
        ]);
    }

 

    public function contato()
    {
        echo $this->view->render('contato', [
            'banner' => $this->banner->findBy(['page' => 'contato']),
        ]);
    }


    public function politicas()
    {
        echo $this->view->render('Politicas', [
            'data' => $this->repositoryPolitica->findAll(),
            'banner' => $this->banner->findBy(['page' => 'politicas']),
        ]);
    }


    public function reservas()
    {
        echo $this->view->render('Reservas', [
                        'banner' => $this->banner->findBy(['page' => 'reservas']),
        ]);
    }


    public function servicos()
    {
        echo $this->view->render('Servicos', [
                        'data' => $this->repositoryServicos->findAll(),
                        'banner' => $this->banner->findBy(['page' => 'servicos']),
        ]);
    }


    public function tarifas()
    {
        echo $this->view->render('Tarifas', [ 'data' => $this->repositoryTarifas->findAll(),
    'itens' => $this->repositoryItensTarifas->findAll(),
    'banner' => $this->banner->findBy(['page' => 'tarifas']),]);
    }


    public function fortaleza()
    {
        echo $this->view->render('Fortaleza', [   'data' => $this->repositorySection->findBy(['section' => 'fortaleza']),
        'banner' => $this->banner->findBy(['page' => 'fortaleza']), ]);
    }


    public function ceara()
    {
        echo $this->view->render('Ceara', [   'data' => $this->repositorySection->findBy(['section' => 'ceara']),
        'banner' => $this->banner->findBy(['page' => 'ceara']), ]);
    }


    public function estrutura()
    {
        
        echo $this->view->render('Estrutura', [      
             'data' => $this->repositorySection->findBy(['section' => 'estrutura']),
             'banner' => $this->banner->findBy(['page' => 'estrutura']),  ]);
    }

    public function acomodacoes()
    {
        echo $this->view->render('Acomodacoes', [    
            
            'acomodacao' => $this->repositoryAcomodacao->findAll(),
            'itens' => $this->repositoryItensAcomodacao->findAll(),
            'banner' => $this->banner->findBy(['page' => 'acomodacao']),
            
            ]
    );


      
    }
    

}
