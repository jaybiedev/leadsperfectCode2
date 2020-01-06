$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-collectionfee-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/collectionfee/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "feetable_id", "visible": false },
                { "data": "afrom" },
                { "data": "ato" },
                { "data": "fee" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='feetableCtrl']").scope();
                scope.load(data.feetable_id);
                $('#Editfeetable').modal('show');
            }
        });

    $("button#save-collectionfee").on('click', function() {
        debugger;   
    })
});

var Managefeetable = {
     feetable_id: null,
}

app.controller('feetableCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/collectionfee',
            collectionfee : {
                feetable_id: "",
                afrom: "",
                ato: "",
                fee: "",
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

    $scope.load = function(feetable_id=null) {

        $scope.Data.collectionfee = {
            feetable_id: "",
            afrom: "",
            ato: "",
            fee: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?feetable_id=" + feetable_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.collectionfee = response.data.data;
            }
        );
    
    };

    $scope.savefeetable = function() {
    	debugger;
    };
});