$(document).ready(function() {
    FinanceDD.initAccountDD();
})

var FinanceDD =  {

    _formatAccountDD : function (data) {

        var render = '';
        debugger;
        if (data && typeof data.item == 'object') {
            render = '<div class="select2-account-dd">' + 
                        '<div class="account-dd-head" title="' + data.text + '">' + data.text + '</div>' +
                        '<div class="account-dd-small">Loan...' + CommonUtils.formatNumber(data.item.Releasing.gross, 2) + '</div>' +
                        '<div class="account-dd-small">&nbsp;&nbsp;' + data.item.LoanType.loan_type + ' on ' + data.item.Releasing.date + '</div>' + // type / date / amount / 
                        '<div class="account-dd-small">Due (Balance) ' + CommonUtils.formatNumber(data.item.amount_due, 2) + ' of ' + CommonUtils.formatNumber(data.item.Releasing.balance, 2) + '</div>' 
                    '</div>';
            return $(render);
        }
    },

    initAccountDD : function() {
        // init select2
        var self = this;
        var selectdd = $("select.select2-ajax-dd-account");
        if (selectdd) {
            $(selectdd).each(function(i, item) {
                var _item = $(item);
                var placeholder = "Search";
                var selected = "";
                var dataID = "id";
                var dataText = ""
                var ajaxURL = "";

                if (_item.attr('placeholder'))
                    placeholder = _item.attr('placeholder');

                if (_item.attr('selected'))
                    selected = _item.attr('selected');
                
                if (_item.attr('data-id'))
                    dataID = _item.attr('data-id');

                if (_item.attr('data-text'))
                    dataText = _item.attr('data-text'); 
            
                if (_item.attr('data-ajax-url'))
                    ajaxURL = _item.attr('data-ajax-url'); 

                $(_item).select2({
                    ajax: {
                        url: ajaxURL,
                        dataType: 'json',
                        quietMillis: 50,
                        data: function (params) {
                            var query = {
                                searchKey: params.term,
                                asOfDate: 'NOW',
                                type: 'public'
                            }
                            // Query parameters will be ?search=[term]&type=public
                            return query;
                        },
                        processResults: function (response) {
                            if (response.success && response.data) {
                                var data = response.data;
                                return {
                                    results: $.map(data, function (item) {
                                        return {
                                            text: item[dataText],
                                            id: item[dataID],
                                            item:item
                                        }
                                    })
                                };
                            }
                            else {
                                alert("Error searching...");
                            }
                        }
                    },
                    templateResult: self._formatAccountDD,
                    allowClear: true,
                    placeholder: placeholder,
                    minimumInputLength: 2
                });
            });
        }
    }
}