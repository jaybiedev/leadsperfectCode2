$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-account_group-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/accountgroup/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "account_group_id", "visible": false },
                { "data": "account_group" },
                { "data": "account_class_id" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='account_groupCtrl']").scope();
                scope.load(data.account_group_id);
                $('#Editaccount_group').modal('show');
            }
        });

    $("button#save-account_group").on('click', function() {
        debugger;   
    })
});

var ManageAccountclass = {
     account_group_id: null,
}

app.controller('account_groupCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/account_group',
            account_group : {
                account_group_id: "",
                account_group: "",
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

    $scope.load = function(account_group_id=null) {

        $scope.Data.account_group = {
            account_group_id: "",
            account_group: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?account_group_id=" + account_group_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.account_group = response.data.data;
            }
        );
    
    };

    $scope.saveAccountGroup = function() {
    	debugger;
    };
});