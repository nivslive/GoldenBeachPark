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
    
    <title>Reservas - ADMIN Golden Beach Hotel</title>


    <style>

    body {
  font-family: Arial;
  box-sizing: border-box;
  margin:0;
}
#fade-atualizar {
    z-index: 9999;
  position: absolute;
  top: 0;
  display: none;
  height: 100vh;
  align-items: center;
  justify-content: center;
  width: 100%;
  z-index: 1;
  background: rgba(0,0,0,0.7);
}
#ctnModal-atualizar {
  top: 0;
  display: flex;
  flex-direction: column;
  background: white;
  border-radius: 2px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
#fecharModal-atualizar {
  display: flex;
  justify-content: flex-end;
  padding: 7px;
}
#close-atualizar {
  cursor: pointer;
}
#tituloModal-atualizar {
  display: flex;
  justify-content: center;
  padding: 7px;
  color: #666;
  font-size: 18px;
}

form {
    display:block;
}

.container__button {

    display: flex;
    justify-content: space-evenly;
}

.container__button-deletar {
padding: 10px;
background-color: yellow;
box-shadow:1px 5px 5px gray;
border:0;
border-radius: 10px;
}

.container__button-deletar-icon {
    width: 20px !important;
    height: 20px !important;
}


.container__button-atualizar {
    padding: 10px;
background-color: yellow;
box-shadow:1px 5px 5px gray;
border:0;
border-radius: 10px;
}

.container__button-atualizar-icon {
    width: 20px !important;
    height: 20px !important;
}

form input[name="cpfCnpj"] {
  width: 100%;
  margin-bottom: 15px;
  padding: 10px 10px;
}
form div {
  display: flex;
  justify-content: space-between;
  width: 100%;
}
form input[name="email"] {
  padding: 10px 10px;
}
form div input[name="submit"]{
  padding: 4 20px;
  background: white;
  border: 1px #aaa solid;
}

    </style>
    <?php require 'links.php'; ?>
    <!--jsgrid css-->
    <link href="public/admin/js/plugins/jsgrid/css/jsgrid.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="public/admin/js/plugins/jsgrid/css/jsgrid-theme.min.css" type="text/css" rel="stylesheet" media="screen,projection">

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
                   <div id="fade-atualizar">
  <div id="ctnModal-atualizar">

    <span id="fecharModal-atualizar"><div id="close-atualizar" class="fa fa-close"></div></span>
    <div id="tituloModal-atualizar">Atualizar</div>

    <section class="row" id="content">
                <!--start container-->
                <div class="cadastro container">
                    <fieldset>
                        <form method="POST" action="estrutura/update" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id_atualizar" id="id_atualizar" value="">
                            <div class="col s12" id="information">
                                <label for="title">
                                    Titulo
                                    <input type="text" name="title" value="<?= (isset($acomodacao)) ? $acomodacao->getTitle() : ''; ?>">
                                </label>
                                
           
                                <label for="description">
                                    Descrição completa
                                    <span class="fa fa-exclamation-circle"></span>
                                </label>
                                <textarea name="description" class="editor" required>
                                    <?= (isset($package)) ? $package->getDescription() : '<p>Insira uma observação do seu pacote<p/>'; ?>
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
                                    <input type="hidden" name="acomodacao" value="<?= (isset($acomodacao)) ? $acomodacao->getTitle() : ''; ?>" />
                                    <input type="hidden" name="acomodacao_id" value="<?= (isset($acomodacao)) ? $acomodacao->getId() : ''; ?>" />
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
                                            <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="O atributo alt é utilizado em códigos HTML, responsáveis pela criação de páginas web, com o objetivo de atribuir um texto alternativo a imagem, se, por algum motivo, ela não seja carregada ou caso o site esteja sendo visto por um screen reader (leitor de tela, muito utilizado para acessibilidade a deficientes visuais).">
                                                <span class="fa fa-question-circle"></span>
                                            </a>
                                        </div>
                                    <?php 
                                    endforeach; endif; ?>
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

  </div>
</div>


            
                <!--start container-->
                <div class="search container">
                    <h2>Busque todas as reservas</h2>
                    <!--Static Data-->
                    <table>

                <tr>
                        <td>Titulo</td>
                        <td>Descrição</td>
                        <td>Image</td>
                        <td>Opções</td>
                </tr>

                <?php
        foreach($data as $d):
        $id = $d->getId();
        $title = $d->getTitle();
        $description =  $d->getDescription();
        $image = $d->getImage();
    ?>
                <tr>
                        <td><?=$title?></td>
                        <td><?=$description?></td>
                        <td><?=$image == null ? 'Sem imagem' : $image ?></td>
                        <td class="container__button"><form method="POST" action="estrutura/delete"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="id" class="id_value_global" value="<?= $id?>"> <button type="input" class="container__button-deletar"><img class="container__button-deletar-icon" src="public/site/icons/lixo.svg" alt="Lixo"></button> </form>       <div>    <button href="#" class="container__button-atualizar openModal-atualizar" ><img class="container__button-atualizar-icon  atualizar-<?=$id?>" src="public/site/icons/pencil.svg" alt="Atualizar"></button></div> </td>
                </tr>
            <?php endforeach;?>

                    </table>
                    <a href="estrutura/create"> <button class="container__button-criar-icon"> Criar + 1</button> </button>
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
    <!--jsgrid-->
    <script type="text/javascript" src="public/admin/js/plugins/jsgrid/js/jsgrid.min.js"></script>
    <script type="text/javascript" src="public/admin/js/nights.js"></script>
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

    <script>
    
 

let open = document.querySelectorAll('.openModal-atualizar');
console.log(open);
let close = document.getElementById('close-atualizar');
let fade = document.getElementById('fade-atualizar');
let cntModal = document.getElementById('ctnModal-atualizar');
let input = document.querySelectorAll(".id_value_global");

function justNumbers(text) {
    var numbers = text.replace(/[^0-9]/g,'');
    return parseInt(numbers);
}

for(let i = 0; i < open.length; i++){
    open[i].addEventListener("click", function(e) {
        let just = justNumbers(this.innerHTML);
        event.preventDefault();
        fade.style.display = "flex";
        const input_atualizar = document.querySelector("#id_atualizar");
        input_atualizar.value = just;
        console.log(input_atualizar);
                                                        })
}

/**open.onclick = function(event) {
    event.preventDefault();
    const input = document.querySelector("#id_value_global");
    console.log(input);
    let id = input.value;
    const input_atualizar = document.querySelector("#id_atualizar");
    console.log(input_atualizar);
    input_atualizar.value = id;
    fade.style.display = "flex"}**/

close.onclick = function() {fade.style.display = "none"}

fade.onclick = function() {fade.style.display = "none"}

cntModal.onclick = function(event) {event.stopPropagation()}

        </script>
    
</body>

</html>