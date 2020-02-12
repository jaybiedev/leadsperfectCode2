$(document).ready(function() {

    var dataTableTools = new DataTableTools('#payment-index-datatable');
    dataTableTools.init({
            serverSide: false,
            ajax: null,
            columns: null,
            onRowEdit : function(data) {
                debugger;
                window.location.href="/finance/payment/";
            }
        });
});