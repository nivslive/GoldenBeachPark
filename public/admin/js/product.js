$(document).ready(function() {

    let base = $('base').attr('href');

    $('.mask').mask('#.##0,00', { reverse: true });

    $('input[name="name"]').bind('input', function(e) {

        $.ajax({
            type: "POST",
            url: `${base}helper/sanitizar`,
            data: {
                text: this.value
            },
            success: function(response) {
                $('#url').html(response);
                $('input[name="url"]').val(response);
            }
        });
    });

    $('input[name="tag"]').click(function(e) {
        e.preventDefault();
        $('.modalTag').addClass('active');
        let id = 0;
        if (this.value != '') {
            id = $('input[name="tag_id"]').val();
        }
        $.ajax({
            type: "GET",
            url: `${base}tag/searchProduct`,
            data: {
                id: id
            },
            success: function(response) {
                $('.modalTag #search-tag').html(response);
                if (response == '<ul></ul>') {
                    $('.modalTag #search-tag').html(`
                    <div class="flex">
                        <p>No momento não existe nenhuma categoria cadastrada</p>
                        <a href="tag/create" class="btn waves-effect">
                            <span class="far fa-plus-square"></span>
                            Cadastre uma nova
                        </a>
                    </div>
                    `);
                }

                let active;
                if ($('input[name="tags"]:checked').val() != undefined) {
                    active = $('input[name="tags"]:checked').parent().parent();
                }
                $('input[name="tags"]').click(function(e) {

                    if (active != '') {
                        $(active).removeClass('active');
                    }

                    $(this).parent().parent().addClass('active');
                    active = $(this).parent().parent();
                });
            }
        });
    });

    $('.modalTag button').click(function(e) {
        e.preventDefault();
        let tag = $('input[name="tags"]:checked').siblings('span').text();
        let tag_id = $('input[name="tags"]:checked').val();
        $('input[name="tag"]').val(tag);
        $('input[name="tag_id"]').val(tag_id);
        $('.modalTag').removeClass('active');
    });

    $('.modalTag .close').click(function(e) {
        e.preventDefault();
        $('.modalTag').removeClass('active');
    });

    $('button.stock').click(function(e) {
        e.preventDefault();
        $('.modalStock').addClass('active');
    });

    $('.modalStock .close').click(function(e) {
        e.preventDefault();
        $('.modalStock').removeClass('active');
    });

    $('button.color').click(function(e) {
        e.preventDefault();
        $('.modalColor').addClass('active');
    });

    $('.modalColor .close').click(function(e) {
        e.preventDefault();
        $('.modalColor').removeClass('active');
    });

    $('button.size').click(function(e) {
        e.preventDefault();
        $('.modalSize').addClass('active');
    });

    $('.modalSize .close').click(function(e) {
        e.preventDefault();
        $('.modalSize').removeClass('active');
    });

    $('input[name="tags"]').bind('keydown', function(e) {
        if (e.keyCode == 13 && this.value != '') {
            e.preventDefault();

            let tag = this;

            $.ajax({
                type: "POST",
                url: `${base}rank/persist`,
                data: {
                    product: parseInt($('input[name="id"]').val()),
                    name: this.value
                },
                success: function(response) {
                    $('.tags').append(`
                        <div class="chip" data-id="${response}">
                            ${tag.value}
                            <i class="material-icons mdi-navigation-close"></i>
                        </div>
                    `);
                    tag.value = '';
                    $('.chip i').click(function(e) {
                        id = $(this).parent().data('id');
                        deleteTag(id);
                    });
                }
            });
        }
    });

    $('.chip i').click(function(e) {
        id = $(this).parent().data('id');
        deleteTag(id);
    });

    function deleteTag(data) {
        $.ajax({
            type: "DELETE",
            url: `${base}rank/delete`,
            data: {
                id: data
            }
        });
    }

    $('.delete').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('href').split('/');
        swal({
                title: "Você tem certeza?",
                text: `Que deseje excluir esse registro?`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, eu tenho",
                cancelButtonText: "Não, cancele",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: `${base}${id[id.length - 3]}/${id[id.length - 2]}`,
                        data: {
                            id: id[id.length - 1],
                        },
                        type: 'DELETE',
                        success: function(response) {
                            swal("Deletado!", `O registro foi deletado com sucesso!`, "success");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                } else {
                    swal("Cancelado", "O registro não será deletado :)", "error");
                }
            }
        )
    });

    // Used events
    var drEvent = $('.dropify').dropify({
        messages: {
            'default': 'Arraste e solte um arquivo aqui ou clique',
            'replace': 'Arraste e solte ou clique para substituir',
            'remove': 'Remover',
            'error': 'Ooops, algo errado aconteceu.'
        }
    });

    drEvent.on('dropify.beforeClear', function(event, element) {
        let elem = this;
        swal({
                title: "Você tem certeza?",
                text: `Que deseje excluir essa imagem: ${element.filename}`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, eu tenho",
                cancelButtonText: "Não, cancele",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: 'image/delete',
                        data: {
                            id: elem.id,
                            image: element.filename
                        },
                        type: 'DELETE',
                        success: function(response) {
                            $(elem).parent().parent().remove();
                            swal("Deletado!", `A imagem ${element.filename} foi deletada com sucesso!`, "success");
                            countImages('#images');
                        }
                    });
                } else {
                    swal("Cancelado", "A imagem não será deletado :)", "error");
                }
            }
        )
        return false;
    });

    function countImages(id) {
        let count = 0;
        $(`${id} .start .m6`).each(function(index, element) {
            count++;
        });
        if (count == 0) {
            location.reload();
        }
    }


    $('.input input[name="files[]"]').change(function(e) {
        e.preventDefault();
        $('.start').hide('fast');
        $('.input').hide('fast');
        let elem = $(this).parent().parent().parent();
        for (let i = 0; i < this.files.length; i++) {
            var file = new FileReader();
            file.onload = function(e) {
                $(elem).append(`
                    <div class="col s12 m6 l3">
                        <img src="${e.target.result}" />
                        <input type="text" name="alt[]" placeholder="Texto Alternativo">
                        <button type="button" class="remove">
                            Remover
                        </button>
                        <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="O atributo alt é utilizado em códigos HTML, responsáveis pela criação de páginas web, com o objetivo de atribuir um texto alternativo a imagem, se, por algum motivo, ela não seja carregada ou caso o site esteja sendo visto por um screen reader (leitor de tela, muito utilizado para acessibilidade a deficientes visuais).">
                            <span class="fa fa-question-circle"></span>
                        </a>
                    </div>
                `);
            };
            file.readAsDataURL(this.files[i]);
        }

        setTimeout(() => {
            $(elem).append(`
                <div class="clearfix"></div>
                <div class="col s12 center">
                    <button type="submit" class="btn waves-effect">Salvar</button>
                </div>
            `);
            $('.start').remove();
            $('.remove').click(function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
            $('.tooltipped').tooltip();
        }, this.files.length * 200);
    });

    $(window).on('dragenter', function() {
        $(this).preventDefault();
    });
    $('#images').bind('dragover', function(event) {
        event.stopPropagation();
        $('#images .input').addClass('drag-over');
    });
    $('#images').bind('dragleave', function(event) {
        event.stopPropagation();
        $('#images .input').removeClass('drag-over');
    });

    ClassicEditor
        .create(document.querySelector('.editor'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'imageUpload',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    '|'
                ]
            },
            language: 'pt-br',
            licenseKey: '',
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: nofltlx4alsd-av3vandobeov');
            console.error(error);
        });

});