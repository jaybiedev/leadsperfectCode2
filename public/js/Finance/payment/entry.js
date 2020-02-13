$(document).ready(function() {

    var dataTableTools = new DataTableTools('#payment-entry-datatable');
    var self = this;
    
    dataTableTools.init({
            "ajax": {url: "/Finance/payment/getDetailsDataTable", data:{payment_header_id: ManagePayment.getPaymentheaderID()}},  
            "columns": [
                { "data": "payment_detail_id", "visible": false },
                { "data": "account" },
                { "data": "ddate", render: function ( data, type, row ) {
                        return CommonUtils.formatDate(data);
                    }
                },
                { "data": "withdrawn", className: "text-right", render: function ( data, type, row ) {
                        return CommonUtils.formatNumber(data);
                    }
                },
                { "data": "amount", className: "text-right", render: function ( data, type, row ) {
                        return CommonUtils.formatNumber(data);
                    }
                },
                { "data": "excess", className: "text-right", render: function ( data, type, row ) {
                        return CommonUtils.formatNumber(data);
                    }
                },
                { "data": "remarks" },
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='paymentCtrl']").scope();
                scope.load(data.partner_id);
                // $('#Editpartner').modal('show');
            }
    });
    
    /*$("button#save-payment-detail").on('click', function() {
        debugger;   
    })*/

    // set account_group_id filter to account search dropdown
    $("#account_group_id").on('change', function() {
        var self = $(this);
        $("select#account_id").attr('account_group_id', self.val());
    });

});

var ManagePayment = {
     payment_detail_id: null,
     payment_header_id : null,

     getPaymentheaderID : function() {
         var self = this;
         self.payment_header_id = $("input#payment_header_id").val();
         return self.payment_header_id;
     }
}

app.controller('paymentCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/payment',
            PaymentDetail : {
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

        $scope.Data.PaymentDetail = {
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
            url   : $scope.Data.url + "/getDetail/?payment_detail_id=" + payment_detail_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object') {
                    $scope.Data.PaymentDetail = response.data.data.PaymentDetail;
                }
            }
        );
    
    };

    /*$scope.savePaymentDetail = function() {
    	debugger;
    };*/
});