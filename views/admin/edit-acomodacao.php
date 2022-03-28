<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= URL_BASE; ?>">
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="cache-control" content="public" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <title>Criar Acomodação - ADMIN BeachParkHotel</title>
    <?php require 'links.php'; ?>
    <!--dropify-->
    <link href="public/admin/js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet"
        media="screen,projection">


</head>

<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

                        <style> .itens-button {
               border: 0;
    width: auto;
    padding: 52px;
    height: 26px;
    border-radius: 20px;
    background-color: #00b2ff;
    font-weight: bold;
    margin: 0;
    padding: 0px 20px 0px 20px;
    color: white;
                        } 

                        .itens-button-delete {
                            background-color: red;
                        }
         
                        .span-title {
                            background: rgb(11,63,106);
background: linear-gradient(34deg, rgba(11,63,106,1) 0%, rgba(0,147,177,1) 100%);

    color: white;
    border-radius:10px 0px 0px 10px;
    padding:0 10px;
    margin-right:5px;
    }

    .span-id {

background: linear-gradient(34deg, rgba(9,70,121,1) 0%, rgba(0,212,255,1) 100%);
    color: white;
    border-radius:0px 10px 10px 0px;
    padding:0 10px;
    }</style>

                    
                            <?php foreach($edit as $d):
                              $id = $d->getId();
                             $title =   $d->getTitle(); 
                             $description = $d->getSubtitle();
                             $image = $d->getImage(); ?>
                      <span>  <h2 style="margin: 2.78rem 0 0.424rem 0;">Editar Acomodação: <br> <span class="span-title"> <?=$title?> </span> <span class="span-id"> ID: <?=$id?> </span></h2> 
                      <a href="<?=URL_BASE."acomodacao/itens/".$id?>">
                      
                      <button class="itens-button">Ver Itens dessa Acomodação</button></a> </span>
                      

                      <a id="danger-alert"  data-link="<?=URL_BASE."acomodacao/delete/".$id?>">
                      
                      <button class="itens-button itens-button-delete">Deletar</button></a>
                      
                      
                      
                      <form method="POST" action="acomodacao/update" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                          
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="col s12" id="information">
                                <label for="title">
                                    Titulo
                                    <input type="text" name="title"
                                        value="<?= (isset($title)) ? $title : 'Insira um Titulo'; ?>">
                                </label>
                                <label for="description">
                                    Descrição completa
                                    <span class="fa fa-exclamation-circle"></span>
                                </label>
                                <textarea name="description" class="editor" required>
                                    <?= (isset($item)) ? $item->getDescription() : '<p>Insira uma observação do seu pacote<p/>'; ?>
                                </textarea>
                            </div>
                            <div class="col s12" id="images">
                                <div class="input">
                                    <p>
                                        Coloque suas imagens abaixo para fazer o upload
                                        <a class="tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Imagens são super importantes para demonstração de relevância dos seus produtos. Faça o upload de suas imagens, clicando ou arrastando seus arquivos até o campo abaixo">
                                            <span class="fa fa-question-circle"></span>
                                        </a>
                                    </p>
                                    <input type="file" name="image" class="dropify"  data-default-file="<?=$image?>" />

                                </div>
                      
                            </div>
                            <?php endforeach; ?>
                            <div class="col s12 center">
     
                                <p>
                                    <button type="submit" class="btn waves-effect">Salvar</button>
                               
                                </p>
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
<script>
$('#danger-alert').click(function () {
    swal({
          title: "Tem certeza que deseja excluir?",
          type: "error",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Excluir",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false
    },
    function(){
       window.location.href = $('#danger-alert').attr("data-link");
    });
});


</script>


        <?php
    if(isset($_SESSION['send']) and $_SESSION['send']):?>
        <script>
            swal({
                title: "Dados enviados!",
                text: "Os seus dados foram enviados com sucesso para o Banco de Dados. ",
                showCancelButton: false,
                confirmButtonColor: "#77dd77",
                confirmButtonText: "Tudo bem!",
                closeOnConfirm: true
            });
        </script>
        <?php
        unset($_SESSION['send']);
    endif;
    ?>

       

</body>

</html>