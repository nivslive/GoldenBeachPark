$(document).ready(function() {

    let base = $('base').attr('href');

    // Basic Data
    let grid = $("#jsGrid-basic").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 3,
        pageIndex: 1,
        confirmDeleting: false,
        onItemDeleting: function(args) {
            if (!args.item.deleteConfirmed) { // custom property for confirmation
                args.cancel = true; // cancel deleting
                swal({
                        title: "Você tem certeza?",
                        text: `Você estará apagando a materia: ${args.item.title}`,
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
                            args.item.deleteConfirmed = true;
                            grid.jsGrid('deleteItem', args.item);
                            swal("Deletado!", `A Materia ${args.item.title} foi deletada com sucesso!`, "success");
                        } else {
                            swal("Cancelado", "A Materia não será deletada :)", "error");
                        }
                    });
            }
        },
        pagerFormat: "Páginas: {prev} {pages} {next}    {pageIndex} de {pageCount}",
        pagePrevText: "Anterior",
        pageNextText: "Próxima",
        controller: {
            loadData: function(filter) {
                return $.ajax({
                    type: "GET",
                    url: `${base}material/searchData`,
                    dataType: "json",
                });
            },
            deleteItem: function(item) {
                return $.ajax({
                    url: `${base}material/delete`,
                    type: "DELETE",
                    data: {
                        id: item.id
                    }
                });
            },
        },
        fields: [
            { title: 'ID', align: "center", name: "id", width: 50 },
            { title: 'Título da Materia', name: "title", width: 250 },
            { title: 'Data de Publicação', align: "center", name: "date", width: 100 },
            { type: "control" }
        ]
    });

    window.setInterval(function() {
        $(".jsgrid-grid-body tbody tr").click(function() {

            //Pega Id linha selecinada 
            var PegaIdDaGRid = $(this).find('td').first().text();
            //Chama a tela do Editar passando o ID
            window.location = 'material/edit/' + PegaIdDaGRid;

        });
    }, 50)
});