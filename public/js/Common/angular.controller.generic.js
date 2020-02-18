/**
* Controller for generic CRUD pages with browser, Create, Update, Delete
*/
app.controller('genericCtrl', function($scope, $http, $location) {
debugger;
    $scope.Data = {
            url : $location.$$absUrl,
            record_id: 0,
            fields : {
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


    $scope.loadRecord = function(record_id=null) {

       $scope.Data.record_id = record_id;

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?id=" + record_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    // hacking angularjs ng-model
                    var checkBoxEnabled = $("div.modal-dialog").find("input[type='checkbox'].enable-switch");
                    if (checkBoxEnabled && checkBoxEnabled.length > 0) {
                        checkBoxEnabled.prop("checked", response.data.data['enabled']);
                    }
                    $scope.Data.fields = response.data.data;
            }
        );
    
    };
});