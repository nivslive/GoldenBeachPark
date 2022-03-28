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
                        <h2>Criar Acomodação</h2>
                        <form method="POST" action="acomodacao/persist" enctype="multipart/form-data">
                            <div class="col s12" id="information">
                                <label for="title">
                                    Titulo
                                    <input type="text" name="title"
                                        value="<?= (isset($data)) ? $data->getTitle() : ''; ?>">
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
                                    <input type="file" name="image" class="dropify" />

                                </div>
                      
                            </div>
                            <div class="col s12 center">
                                <div id="ItemList" class="card_list">
                                    <label>
                                        <span><small>Itens</small></span>
                                    </label>
                                </div>
                                <p>
                                    <button type="submit" class="btn waves-effect">Salvar</button>
                                    <button id="AddItem" class="btn waves-effect blue" type="button"
                                        onclick="Test()">Adicionar Item</button>
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
            let n = 0;

            function Test() {
                n == 0 ? n = 1 : n;

                let Component = `

    <input type="hidden" name="item_id_value" value="${n}" />
    <section style="background-color: orange;margin: 15px; border-radius: 20px"> <span style="background: white; border-radius: 5px;"> Cadastro Container ${n} </span> 
   
    <span class="badge badge-success" id="indexIndex">?</span>

    <div style="margin: 20px;">

    
    
    <label for="title">
                                    Titulo
                                    <input type="text" name="title_item_${n}" value="<?= (isset($data)) ? $data->getTitle() : ''; ?>">
                                </label>
                                <label for="description">
                                    Descrição completa
                                    <span class="fa fa-exclamation-circle"></span>
                                </label>
                                <textarea name="description_item_${n}" class="editor" required>
                                    <?= (isset($data)) ? $data->getDescription() : '<p>Insira uma observação do seu item<p/>'; ?>
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
                                    <input type="file" name="image" class="dropify" />

                                </div>
                      
                            </div>
                    
          

                </div>





                </form>
    </section>
    
    `
                n++
                $("#ItemList").append(Component);

            }
        </script>

</body>

</html>