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

    <title>Maravilhas - ADMIN Golden Beach Hotel</title>


    <style>
        body {
            font-family: Arial;
            box-sizing: border-box;
            margin: 0;
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
            background: rgba(0, 0, 0, 0.7);
        }

        #ctnModal-atualizar {
            top: 0;
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 2px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
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
            display: block;
        }

        .container__button {

            display: flex;
            justify-content: space-evenly;
        }

        .container__button-deletar {
            padding: 10px;
            background-color: yellow;
            box-shadow: 1px 5px 5px gray;
            border: 0;
            border-radius: 10px;
        }

        .container__button-deletar-icon {
            width: 20px !important;
            height: 20px !important;
        }


        .container__button-atualizar {
            padding: 10px;
            background-color: yellow;
            box-shadow: 1px 5px 5px gray;
            border: 0;
            border-radius: 10px;
        }

        .container__button-atualizar-icon {
            width: 20px !important;
            height: 20px !important;
        }

        .form-att {
            display: flex;
            flex-direction: column;
        }

        form input[name="cpfCnpj"] {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px 10px;
        }

        form div {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
        }

        form input[name="email"] {
            padding: 10px 10px;
        }

        form div input[name="submit"] {
            padding: 4 20px;
            background: white;
            border: 1px #aaa solid;
        }

    </style>
    <?php require 'links.php'; ?>
    <!--jsgrid css-->
    <link href="public/admin/js/plugins/jsgrid/css/jsgrid.min.css" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="public/admin/js/plugins/jsgrid/css/jsgrid-theme.min.css" type="text/css" rel="stylesheet"
        media="screen,projection">

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

                        <span id="fecharModal-atualizar">
                            <div id="close-atualizar" class="fa fa-close"></div>
                        </span>
                        <div id="tituloModal-atualizar">Atualizar</div>
                        <div id="demo">
                              <h1>Carregando...</h1>
                        
                              </div>
                 

                    </div>
                </div>


                <!--start container-->
                <div class="search container">
                    <h2>Busque todas Maravilhas</h2>
                    <!--Static Data-->
                    <table>

                        <tr>
                            <td>Titulo</td>
                            <td>Descri????o</td>
                            <td>Image</td>
                            <td>Op????es</td>
                        </tr>

                        <?php
        foreach($data as $d):
        $id = $d->getId();
        $title = $d->getTitle();
        $section =  $d->getSection();
        $image = $d->getImage();
    ?>
                        <tr>
                            <td><?=$title?></td>
                            <td><?=$section?></td>
                            <td><img src="<?=$image == null ? 'public/site/imgs/default.jpeg' : $image ?>"></td>
                            <td class="container__button">
                                <form method="POST" action="ceara/delete"> <input type="hidden" name="_method"
                                        value="DELETE"> <input type="hidden" name="id" class="id_value_global"
                                        value="<?= $id?>"> <button type="input" class="container__button-deletar"><img
                                            class="container__button-deletar-icon" src="public/site/icons/lixo.svg"
                                            alt="Lixo"></button> </form>
                                <div>  <button href="#" value="<?=$id?>"
                                            class="container__button-atualizar openModal-atualizar"><img
                                                class="container__button-atualizar-icon  atualizar-<?=$id?>"
                                                src="public/site/icons/pencil.svg" alt="Atualizar"></button></div>
                            </td>
                        </tr>
                        <?php endforeach;?>

                    </table>
            <button class="container__button-criar-icon" onclick="create()"> Criar + 1</button>
                        </button>
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
const URL_BASE = "<?php echo URL_BASE ?>";


for(let i = 0; i < open.length; i++){
    open[i].addEventListener("click", function(e) {
        e.preventDefault();
      let  data = this.value;
      console.log(data);

    
      var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("demo").innerHTML =
                                    this.responseText;
                                  }
                                };


                                 
                                xhttp.open("GET", URL_BASE+"maravilhas/edit/"+data, true);
                                xhttp.send();

                              
        fade.style.display = "flex";

                                                        })
}


function create() {
    var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("demo").innerHTML =
                                    this.responseText;
                                  }
                                };
                                xhttp.open("GET", URL_BASE+"maravilhas/create", true);
                                xhttp.send();
                               let main = document.querySelector(".main-create");
                
                                fade.style.display = "flex";
                                
}

close.onclick = function() {fade.style.display = "none"}

fade.onclick = function() {fade.style.display = "none"}

cntModal.onclick = function(event) {event.stopPropagation()}


    </script>

</body>

</html>
