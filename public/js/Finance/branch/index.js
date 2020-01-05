$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-branch-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/branch/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "branch_id", "visible": false },
                { "data": "branch" },
                { "data": "branch_code" },
                { "data": "branch_address" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='branchCtrl']").scope();
                scope.load(data.branch_id);
                $('#EditBranch').modal('show');
            }
        });

    $("button#save-branch").on('click', function() {
        debugger;   
    })
});

var ManageBranch = {
     branch_id: null,
}

app.controller('branchCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/branch',
            Branch : {
                id: "",
                branch: "",
                branch_code: "",
                branch_address: "",
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

    $scope.load = function(branch_id=null) {

        $scope.Data.Branch = {
            branch_id: "",
            branch: "",
            branch_code: "",
            branch_address: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?branch_id=" + branch_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.Branch = response.data.data;
            }
        );
    
    };

    $scope.saveBranch = function() {
    	debugger;
    };
});