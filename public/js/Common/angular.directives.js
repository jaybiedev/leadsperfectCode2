
app.directive('switchEnabled', function ($compile) {
    return {
        restrict: 'E',
        require: "ngModel",
        link: function (scope, element, attrs, ngModel) {
            var lbl = 'Enabled';
            debugger;
            if (!ngModel)
                lbl = 'Disabled';

            var html = "<label>" + lbl + "</label><div>\
                <label class='switch'>\
                    <input type='checkbox' ng-model='" + ngModel + "'>\
                    <span class='slider round'></span>\
                </label>\</div>";
            var e =$compile(html)(scope);
            element.replaceWith(e);
        }
    };
  });