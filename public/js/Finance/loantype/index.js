$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-loan_type-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/loantype/getDataTable", data:{includeDeleted: false}},  
            "columns": [
                { "data": "loan_type_id", "visible": false },
                { "data": "loan_type" },
                { "data": "loan_rate" },
                { "data": "basis" },
                { "data": "loan_interest" },
                { "data": "eir" }
            ],
            onRowEdit : function(data) {
                var scope = angular.element("body[ng-controller='loan_typeCtrl']").scope();
                scope.load(data.loan_type_id);
                $('#EditLoanType').modal('show');
            }
        });

    $("button#save-loan_type").on('click', function() {
        debugger;   
    })
});

var ManageLoanType = {
     loan_type_id: null,
}

app.controller('loan_typeCtrl', function($scope, $http) {

    $scope.Data = {
            url : '/finance/loantype',
            loan_type : {
                id: "",
                loan_type: "",
                loan_interest: "",
                basis: "",
                eir: "",
                loan_rate: "",
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

    $scope.load = function(loan_type_id=null) {

        $scope.Data.loan_type = {
            loan_type_id: "",
            loan_type: "",
            loan_interest: "",
            basis: "",
            eir: "",
            loan_rate: "",
            enabled: true
        }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?loan_type_id=" + loan_type_id
        }).then(
            function (response) {
                if (typeof response.data.data == 'object')
                    response.data.data['enabled'] = true;
                    if (response.data.data.date_deleted != null)
                        response.data.data['enabled'] = false;

                    $scope.Data.loan_type = response.data.data;
            }
        );
    
    };

    $scope.saveLoanType = function() {
    	debugger;
    };
});