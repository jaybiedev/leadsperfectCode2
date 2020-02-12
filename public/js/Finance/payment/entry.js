$(document).ready(function() {

    var dataTableTools = new DataTableTools('#payment-entry-datatable');
    /*
    dataTableTools.init({
            "ajax": {url: "/Finance/payment/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "partner_id", "visible": false },
                { "data": "partner" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='paymentCtrl']").scope();
                scope.load(data.partner_id);
                $('#Editpartner').modal('show');
            }
        });

    $("button#save-payment-detail").on('click', function() {
        debugger;   
    })
    */
});

var ManagePaymentDetail = {
     payment_detail_id: null,
}

app.controller('paymentCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/payment',
            partner : {
                payment_detail_id: "",
                account_id: "",
                ddate: "",
                withdrawn: "",
                excess: "",
                amount:"",
                remarks:""
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

        $scope.Data.payment_detail = {
            payment_detail_id: "",
            account_id: "",
            ddate: "",
            withdrawn: "",
            excess: "",
            amount:"",
            remarks:""
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?payment_detail_id=" + payment_detail_id
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

    $scope.savePaymentDetail = function() {
    	debugger;
    };
});