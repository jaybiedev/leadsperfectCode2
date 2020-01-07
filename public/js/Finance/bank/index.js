$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-bank-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/bank/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "bank_id", "visible": false },
                { "data": "bank" },
                { "data": "bank_account"},
                { "data": "branch_id" },
                { "data": "braccess" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='bankCtrl']").scope();
                scope.load(data.bank_id);
                $('#EditBank').modal('show');
            }
        });

    $("button#save-bank").on('click', function() {
        debugger;   
    })
});

var ManageBank = {
     bank_id: null,
}

app.controller('bankCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/bank',
            bank : {
                id: "",
                bank: "",
                bank_account: "",
                branch_id: "",
                braccess: "",
                loan_rate: "",
                enabled: true
            },
            yesno : [{
                value : true,
                label : 'Yes'
            },{
                value : false,
                label : 'No'
            }],
    		alert : '',
    		Messages : {error:null, warning:null, success:null}
    };

    $scope.load = function(bank_id=null) {

        $scope.Data.bank = {
            bank_id: "",
            bank: "",
            bank_account: "",
            branch_id: "",
            braccess: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?bank_id=" + bank_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.bank = response.data.data;
            }
        );
    
    };

    $scope.saveBank = function() {
    	debugger;
    };
});