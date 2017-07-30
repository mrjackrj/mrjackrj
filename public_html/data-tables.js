$(document).ready(function () {
    $("#example-1").dataTable();
    var e = $("#example-2").DataTable({
        lengthChange: !1, buttons: ["copy", "excel", "pdf", "print"],
        language: {
            "decimal": "",
            "emptyTable": "Nenhuma informação encontrada",
            "info": "Exibindo _START_ de _END_ de _TOTAL_ Resultados",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Show _MENU_ entries",
            "loadingRecords": "Carregando...",
            "processing": "Processando...",
            "search": "Procurar:",
            "zeroRecords": "Nenhuma informação encontrada",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Proximo",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
    e.buttons().container().appendTo("#example-2_wrapper .col-sm-6:eq(0)"),
    $("#example-3").DataTable({ colReorder: !0 }),
    $("#example-5").DataTable({ keys: !0 }),
    $("#example-6").DataTable({ select: { style: "os" } }),
    $("#example-7").DataTable(),
    $("#example-8").DataTable({ scrollX: !0, scrollCollapse: !0, fixedColumns: !0 }),
    $("#example-9").DataTable({ fixedHeader: !0 })
});