/**
* Controller for generic CRUD pages with browser, Create, Update, Delete
*/
app.controller('genericCtrl', function($scope, $http, $location) {

    $scope.Data = {
            url : window.location.pathname,
            primaryKey: '',
            record_id: 0,
            data: {},
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

    $scope.numberify = function(numstring) {
        return parseFloat(numstring);
    };

    $scope.loadRecord = function(record_id=null) {

       $scope.Data.record_id = record_id;
       var includeDeleted = false;

       if (typeof $scope.Data.data == 'object' && $scope.Data.data.date_deleted) {
            includeDeleted = ($scope.Data.data.date_deleted != null);
       }
       // also check the record
       if (!includeDeleted && $('input[type="checkbox"].includeDeleted')) {
            includeDeleted = $('input[type="checkbox"].includeDeleted').prop('checked');    
       }

        $http({
            method: "get",
            url   : $scope.Data.url + "/get/?id=" + record_id + '&includeDeleted=' + includeDeleted
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

    $scope.saveRecord  = function() {
        // this is currently handled by jquery (Utils.js) generic ajax form post 
    };

    $scope.deleteRecords = function() {
        // prompt user
        
        // get selected rows from dataTable
        var btnElement = $(event.currentTarget);
        var datatableSelector = btnElement.attr('data-datatable-refresh');
        if (!datatableSelector) {
            var dt = btnElement.parentsUntil('table.data-table').find('table.data-table')
            if (dt.length > 0) {
                datatableSelector = "#" + dt.attr('id');
            }
        }
        var datatable = window.DataTables.loaded[datatableSelector];

        if (!datatable) {
            return CommonMessage.toast(false, "No items selected.");
        }

        var primaryKey = datatable.settings.primaryKey;
        if (!primaryKey)
            primaryKey = datatable.settings.columns[0].data;

        var ids = [];
        var rows = datatable.datatable.rows( { selected: true }).data();
        rows.each(function(a, b) {
            ids.push(a[primaryKey]);
        });

        // prompt user
        CommonDialog.confirm({
            title: 'Delete',
            message: ' Are you sure you want to delete these records?',
            callback : function(result) {
                $http({
                    method: "get",
                    url   : $scope.Data.url + "/delete/?ids=" + ids
                }).then(
                    function (response) {
                        if (typeof response.data.data == 'object') {
                            var message = '';
                            if (response.data.message != null) {
                                message = response.data.message;
                            }

                            if (response.data.success) {
                                CommonMessage.toast(true, "Records successfully deleted! " + message);

                                if (datatable) {
                                    datatable.refresh();
                                }
                            }
                            else {
                                CommonMessage.toast(false, "Error: Unable to delete records." + message);
                            }
                        }
                        else {
                            // error
                            CommonMessage.toast(false, "Error: Unable to delete records. No response from server.");
                        }
                            
                    }
                ); 
            }
        });       
    };

    $scope.restoreRecords = function() {
        
        // get selected rows from dataTable
        var btnElement = $(event.currentTarget);
        var datatableSelector = btnElement.attr('data-datatable-refresh');
        if (!datatableSelector) {
            var dt = btnElement.parentsUntil('table.data-table').find('table.data-table')
            if (dt.length > 0) {
                datatableSelector = "#" + dt.attr('id');
            }
        }
        var datatable = window.DataTables.loaded[datatableSelector];

        if (!datatable) {
            return CommonMessage.toast(false, "No items selected.");
        }

        var primaryKey = datatable.settings.primaryKey;
        if (!primaryKey)
            primaryKey = datatable.settings.columns[0].data;

        var ids = [];
        var rows = datatable.datatable.rows( { selected: true }).data();
        rows.each(function(a, b) {
            ids.push(a[primaryKey]);
        });

        // prompt user
        CommonDialog.confirm({
            title: 'Restore',
            message: ' Are you sure you want to restore these records?',
            callback : function(result) {
                $http({
                    method: "get",
                    url   : $scope.Data.url + "/restore/?ids=" + ids
                }).then(
                    function (response) {
                        if (typeof response.data.data == 'object') {
                            var message = '';
                            if (response.data.message != null) {
                                message = response.data.message;
                            }
                            
                            if (response.data.success) {
                                CommonMessage.toast(true, "Records successfully restored! " + message);
                                if (datatable) {
                                    datatable.refresh();
                                }
                            }
                            else {
                                CommonMessage.toast(false, "Error: Unable to restore records." + message);
                            }
                        }
                        else {
                            // error
                            CommonMessage.toast(false, "Error: Unable to restore records. No response from server.");
                        }
                            
                    }
                );                        
                    //
            } // end of callback
        }); // end of dialog  
            
    }; // end of restore   
});