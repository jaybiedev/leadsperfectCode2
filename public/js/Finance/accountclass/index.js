$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-accountclass-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/accountclass/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "account_class_id", "visible": false },
                { "data": "account_class" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='accountclassCtrl']").scope();
                scope.load(data.accountclass_id);
                $('#Editaccountclass').modal('show');
            }
        });

    $("button#save-accountclass").on('click', function() {
        debugger;   
    })
});

var Manageaccountclass = {
     account_class_id: null,
}

app.controller('accountclassCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/accountclass',
            accountclass : {
                account_class_id: "",
                account_class: "",
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

    $scope.load = function(accountclass_id=null) {

        $scope.Data.accountclass = {
            account_class_id: "",
            account_class: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?accountclass_id=" + accountclass_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.accountclass = response.data.data;
            }
        );
    
    };

    $scope.saveaccountclass = function() {
    	debugger;
    };
});