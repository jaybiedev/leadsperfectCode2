$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-accountgroup-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/accountgroup/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "account_group_id", "visible": false },
                { "data": "account_group" },
                { "data": "account_class" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='accountgroupCtrl']").scope();
                scope.load(data.account_group_id);
                $('div#EditAccountGroup').modal('show');
            }
        });

    // $("button#save-accountgroup").on('click', function() {
    //     debugger;   
    // })
});

var ManageAccountgroup = {
     account_group_id: null,
}

app.controller('accountgroupCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/accountgroup',
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