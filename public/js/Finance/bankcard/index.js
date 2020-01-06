$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-bankcard-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/bankcard/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "bankcard_id", "visible": false },
                { "data": "bankcard" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='bankcardCtrl']").scope();
                scope.load(data.bankcard_id);
                $('#Editbankcard').modal('show');
            }
        });

    $("button#save-bankcard").on('click', function() {
        debugger;   
    })
});

var ManageBankcard = {
     bankcard_id: null,
}

app.controller('bankcardCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/bankcard',
            bankcard : {
                bankcard_id: "",
                bankcard: "",
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

    $scope.load = function(bankcard_id=null) {

        $scope.Data.bankcard = {
            bankcard_id: "",
            bankcard: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?bankcard_id=" + bankcard_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.bankcard = response.data.data;
            }
        );
    
    };

    $scope.saveBankcard = function() {
    	debugger;
    };
});