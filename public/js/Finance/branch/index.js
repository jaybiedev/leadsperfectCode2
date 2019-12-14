$(document).ready(function() {
    $('.dataTable').DataTable( {
        dom: "Bfrtip",
        "processing": true,
        "serverSide": true,
        "ajax": "/Finance/branch/get",  
        "columns": [
            { "data": "branch_id", "visible": false },
            { "data": "branch" },
            { "data": "branch_code" },
            { "data": "branch_address" }
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

