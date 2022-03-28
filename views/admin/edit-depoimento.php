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
    
    <title> Gestão de Depoimentos do Hotel</title>
    <?php require 'links.php'; ?>
    <!--dropify-->
    <link href="public/admin/js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



    <!-- START MAIN -->
    <div id="">
        <!-- START WRAPPER -->
        <div class="wrapper">
    
            <!-- START CONTENT -->
            <section class="row" id="content">
                <!--start container-->
                <div class="cadastro container">
                    <fieldset>
                        <?php foreach($edit as $d):
                        $id = $d->getId();
                        $name = $d->getName();
                        $depoimento = $d->getDepoimento();
                                                    ?>   
                        <h2>Email Cadastrado ID <?=$id?></h2>
                        <form method="POST" action="depoimentos/update" enctype="multipart/form-data">
                              <input type="hidden" name="_method" value="PUT">

                        <input type="hidden" name="id" value="<?=$id?>">
                            <div class="col s12" id="information">

                   

                                    <label for="name">
                                    Nome
                                    <input type="text" id="name" name="name" value="<?=$name?>" required>
                                </label>


                                <label for="depoimento">
                                    Depoimento
                                    <input type="text" id="depoimento" name="depoimento" value="<?=$depoimento?>" required>
                                </label>

                 
                            </div>
                     
                               
                         
                                    
                                    <?php 
                       
                              endforeach;?>
                              
                      
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
        
  
    <!-- END MAIN -->








    <?php require 'footer.php'; ?>

    
    <?php require 'scripts.php'; ?>
    <!-- dropify -->
    <script type="text/javascript" src="public/admin/js/plugins/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="public/admin/ckeditor/build/ckeditor.js"></script>
    <script type="text/javascript" src="public/admin/js/package.js"></script>
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