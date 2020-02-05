$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-adminusergroup-datatable');
    dataTableTools.init({
            "ajax": {url: "/administration/adminusergroup/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "adminusergroup_id", "visible": false },
                { "data": "adminusergroup" },
                { "data": "usergroup" }

            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='adminusergroupCtrl']").scope();
                scope.load(data.adminusergroup_id);
                $('#EditUserGroup').modal('show');
            }
        });

    $("button#save-adminusergroup").on('click', function() {
        debugger;   
    })
});

var Manageusergroup = {
     adminusergroup_id: null,
}

app.controller('adminusergroupCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/administration/adminusergroup',
            adminusergroup : {
                adminusergroup_id: "",
                adminusergroup: "",
                usergroup: "",
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

    $scope.load = function(usergroup_id=null) {

        $scope.Data.usergroup = {
            adminusergroup_id: "",
            adminusergroup: "",
            usergroup: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?adminusergroup_id=" + usergroup_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.adminusergroup = response.data.data;
            }
        );
    
    };

    $scope.saveAdminUserGroup = function() {
    	debugger;
    };
});