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
    
    <title> Gestão de Maravilhas do Hotel</title>
    <?php require 'links.php'; ?>
    <!--dropify-->
    <link href="public/admin/js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <!-- START MAIN -->
    <div>
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START CONTENT -->
            <section class="row" id="content">
                <!--start container-->
                <div class="cadastro container">
                    <fieldset>
                        <h2>Gestão de Maravilhas</h2>
                        <form method="POST" action="maravilhas/update" enctype="multipart/form-data">
                              <input type="hidden" name="_method" value="PUT">
                        <?php foreach($edit as $d):
                              $id = $d->getId();
                              echo "ID:".$id;
                             $title =   $d->getTitle()  == null ? $d->getTitle() : 'Sem Titulo'; 
                             $image = $d->getImage(); ?>   
                 <input type="hidden" name="id" value="<?=$id ? $id : ''?>">
                  <div class="col s12" id="information">
                      <label for="title">
                          Titulo
                          <input type="text" name="title" value="<?=$title?>">
                      </label>

                      <label for="title">
                          Titulo
                          <select  name="section" required> 
                                                        
                          <option value="quartos">Quartos</option>
                          <option value="lazer">Lazer</option>
                          <option value="hotel">Hotel</option>
                          <option value="passeios">Passeios</option>
                    
                     </select>
                      </label>

               
                  </div>
                                                  <div class="col s12" id="images">
                      <div class="input">
                          <p>
                              Coloque suas imagens abaixo para fazer o upload
                              <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="Imagens são super importantes para demonstração de relevância dos seus produtos. Faça o upload de suas imagens, clicando ou arrastando seus arquivos até o campo abaixo">
                                  <span class="fa fa-question-circle"></span>
                              </a>
                          </p>
                          <input type="file" name="image" class="dropify" />
                      
                      </div>
                   
                          <?php 
                    endforeach; ?>
               
                  </div>
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








    
    <?php require 'scripts.php'; ?>
    <!-- dropify -->
    <script type="text/javascript" src="public/admin/js/plugins/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="public/admin/ckeditor/build/ckeditor.js"></script>
    <script type="text/javascript" src="public/admin/js/package.js"></script>
    <?php
    if(isset($_SESSION['mensagem'])): ?>
    <script>

alert('test!');






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