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
    
    <title>Politica - ADMIN Golden Beach Hotel</title>


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
               


            
                <!--start container-->
                <div class="search container">
                    <h2>Busque Todos os Usuarios</h2>
                    <!--Static Data-->
                    <table>

                <tr>
                        <td>Titulo</td>
                        <td>Descri????o</td>
                        <td>Politica</td>
                </tr>

                <?php
        foreach($data as $d):
        $id = $d->getId();
        $title = $d->getTitle();
        $description =  $d->getPoliticas();
    ?>
                <tr>
                        <td><?=$title?></td>
                        <td><?=$description?></td>
                    
                     
                </tr>
            <?php endforeach;?>

                    </table>
        
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