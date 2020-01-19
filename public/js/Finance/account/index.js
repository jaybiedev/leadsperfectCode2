$(document).ready(function() {
    $("button#btn-account-edit").on('click', function() {
        window.location.href = "/finance/account/edit";
    });
});

app.controller('accountCtrl', function($scope, $http, $timeout) {

    $scope.Data = {
            url:'/finance/account',
            searchKey : '', 
            searchField:'account',
            searchResult: [
                /*
                {account_id: '1', account: 'Sample1', 'date':'2020-01-20', 
                branch:'Bacolod', address: 'Jose', 
                classification: 'Pensioner', status: 'Paid'} */
            ]
        };

    var filterTextTimeout;
    $scope.searchAccount = function() {
        key = event.keyCode;
        // this.Data.searchKey
        if (filterTextTimeout) 
            $timeout.cancel(filterTextTimeout);

        filterTextTimeout = $timeout(function() {
            $http({
                method: "get",
                url   : $scope.Data.url + "/get/?searchKey=" + $scope.Data.searchKey + "&searchField=" + $scope.Data.searchField
            }).then(
                function (response) {
                    if (typeof response.data.data == 'object') {
                        $scope.Data.searchResult = response.data.data
                    }                    
                }
            )}, 250);
    }
});