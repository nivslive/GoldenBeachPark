<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= URL_BASE; ?>">
    <meta charset="utf-8">
	<meta http-equiv="content-language" content="pt-br">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="cache-control" content="public"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">


    <title>Login</title>
    <?php require 'links.php'; ?>
    <link href="public/admin/js/plugins/jquery.nestable/nestable.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="public/site/css/root.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>

    <main class="login">
        <div class="fundo"></div>
        <div class="box">
            <img src="public/site/img/logo.png" style="width:25rem; padding: 2rem">
            <fieldset>
                <?php if(isset($_SESSION['mensagem'])): ?>
                    <div id="card-alert" class="card <?= ($_SESSION['tipo'] == 'danger') ? 'red' : 'green' ?>">
                        <div class="card-content white-text">
                        <?php if($_SESSION['tipo'] == 'danger'): ?>
                            <p><i class="mdi-alert-error"></i> Erro: <?= $_SESSION['mensagem']; ?></p>
                            <?php elseif($_SESSION['tipo'] == 'warning'): ?>
                            <p><i class="mdi-alert-error"></i> Erro: <?= $_SESSION['mensagem']; ?></p>
                        <?php else: ?>
                            <p><i class="mdi-navigation-check"></i> Sucesso: <?= $_SESSION['mensagem']; ?></p>
                        <?php endif; ?>
                        </div>
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php
                    unset($_SESSION['tipo']);
                    unset($_SESSION['mensagem']);
                endif;
                ?>
                <div class="center">
       
                </div>
                <form method="POST" action="admin/login">
                    <label for="user">
                    <div class="row align-divs-form-login">    
            <div class="col s11" style="padding: 0;">


                <input type="text" name="user" class="input-inner border-radius" placeholder="Usuário" required/>
                <div class="input-icon"></div>


            </div>
        
        
        
        
        
            <div class="col s1" style="padding:0;">


            <div class="align-divs-form-icon fa-2x"><i class="fas fa-user yellow-text"></i></div>



                    </div>
        
        
        
        
        </div>  
                    </label>
                    <label for="password">
           <div class="row align-divs-form-login">    
            <div class="col s11" style="padding: 0;">


                <input name="password" type="password" class="input-inner border-radius" placeholder="Senha" required />
                <div class="input-icon"></div>


            </div>
        
        
        
        
        
            <div class="col s1" style="padding:0;">


            <div class="align-divs-form-icon fa-2x"><i class="fas fa-lock yellow-text"></i></div>



                    </div>
        
        
        
        
        </div>  
                    </label>
                    <a href="#">Esqueceu sua senha?</a>
                    <button type="submit" class="btn waves-effect" style="border-radius: 50px;">Entrar</button>
                </form>
            </fieldset>
        </div>
    </main>

    <?php require 'scripts.php'; ?>
    <!--nestable -->
    <link href="public/admin/js/plugins/jquery.nestable/nestable.css" type="text/css" rel="stylesheet" media="screen,projection">
    
</body>

</html>