$(document).ready(function() {

    let base = $('base').attr('href');

    let active = $('.checked');

    $('input[name="tags[]"]').change(function(e) {
        e.preventDefault();

        if (active != '') {
            $(active).removeClass('checked');
        }

        active = $(this).parent();
        $(this).parent().addClass('checked');
    });

    $('input[name="title"]').bind('input', function(e) {

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

    $('a.btn').click(function(e) {
        e.preventDefault();
        let id = this.href;
        id = id.split('/');
        id = id[id.length - 1];

        swal({
                title: "Você tem certeza?",
                text: `Você estará apagando essa categoria e todas as categorias filhas dessa categoria.`,
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
                        type: "DELETE",
                        url: `${base}tag/delete`,
                        data: {
                            id: id
                        },
                        success: function(response) {
                            swal("Deletado!", `A categoria foi deletada com sucesso!`, "success");
                            setTimeout(() => {
                                window.location.href = `${base}/tag/search`;
                            }, 1000);
                        }
                    });
                } else {
                    swal("Cancelado", "A categoria não será deletada :)", "error");
                }
            });
    });

});