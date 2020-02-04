$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-usergroup-datatable');
    dataTableTools.init({
            "ajax": {url: "/administration/usergroup/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "adminusergroup_id", "visible": false },
                { "data": "adminusergroup" },
                { "data": "usergroup" }

            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='usergroupCtrl']").scope();
                scope.load(data.adminusergroup_id);
                $('#EditUserGroup').modal('show');
            }
        });

    $("button#save-usergroup").on('click', function() {
        debugger;   
    })
});

var Manageusergroup = {
     adminusergroup_id: null,
}

app.controller('usergroupCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/administration/usergroup',
            usergroup : {
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
            url   : $scope.Data.url + "/get/?usergroup_id=" + usergroup_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.usergroup = response.data.data;
            }
        );
    
    };

    $scope.saveusergroup = function() {
    	debugger;
    };
});