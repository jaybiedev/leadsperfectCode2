$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-account-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/account/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "account_id", "visible": false },
                { "data": "account" },
                { "data": "account_code" },
                { "data": "account_group_id" },
                { "data": "branch_id" },
                { "data": "account_status" },
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='accountCtrl']").scope();
                scope.load(data.account_id);
                $('#Editaccount').modal('show');
            }
        });

    $("button#save-account").on('click', function() {
        debugger;   
    })
});

var ManageAccountclass = {
     account_id: null,
}

app.controller('accountCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/account',
            account : {
                account_id: "",
                account_code: "",
                branch_id: "",
                account_group_id: "",
                account_status: "",
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

    $scope.load = function(account_id=null) {

        $scope.Data.account = {
            account_id: "",
            account_code: "",
            branch_id: "",
            account_group_id: "",
            account_status: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?account_id=" + account_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.account = response.data.data;
            }
        );
    
    };

    $scope.saveAccount = function() {
    	debugger;
    };
});