$(function() {
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
                        url: 'package/deleteImage',
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
            $('.start').remove();
            $('.remove').click(function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
            $('.tooltipped').tooltip();
        }, this.files.length * 200);
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