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
    
    <title>Criar um novo banner</title>
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
                <div class="cadastro container">
                    <fieldset>
                        <h2>Criar um novo banner</h2>
                        <form method="POST" action="banner/persist" enctype="multipart/form-data">
                        <?php if(isset($banner)): ?>
                            <input type="hidden" name="id" value="<?= $banner->getId(); ?>">
                        <?php endif; ?>
                            <figure>
                                <?php if(!isset($banner) || empty($banner->getImage())): ?>
                                    <input type="file" id="input-file" name="input-file" class="dropify" />
                                <?php else: ?>
                                    <input type="file" id="input-file" name="input-file" class="dropify" data-default-file="<?= $banner->getImage(); ?>" />
                                <?php endif; ?>
                            </figure>
                            <label for="title" class="col s12">
                                Insira o link do banner abaixo:
                                <input type="text" name="link" value="<?= (isset($banner)) ? $banner->getLink() : ''; ?>">
                            </label>
                            <div class="col s12 center">
                                <button type="submit" class="btn waves-effect">Salvar</button>
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
    <script type="text/javascript" src="public/admin/js/banner.js"></script>
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