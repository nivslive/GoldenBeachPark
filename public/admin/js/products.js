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
                        text: `Você estará apagando o produto: ${args.item.name}`,
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
                            swal("Deletado!", `O produto ${args.item.name} foi deletado com sucesso!`, "success");
                        } else {
                            swal("Cancelado", "O produto não será deletado :)", "error");
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
                    url: `${base}product/searchData`,
                    dataType: "json",
                });
            },
            deleteItem: function(item) {
                return $.ajax({
                    url: `${base}product/delete`,
                    type: "DELETE",
                    data: {
                        id: item.id
                    }
                });
            },
        },
        fields: [
            { title: 'ID', align: "center", name: "id", width: 50 },
            {
                title: 'Foto',
                name: "image",
                align: "center",
                width: 90,
                itemTemplate: function(val, item) {
                    return $("<img>").attr("src", val);
                }
            },
            { title: 'Nome do Produto', name: "name", width: 250 },
            { title: 'Em promoção?', align: "center", name: "promotion" },
            { title: 'Frete Grátis?', align: "center", name: "freeShipping" },
            { title: 'Categoria', align: "center", name: "tag", width: 120 },
            { type: "control" }
        ]
    });

    window.setInterval(function() {
        $(".jsgrid-grid-body tbody tr").click(function() {

            //Pega Id linha selecinada 
            var PegaIdDaGRid = $(this).find('td').first().text();
            //Chama a tela do Editar passando o ID
            window.location = 'product/edit/' + PegaIdDaGRid;

        });
    }, 50)
});