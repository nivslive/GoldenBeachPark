$(document).ready(function() {
    $('.data-table-simple').DataTable({
        language: {
            processing: "Processando os dados...",
            search: "Busque um dado:",
            lengthMenu: "Mostrando _MENU_ elementos",
            info: "Mostrando _START_ &agrave; _END_ de _TOTAL_ resultados",
            zeroRecords: "Nenhum dado encontrado, tente novamente...",
            paginate: {
                first: "Primeira",
                previous: "Anterior",
                next: "Proxíma",
                last: "Última"
            }
        },
        "order": [
            [0, 'desc']
        ],
    });


    var table = $('#data-table-row-grouping').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [
            [2, 'asc']
        ],
        "displayLength": 25,
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(2, { page: 'current' }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                    );

                    last = group;
                }
            });
        }
    });

    // Order by the grouping
    $('#data-table-row-grouping tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });


});