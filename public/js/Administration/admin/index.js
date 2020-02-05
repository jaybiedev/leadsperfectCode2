$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-admin-datatable');
    dataTableTools.init({
            "ajax": {url: "/administration/admin/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "admin_id", "visible": false },
                { "data": "name" },
                { "data": "username" },
                { "data": "adminusergroup" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='adminCtrl']").scope();
                scope.load(data.admin_id);
                $('#EditUser').modal('show');
            }
        });

    $("button#save-admin").on('click', function() {
        debugger;   
    })
});

var Manageadmin = {
     admin_id: null,
}

app.controller('adminCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/administration/admin',
            admin : {
                admin_id: "",
                name: "",
                username: "",
                adminusergroup:"",
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

    $scope.load = function(admin_id=null) {

        $scope.Data.admin = {
            admin_id: "",
            name: "",
            username: "",
            adminusergroup:"",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?admin_id=" + admin_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.admin = response.data.data;
            }
        );
    
    };

    $scope.saveAdmin = function() {
    	debugger;
    };
});