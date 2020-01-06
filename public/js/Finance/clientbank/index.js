$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-clientbank-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/clientbank/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "clientbank_id", "visible": false },
                { "data": "clientbank" },
                { "data": "clientbank_code" },
                { "data": "clientbank_address" },
                { "data": "telno" },
                { "data": "withdraw_day" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='clientbankCtrl']").scope();
                scope.load(data.clientbank_id);
                $('#Editclientbank').modal('show');
            }
        });

    $("button#save-clientbank").on('click', function() {
        debugger;   
    })
});

var Manageclientbank = {
     clientbank_id: null,
}

app.controller('clientbankCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/clientbank',
            clientbank : {
                id: "",
                clientbank: "",
                clientbank_code: "",
                clientbank_address: "",
                telno: "",
                withdraw_day: "",
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

    $scope.load = function(clientbank_id=null) {

        $scope.Data.clientbank = {
            clientbank_id: "",
            clientbank: "",
            clientbank_code: "",
            clientbank_address: "",
            telno: "",
            withdraw_day: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?clientbank_id=" + clientbank_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.clientbank = response.data.data;
            }
        );
    
    };

    $scope.saveclientbank = function() {
    	debugger;
    };
});