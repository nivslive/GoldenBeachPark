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
    
    <title>Criar Tarifa - ADMIN BeachParkHotel</title>
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
                        <h2>Criar Tarifa</h2>
                        <form method="POST" action="tarifas/update" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <?php foreach($edit as $d):
                              $id = $d->getId();
                              echo "ID:".$id;
                             $title =   $d->getTitle(); 
                              ?>   

                                                                                          <input type="hidden" name="id" value="<?=$id?>">
                            <div class="col s12" id="information">
                                <label for="title">
                                    Titulo
                                    <input type="text" name="title" value="<?= (isset($title)) ? $title : ''; ?>">
                                </label>
                          
                      
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







    
    <?php require 'scripts.php'; ?>
    <!-- dropify -->
    <script type="text/javascript" src="public/admin/js/plugins/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="public/admin/ckeditor/build/ckeditor.js"></script>
    <script type="text/javascript" src="public/admin/js/package.js"></script>
  <?php
    if(isset($_SESSION['send']) and $_SESSION['send']):?>
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
        unset($_SESSION['send']);
        unset($_SESSION['tipo']);
        unset($_SESSION['mensagem']);
    endif;
    ?>

    <script>



let n = 1;

function Test() {
    
    console.log(n);

    let Component = `

    <input type="hidden" name="item_id_value" value="${n}" />
    <section style="background-color: orange;margin: 200px; border-radius: 20px"> <span style="background: white; border-radius: 5px;"> Cadastro Container ${n} </span> 
    <span class="badge badge-success" id="indexIndex">?</span>

    <div style="margin: 20px;">

    
    
    <label for="title">
                                    Titulo
                                    <input type="text" name="title_item_${n}" value="<?= (isset($tarifa)) ? $tarifa->getTitle() : ''; ?>">
                                </label>
                                <label for="description">
                                    Descri????o completa
                                    <span class="fa fa-exclamation-circle"></span>
                                </label>
                                <textarea name="description_item_${n}" class="editor" required>
                                    <?= (isset($tarifa)) ? $tarifa->getDescription() : '<p>Insira uma observa????o do seu item<p/>'; ?>
                                </textarea>
    </div>




                <div class="col s12"  style="background-color: orange"id="images">
                                <div class="input">
                                    <p>
                                        Coloque suas imagens abaixo para fazer o upload
                                        <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="Imagens s??o super importantes para demonstra????o de relev??ncia dos seus produtos. Fa??a o upload de suas imagens, clicando ou arrastando seus arquivos at?? o campo abaixo">
                                            <span class="fa fa-question-circle"></span>
                                        </a>
                                    </p>
                                    <input type="file" name="files[]" class="dropify" multiple="multiple" />
                                    <input type="hidden" name="title" value="<?= (isset($tarifa)) ? $tarifa->getTitle() : ''; ?>" />
                                    <input type="hidden" name="id" value="<?= (isset($tarifa)) ? $tarifa->getId() : ''; ?>" />
                                </div>
                                <div class="start">
                                    <?php if(!empty($image)): ?>
                                        <input type="hidden" name="_method" value="PUT">
                                    <?php 
                                        foreach ($image as $item):
                                    ?>
                                        <div class="col s12 m6 l3">
                                            <input type="hidden" name="id[]" value="<?= $item->getId(); ?>">
                                            <input type="file" id="<?= $item->getId(); ?>" name="image[]" class="dropify" data-default-file="<?= $item->getImage(); ?>" />
                                            <input type="text" name="alt[]" placeholder="Texto Alternativo" value="<?= $item->getAlt(); ?>">
                                            <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="O atributo alt ?? utilizado em c??digos HTML, respons??veis pela cria????o de p??ginas web, com o objetivo de atribuir um texto alternativo a imagem, se, por algum motivo, ela n??o seja carregada ou caso o site esteja sendo visto por um screen reader (leitor de tela, muito utilizado para acessibilidade a deficientes visuais).">
                                                <span class="fa fa-question-circle"></span>
                                            </a>
                                        </div>
                                    <?php 
                                    endforeach; endif; ?>
                                </div>
                            </div>
    
    </section>
    
    `
    n++
    $("#ItemList").append(Component);
  
}
        </script>
    
</body>

</html>