$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-partner-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/partner/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "partner_id", "visible": false },
                { "data": "partner" , 
                  "render": function(data, type, row, meta) {
                                return CommonUtils.renderDataInSpan(data, row.date_deleted)
                            }
                }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='genericCtrl']").scope();
                scope.Data.url = '/finance/partner';
                scope.Data.data = data;
                scope.Data.record_id = data.partner_id;
                scope.Data.fields = {
                        partner_id: "",
                        partner: "",
                        enabled: true
                    };
                scope.loadRecord(data.partner_id);
                $('#EditPartner').modal('show');
            }
        });

    /*
    $("button#save-partner").on('click', function() {
        debugger;   
    }) */
});