$(document).ready(function() {
    CommonPlugins.init();
});

var CommonUtils = {
    encrypt : function(data) {
        return window.btoa(data);
    },

    decrypt : function(data) {
        return window.atob(data);
    },

    getParam : function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)')
                          .exec(window.location.href);
        if (results == null) {
             return null;
        }
        return results[1] || null;        
    },

    formatNumber : function(num, precision) {

        var number = num.replace(/,/g, "");
        if (typeof precision != "undefined" && parseInt(precision) > -1) {
            number = parseFloat(num.replace(/,/g, "")).toFixed(parseInt(precision));
        }

        return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    },

    formatDate : function(date, format) {
        if (typeof format == 'undefined')
            format = 'mm/dd/yy';

        if (date.length == 10) {
            date += ' 12:00 PST';
        }
        var _date = $.datepicker.formatDate(format, new Date(date))

        return _date;
   
    },

    getSelfAttribute : function(domElement, attribute) {
        if ($(domElement).attr(attribute)) 
            return $(domElement).attr(attribute);

        retun;
    }
}

var CommonMessage = {

    toast : function(success, message) {
        var _class = "alert-danger";
        if (success) {
            var _class = "alert-success";
        }

        var element = $("body").find("div.toast-generic");
        if (typeof element == "undefined" || element.length == 0) {
            // <div class='toast-header'></div>\
            var html = "<div class='toast-generic'>\
                        <div class='toast-body'>Message</div>\
            </div>";
            $("body").append(html);
            element = $("body").find("div.toast-generic");
        }

        if (element) {
            element.removeClass("alert-success alert-danger");
            element.addClass(_class);
            // element.find("div.toast-header").addClass(_class).html(title);
            element.find("div.toast-body").html(message);
            element.toast({delay:2000});
            element.toast('show');
        }
    }
}

var CommonPlugins = {

    init : function() {
        var self = this;

        self.initDatePicker();
        self.initDD();
        self.initAjaxDD();
        self.initButtonEvents();
        self.enterToTabEvent();
        self.formatNumber();
    },

    formatNumber : function() {
        $("input.format-number").focusout(function() {
            var self = $(this);
            var _val = self.val();
            self.val(CommonUtils.formatNumber(_val, 2));
        });
    },
    
    enterToTabEvent : function() {
        var formEnterToTab = $('form.key-enter-to-tab');
        
        if (formEnterToTab) {
            $('input, select, textarea', formEnterToTab).on('keypress', function(event){
                var self = $(this);
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13') {
                    event.preventDefault();
                    $('input, select, textarea, button', formEnterToTab)
                    [$('input, select, textarea, button', formEnterToTab).index(this)+1].focus();
                }
            });
        }
    },

    initDatePicker: function() {
        $('.datepicker').datepicker({
            dateFormat: "mm/dd/yy",
            showOn: "both", 
            buttonText: "<i class='fa fa-calendar-alt'></i>"
        });
        $('.datepicker-no-icon').datepicker({
            dateFormat: "mm/dd/yy"
        });
    },

    /**
     * element parameters 
     * select.select2-ajax-dd-generic"
     * @param string placeholder optional
     * @param string selected optional
     */
    initDD : function() {
        // init select2
        var selectdd = $("select.select2-dd");
        if (selectdd) {
            $(selectdd).each(function(i, item) {
                var _item = $(item);
                var placeholder = "Search";
                var selected = "";
                if (_item.attr('placeholder'))
                    placeholder = _item.attr('placeholder');

                if (_item.attr('selected'))
                    selected = _item.attr('selected');

                $(_item).select2({
                    placeholder: placeholder
                });
            });
        }
    },

    /**
     * element parameters 
     * select.select2-ajax-dd-generic"
     * @param string placeholder optional
     * @param string selected optional
     * @param string data-id    ajax response object ID field
     * @param string data-text  ajax response object display field
     */
    initAjaxDD : function() {
        // init select2
        var selectdd = $("select.select2-ajax-dd-generic");
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
                                            id: item[dataID]
                                        }
                                    })
                                };
                            }
                            else {
                                alert("Error searching...");
                            }
                        }
                    },
                    allowClear: true,
                    placeholder: placeholder,
                    minimumInputLength: 2
                });
            });
        }
    },

    initButtonEvents : function() {
        
        // submit post form with class form-post-generic
        $("button.btn-form-post-generic").on('click', function() {
            var element = $(this);
            element.closest("form.form-post-generic:visible").first().submit();
        });

        // ajax post form with class form-post-post-generic
        $("button.btn-form-post-ajax-generic").on('click', function() {
            var element = $(this);
            var form = element.closest("form.form-post-ajax-generic:visible").first();
            var data = form.serializeArray();
            var url = window.location.href;
            var callback = "";

            if (form.attr('url'))
                url = form.attr('url');

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(response) {
                    var message = "";
                    if (response.message) {
                        message = response.message;
                    }

                    if (!response.success) {
                        CommonMessage.toast(false, "Problem saving data! " + message);
                    }
                    else {
                        if (response.data.redirectTo) {
                            window.location.replace(response.data.redirectTo);
                        }
                        else {
                            CommonMessage.toast(true, "Form as been successfully saved! " + message);
                            if (callback) {
                                if (typeof callback == 'function')
                                    callback();
                                else
                                    eval(callback);
                            }
                        }
                    }
                },
                fail: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    CommonMessage.toast(false, errorMessage);
                },
                dataType: 'json'
            });
        });

        // cancel form with class btn-cancel-generic
        $("button.btn-cancel-generic").on('click', function() {
            var btn = $(this);
            if (btn.attr('url')) {
                window.location.href =  btn.attr('url');
            }
            else {
                window.location.href = "/";
            }
        });
    }
}