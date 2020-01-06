$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-partner-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/partner/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "partner_id", "visible": false },
                { "data": "partner" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='partnerCtrl']").scope();
                scope.load(data.partner_id);
                $('#Editpartner').modal('show');
            }
        });

    $("button#save-partner").on('click', function() {
        debugger;   
    })
});

var ManagePartner = {
     partner_id: null,
}

app.controller('partnerCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/partner',
            partner : {
                partner_id: "",
                partner: "",
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

    $scope.load = function(partner_id=null) {

        $scope.Data.partner = {
            partner_id: "",
            partner: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?partner_id=" + partner_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.partner = response.data.data;
            }
        );
    
    };

    $scope.savePartner = function() {
    	debugger;
    };
});