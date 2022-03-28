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
    
    <title> Gestão de serviços do Hotel</title>
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
                        <h2>Gestão da Sessão de Serviços do Hotel</h2>
                        <form method="POST" action="servicos/update" enctype="multipart/form-data">
                              <input type="hidden" name="_method" value="PUT">
                        <?php foreach($edit as $d):
                              $id = $d->getId();
                              echo "ID:".$id;
                             $description =   $d->getDescription(); 
                             $image = $d->getImage(); ?>   
       

                              <input type="hidden" name="id" value="<?=$id?>">
                              <div class="col s12" id="information">
                                <label for="description">
                                    Descrição breve
                                    <span class="fa fa-exclamation-circle"></span>
                                </label>
                                <textarea name="description" class="editor" required>
                                    <?= (isset($description)) ? $description : '<p>Dê uma breve descrição.<p/>'; ?>
                                </textarea>
                            </div>
                                                  <div class="col s12" id="images">
                      <div class="input">
                          <p>
                              Coloque suas imagens abaixo para fazer o upload
                              <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="Imagens são super importantes para demonstração de relevância dos seus produtos. Faça o upload de suas imagens, clicando ou arrastando seus arquivos até o campo abaixo">
                                  <span class="fa fa-question-circle"></span>
                              </a>
                          </p>
                          <input type="file" name="files[]" class="dropify" multiple="multiple" />
                          <input type="hidden" name="acomodacao" value="<?= (isset($image)) ? $image : ''; ?>" />
                          <input type="hidden" name="acomodacao_id" value="<?= (isset($image)) ? $image : ''; ?>" />
                      </div>
                      <div class="start">
                          <?php if(!empty($image)): ?>
                              <input type="hidden" name="_method" value="PUT">

                            
                          <?php 
                          endif; endforeach; ?>
                      </div>
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