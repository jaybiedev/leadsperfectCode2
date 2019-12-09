
app.controller('FinanceCtrl', function($scope, $http) {

    $scope.Data = {
    		User : {}
    };
   
    /*
    $http({
        method: "post",
        url   : Helper.BaseUrl + '/dashboard/getDashboardInitAjax'
    }).then(
        function (response) {
            $scope.Data.User = response.data.data.User;
            $scope.Data.Account = response.data.data.Account;
            $scope.Data.Template = response.data.data.Template;
            $scope.Data.ContentTags = response.data.data.ContentTags;
        }
    );
    */
});
