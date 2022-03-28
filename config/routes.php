<?php

require __DIR__ . '/config.php';

use Template\Helper\Util;
use Template\Controller\Web;
use Template\Controller\Admin;
use Template\Controller\Error;
use Template\Controller\EstruturaController;
use Template\Controller\CearaController;
use Template\Controller\FortalezaController;
use CoffeeCode\Router\Router;
use Template\Controller\AcomodacaoController;
use Template\Controller\BannerController;
use Template\Controller\ContactController;
use Template\Controller\DepoimentoController;
use Template\Controller\DiferenciaisController;
use Template\Controller\MaravilhasController;
use Template\Controller\NewsletterController;
use Template\Controller\PoliticasController;
use Template\Controller\ServicosController;
use Template\Controller\TarifasController;
use Template\Security\Guard;

$router = new Router(URL_BASE);
$helper = new Util;

// Injetor de Dependencia Doctrine
$container = require __DIR__ . '/dependencies.php';

// Controladores para Segurança
$guard = new Guard();

// Controladores de Requisição
$web = new Web($container);
$admin = new Admin($container);
$error = new Error($container);


//Controllers de Administração do Site
$acomodacao = new AcomodacaoController($container);
$estrutura = new EstruturaController($container);
$banner = new BannerController($container);
$contact = new ContactController($container);
$ceara = new CearaController($container);
$fortaleza = new FortalezaController($container);
$newsletter = new NewsletterController($container);
$tarifas = new TarifasController($container);
$politicas = new PoliticasController($container);
$depoimentos = new DepoimentoController($container);
$maravilhas = new MaravilhasController($container);
$diferenciais = new DiferenciaisController($container);
$servicos = new ServicosController($container);

$router->namespace('src/Controller');

//ANALISAR VARIAVEIS SESSION
var_dump($_SESSION);

// ROTAS PUBLICAS
$router->group(null);

$router->get('/', function () use ($web){$web->index();});
$router->get('/quemsomos', function () use ($web){$web->quemsomos();});
$router->get('/acomodacoes', function () use ($web){$web->acomodacoes();});
$router->get('/estrutura', function () use ($web){$web->estrutura();});
$router->get('/servicos', function () use ($web){$web->servicos();});
$router->get('/ceara', function () use ($web){$web->ceara();});
$router->get('/fortaleza', function () use ($web){$web->fortaleza();});
$router->get('/tarifas', function () use ($web){$web->tarifas();});
$router->get('/reservas', function () use ($web){$web->reservas();});
$router->get('/politicas', function () use ($web){$web->politicas();});

        // Rotas de login e logout públicas
        $router->group('/dashboard');
        $router->get('/logout', function () use ($admin){$admin->logout();});


 // Rotas para home 
 $router->group('home');
 $router->get('/', function () use ($web){$web->index();});
 $router->get('/reservas', function ($data) use ($web){$web->reservas_persist($data);});


 // Rotas para newsletter
 $router->group('/newsletter');
 $router->post('/persist', function ($data) use ($newsletter){$newsletter->persist($data);});
  // Rotas para contact
  $router->group('/contact');
  $router->post('/persist', function ($data) use ($contact){$contact->persist($data);});

  $router->group('/login');
  $router->get('/', function () use ($admin){$admin->index();});

$router->group('/admin');
if(Isset($_SESSION['logado']) and $_SESSION['logado']):
    $router->get('/painel', function () use ($admin){$admin->painel();});
else:
    $router->get('/painel', function () use ($guard){$guard->tentativaPainel();});
endif;
    $router->post('/login', function ($data) use ($admin){$admin->login($data);});







//ROTAS ADMINISTRATIVAS E PRIVADAS (NECESSÁRIO AUTENTICAÇÃO)
if(Isset($_SESSION['logado']) and $_SESSION['logado']):


        // Rotas para Estrutura
        $router->group('/estrutura');
        $router->get('/create', function () use ($estrutura){$estrutura->create();});
        $router->post('/persist', function ($data) use ($estrutura){$estrutura->persist($data);});
        $router->get('/search', function () use ($estrutura){$estrutura->search();});
        $router->delete('/delete', function ($data) use ($estrutura){$estrutura->delete($data);});
        $router->put('/update', function ($data) use ($estrutura){$estrutura->update($data);});
        $router->get('/edit/{id}', function ($data) use ($estrutura){$estrutura->edit($data);});


        // Rotas para Acomodacao
        $router->group('/acomodacao');
        $router->get('/create', function () use ($acomodacao){$acomodacao->create();});
        $router->post('/persist', function ($data) use ($acomodacao){$acomodacao->persist($data);});
        $router->get('/search', function ($data) use ($acomodacao){$acomodacao->search($data);});
        $router->delete('/delete', function ($data) use ($acomodacao){$acomodacao->delete($data);});
        $router->put('/update', function ($data) use ($acomodacao){$acomodacao->update($data);});
        $router->get('/edit/{id}', function ($data) use ($acomodacao){$acomodacao->edit($data);});
        //Rotas para Itens da Acomodação
        $router->get('/itens/create/{id}', function ($data) use ($acomodacao){$acomodacao->itens_create($data);});
        $router->post('/itens/persist', function ($data) use ($acomodacao){$acomodacao->itens_persist($data);});
        $router->put('/itens/update', function ($data) use ($acomodacao){$acomodacao->itens_update($data);});
        $router->get('/itens/{id}', function ($data) use ($acomodacao){$acomodacao->itens_search($data);});
        $router->get('/itens/edit/{id}', function ($data) use ($acomodacao){$acomodacao->itens_edit($data);});
        $router->delete('/itens/delete', function ($data) use ($acomodacao){$acomodacao->itens_delete($data);});

        // Rotas para newsletter
        $router->group('/newsletter');
        $router->get('/create', function () use ($newsletter){$newsletter->create();});
        $router->post('/persist-admin', function ($data) use ($newsletter){$newsletter->persistAdmin($data);});
        $router->get('/search', function ($data) use ($newsletter){$newsletter->search($data);});
        $router->delete('/delete', function ($data) use ($newsletter){$newsletter->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($newsletter){$newsletter->edit($data);});
        $router->put('/update', function ($data) use ($newsletter){$newsletter->update($data);});

        
        // Rotas para Depoimentos
        $router->group('/depoimentos');
        $router->get('/search', function ($data) use ($depoimentos){$depoimentos->search($data);});
        $router->get('/create', function () use ($depoimentos){$depoimentos->create();});
        $router->post('/persist', function ($data) use ($depoimentos){$depoimentos->persist($data);});
        $router->delete('/delete', function ($data) use ($depoimentos){$depoimentos->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($depoimentos){$depoimentos->edit($data);});
        $router->put('/update', function ($data) use ($depoimentos){$depoimentos->update($data);});


        
        // Rotas para Maravilhas
        $router->group('/maravilhas');
        $router->get('/search', function ($data) use ($maravilhas){$maravilhas->search($data);});
        $router->get('/create', function () use ($maravilhas){$maravilhas->create();});
        $router->post('/persist', function ($data) use ($maravilhas){$maravilhas->persist($data);});
        $router->delete('/delete', function ($data) use ($maravilhas){$maravilhas->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($maravilhas){$maravilhas->edit($data);});
        $router->put('/update', function ($data) use ($maravilhas){$maravilhas->update($data);});

                
        // Rotas para Depoimentos
        $router->group('/diferenciais');
        $router->get('/search', function ($data) use ($diferenciais){$diferenciais->search($data);});
        $router->get('/create', function () use ($diferenciais){$diferenciais->create();});
        $router->post('/persist', function ($data) use ($diferenciais){$diferenciais->persist($data);});
        $router->delete('/delete', function ($data) use ($diferenciais){$diferenciais->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($diferenciais){$diferenciais->edit($data);});
        $router->put('/update', function ($data) use ($diferenciais){$diferenciais->update($data);});




        // Rotas para contact
        $router->group('/contact');
        $router->get('/create', function () use ($contact){$contact->create();});
        $router->post('/persist-admin', function ($data) use ($contact){$contact->persistAdmin($data);});
        $router->get('/search', function ($data) use ($contact){$contact->search($data);});
        $router->delete('/delete', function ($data) use ($contact){$contact->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($contact){$contact->edit($data);});
        $router->put('/update', function ($data) use ($contact){$contact->update($data);});

        // Rotas para tarifas
        $router->group('/tarifas');
        $router->get('/search', function ($data) use ($tarifas){$tarifas->search($data);});
        $router->get('/create', function () use ($tarifas){$tarifas->create();});
        $router->post('/persist', function ($data) use ($tarifas){$tarifas->persist($data);});
        $router->get('/edit/{id}', function ($data) use ($tarifas){$tarifas->edit($data);});
        $router->delete('/delete', function ($data) use ($tarifas){$tarifas->delete($data);});
        $router->put('/update', function ($data) use ($tarifas){$tarifas->update($data);});
                //Rotas para Itens da Tarifas
                $router->get('/itens/create/{id}', function ($data) use ($tarifas){$tarifas->itens_create($data);});
                $router->post('/itens/persist', function ($data) use ($tarifas){$tarifas->itens_persist($data);});
                $router->put('/itens/update', function ($data) use ($tarifas){$tarifas->itens_update($data);});
                $router->get('/itens/{id}', function ($data) use ($tarifas){$tarifas->itens_search($data);});
                $router->get('/itens/edit/{id}', function ($data) use ($tarifas){$tarifas->itens_edit($data);});
                $router->delete('/itens/delete', function ($data) use ($tarifas){$tarifas->itens_delete($data);});

        
        // Rotas para ceara
        $router->group('/ceara');
        $router->get('/search', function ($data) use ($ceara){$ceara->search($data);});
        $router->get('/create', function () use ($ceara){$ceara->create();});
        $router->post('/persist', function ($data) use ($ceara){$ceara->persist($data);});
        $router->delete('/delete', function ($data) use ($ceara){$ceara->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($ceara){$ceara->edit($data);});
        $router->put('/update', function ($data) use ($ceara){$ceara->update($data);});

        // Rotas para fortaleza
        $router->group('/fortaleza');
        $router->get('/search', function ($data) use ($fortaleza){$fortaleza->search($data);});
        $router->get('/create', function () use ($fortaleza){$fortaleza->create();});
        $router->post('/persist', function ($data) use ($fortaleza){$fortaleza->persist($data);});
        $router->delete('/delete', function ($data) use ($fortaleza){$fortaleza->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($fortaleza){$fortaleza->edit($data);});
        $router->put('/update', function ($data) use ($fortaleza){$fortaleza->update($data);});

      



                // Rotas para politicas
        $router->group('/politicas');
        $router->get('/search', function ($data) use ($politicas){$politicas->search($data);});
        $router->get('/create', function () use ($politicas){$politicas->create();});
        $router->post('/persist', function ($data) use ($politicas){$politicas->persist($data);});
        $router->delete('/delete', function ($data) use ($politicas){$politicas->delete($data);});
        $router->put('/update', function ($data) use ($politicas){$politicas->update($data);});

        // Rotas para Depoimentos
        $router->group('/banner');
        $router->get('/search', function ($data) use ($banner){$banner->search($data);});
        $router->get('/create', function () use ($banner){$banner->create();});
        $router->post('/persist', function ($data) use ($banner){$banner->persist($data);});
        $router->delete('/delete', function ($data) use ($banner){$banner->delete($data);});
        $router->get('/edit/{id}', function ($data) use ($banner){$banner->edit($data);});
        $router->put('/update', function ($data) use ($banner){$banner->update($data);});

     // Rotas para Depoimentos
     $router->group('/servicos');
     $router->get('/search', function ($data) use ($servicos){$servicos->search($data);});
     $router->get('/create', function () use ($servicos){$servicos->create();});
     $router->post('/persist', function ($data) use ($servicos){$servicos->persist($data);});
     $router->delete('/delete', function ($data) use ($servicos){$servicos->delete($data);});
     $router->get('/edit/{id}', function ($data) use ($servicos){$servicos->edit($data);});
     $router->put('/update', function ($data) use ($servicos){$servicos->update($data);});






        // Rotas de login e logout
        $router->group('/dashboard');
        $router->get('/', function () use ($admin){$admin->painel();});
        $router->get('/logout', function () use ($admin){$admin->logout();});
        $router->get('/search', function () use ($admin){$admin->search();});





        //QUALQUER URL TÁ SENDO MAPEADA AQUI CASO HAJA UMA TENTATIVA DE ENTRADA ABRUPTA EM ÁREAS ADMINISTRATIVAS
    //CASO QUEIRA FAZER UMA MUDANÇA EM ESPECIFICO DIRETAMENTE EM CADA URL, VERIFICAR AQUI
else:

        $router->get('/', function () use ($guard){$guard->tentativaPainel();});
        $router->get('/logout',function () use ($guard){$guard->tentativaPainel();});
        $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
        $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
            // Rotas para Estrutura
            $router->group('/estrutura');
            $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
            $router->post('/persist', function () use ($guard){$guard->tentativaPainel();});
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});;
    
            // Rotas para Acomodacao
            $router->group('/acomodacao');
            $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
            $router->post('/persist', function () use ($guard){$guard->tentativaPainel();});
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
    
            // Rotas para newsletter
            $router->group('/newsletter');
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
    
            // Rotas para contact
            $router->group('/contact');
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
    
    
            // Rotas para tarifas
            $router->group('/tarifas');
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
            $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
            $router->post('/persist', function () use ($guard){$guard->tentativaPainel();});
    
    
            
            // Rotas para ceara
            $router->group('/ceara');
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
            $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
            $router->post('/persist', function () use ($guard){$guard->tentativaPainel();});
    
            // Rotas para fortaleza
            $router->group('/fortaleza');
            $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
            $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
            $router->post('/persist', function () use ($guard){$guard->tentativaPainel();});
    
           
    
    
    
                    // Rotas para politicas
            $router->group('/politicas');
                $router->get('/search', function () use ($guard){$guard->tentativaPainel();});
                $router->get('/create', function () use ($guard){$guard->tentativaPainel();});
                $router->post('/persist', function () use ($guard){$guard->tentativaPainel();});

endif;


// Rotas para Tratamento de Erros
/**
$router->group('/error');
$router->get('/{errcode}', function ($data) use ($error){$error->error_404($data);});
 **/
/** 

$router->get('/{errcode}', function ($data){

    echo "Erro: {$data['errcode']}";

});

**/

$router->dispatch();



// Redirect de todos os erros de rotas
/**  
if ($router->error()) {

    $router->redirect("/error/{$router->error()}");

}


**/

/** 
if (!isset($_SESSION['logado'])) {
    $router->redirect("/admin");
}**/


//$guard->VerifyLogin();