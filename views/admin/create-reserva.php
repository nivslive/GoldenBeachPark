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

    <title> Criar Reserva - ADMIN BeachParkHotel</title>
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
                        <h2>Criar Reserva</h2>
                        <form method="POST" action="reserva/persist" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="">
                            <div class="col s12" id="information">
                                <label for="title">
                                    Check-in

                                    <div class="row">
                                        <div class="s12 m6">
                                            <input type="date" name="checkin" class="input-inner white-text"
                                                placeholder="Calendario antes" />
                                            <div class="input-icon"></div>
                                        </div>

                                        Checkout

                                        <div class="s12 m6">
                                            <input type="date" name="checkout" class="input-inner white-text"
                                                placeholder="Calendario antes" />
                                            <div class="input-icon"></div>
                                        </div>

                                    </div>

                                </label>




                                <label for="selects">
                                    Noites




                                <select type="text" class="input-inner" name="noites" placeholder="Full Name">
                <option value="1">1 Noite</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option value=".$number.">$number Noites</option>";

              $number++;

            } while($number <= 9); ?>



        </select>



  
        <select type="text" class="input-inner" name="apartamentos" placeholder="Full Name">
                <option value="1">1 Apartamento</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option value=".$number.">$number Apartamentos</option>";

              $number++;

            } while($number <= 9); ?>



        </select>


        
       
        <select type="text" class="input-inner" name="adultos" placeholder="Full Name">
                <option value="1">1 Adulto</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option value=".$number.">$number Adultos</option>";

              $number++;

            } while($number <= 9); ?>

        </select>


               
      
        <select type="text" class="input-inner" name="criancas" placeholder="Full Name">
                <option value="1">1 Criança</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option value=".$number.">$number Crianças</option>";

              $number++;

            } while($number <= 9); ?>


        </select>






                                </label>



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








        <?php require 'footer.php'; ?>


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
