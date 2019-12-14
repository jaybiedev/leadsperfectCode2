$(document).ready(function() {
    $('.dataTable').DataTable( {
        dom: "Bfrtip",
        "processing": true,
        "serverSide": true,
        "ajax": "/Finance/department/get",  
        "columns": [
            { "data": "id", "visible": false },
            { "data": "department" },
            { "data": "code" }
        ],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        buttons: [
            /*
                {   text: 'Add',
                    action: function ( e, dt, node, config ) {
                        debugger;
                        $('.modal.modal-form').on('shown.bs.modal', function () {
                            $('#myInput').trigger('focus')
                          });
                    }
                }
            */
            // 'pdf', 'print', 'excel', 'copy', 'csv',
       ]
    });

});

