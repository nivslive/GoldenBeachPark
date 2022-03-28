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
    
    <title>Alterar logo e ícone da página</title>
    <?php require 'links.php'; ?>
    <!--dropify-->
    <link href="public/admin/js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body>

    <?php require 'header.php'; ?>

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
            <?php require 'menu.php' ?>
            <!-- START CONTENT -->
            <section class="row" id="content">
                <!--start container-->
                <div class="logo container">
                    <fieldset>
                        <h2>Alterar logo e ícone da página</h2>

                        <!-- Formulario para a logo -->
                        <form method="POST" action="brand/logo" enctype="multipart/form-data">
                            <h3>Logo</h3>
                            <p>A logo será mostrada no topo da sua loja, em todas as páginas. Todas as logos são redimensionadas para melhor visualização.</p>
                            <div id="card-alert" class="card orange">
                                <div class="card-content white-text">
                                    <p><i class="mdi-action-info-outline"></i> Lembrete: Para que seu logo fique visível no facebook, ele deve ter o tamanho mínimo de 200x200.</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <?php if(!empty($brand)): ?>
                                <input type="hidden" name="id" value="<?= $brand->getId(); ?>">
                                <input type="hidden" name="_method" value="PUT">
                            <?php endif; ?>
                            <figure>
                                <?php if(empty($brand) || empty($brand->getLogo())): ?>
                                    <input type="file" id="logo" name="logo" class="dropify" />
                                <?php else: ?>
                                    <input type="file" id="logo" name="logo" class="dropify" data-default-file="<?= $brand->getLogo(); ?>" />
                                <?php endif; ?>
                            </figure>
                            <div class="col s12 center">
                                <?php if(!empty($brand) && !empty($brand->getLogo())): ?>
                                    <a href="brand/delete/logo" class="btn waves-effect">
                                        <span class="far fa-trash-alt"></span>
                                        Remover Logo
                                    </a>
                                <?php endif; ?>
                                <button type="submit" class="btn waves-effect">
                                    <span class="far fa-check-circle"></span>
                                    <?= (empty($brand) || empty($brand->getLogo())) ? 'Inserir' : 'Alterar'; ?>
                                    Logo
                                </button>
                            </div>
                        </form>

                        <!-- Formulario para o icon -->
                        <form method="POST" action="brand/icon" enctype="multipart/form-data">
                            <h3>Ícone da página</h3>
                            <p>O ícone, ou favicon, será mostrado no navegador do seu cliente ao lado do endereço da loja ou na aba, ao lado do título. Todos os ícones são redimensionados para melhor visualização.</p>
                            <div id="card-alert" class="card orange">
                                <div class="card-content white-text">
                                    <p><i class="mdi-action-info-outline"></i> Lembrete: É recomendado o envio de um ícone no formato .ico para que seja suportado em todos os navegadores.</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <?php if(!empty($brand)): ?>
                                <input type="hidden" name="id" value="<?= $brand->getId(); ?>">
                                <input type="hidden" name="_method" value="PUT">
                            <?php endif; ?>
                            <figure>
                                <?php if(empty($brand) || empty($brand->getIcon())): ?>
                                    <input type="file" id="icon" name="icon" class="dropify" />
                                <?php else: ?>
                                    <input type="file" id="icon" name="icon" class="dropify" data-default-file="<?= $brand->getIcon(); ?>" />
                                <?php endif; ?>
                            </figure>
                            <div class="col s12 center">
                                <?php if(!empty($brand) && !empty($brand->getIcon())): ?>
                                    <a href="brand/delete/icon" class="btn waves-effect">
                                        <span class="far fa-trash-alt"></span>
                                        Remover Ícone da página
                                    </a>
                                <?php endif; ?>
                                <button type="submit" class="btn waves-effect">
                                    <span class="far fa-check-circle"></span>
                                    <?= (empty($brand) || empty($brand->getIcon())) ? 'Inserir' : 'Alterar'; ?> 
                                    Ícone da página
                                </button>
                            </div>
                        </form>
                    </fieldset>

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
        </div>
        <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->

    <?php require 'footer.php'; ?>
    <?php require 'scripts.php'; ?>
    <!-- dropify -->
    <script type="text/javascript" src="public/admin/js/plugins/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="public/admin/js/image.js"></script>
    <?php    
    if(isset($_SESSION['mensagem'])): ?>
    <script>
        swal({
                title: "<?= ($_SESSION['tipo'] == 'success') ? 'Tudo Certo!' : 'Ooops tem um erro!'; ?>",
                text: "<?= $_SESSION['mensagem']; ?>",   
                type: "<?= $_SESSION['tipo']; ?>",   
                showCancelButton: false,   
                confirmButtonColor: "#77dd77",   
                confirmButtonText: "Tudo bem!",   
                closeOnConfirm: true
              });
    </script>
    <?php
        unset($_SESSION['tipo']);
        unset($_SESSION['mensagem']);
    endif;
    ?>
    
</body>

</html>