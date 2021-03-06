/**
     * Inline slider switch
     * @usage: <switch-enabled   data-element="vm.data.text"></switch-enabled>
     */
app.directive('switchEnabledxxxx', function ($compile) {

        function link(scope, element, attrs) {

            scope.checkedAttribute = '';
            scope.name = attrs.name;
            scope.dataNgModel = attrs.element;
            debugger;

            scope.sw = function(sc, el) {
                this.checkedAttribute = "checked='checked'"
            }
            
        }

        return {
            restrict: 'E', // element
            scope   : {
                dataElement: '='
            },
            templateUrl: "/libs/tools/Finance/js/directives/templates/switchEnabled.html",
            link    : link,
            replace : true
        };

});



app.directive('switchEnabled', function ($compile) {
    return {
        restrict: 'E',
        require: "ngModel",
        scope: {
            dataNgModel: '='
          },   
        link: function (scope, element, attrs, ngModel) {

            var html = '<label>Enabled</label><div>\
                <label class="switch">\
                    <input type="checkbox" class="enable-switch" ng-model="' + element.attr('ng-model') + '" name="' + 
                    element.attr('name') + '" value="1" checked="checked">\
                    <span class="slider round"></span>\
                </label>\</div>';
            //var e =$compile(html)(scope);
            element.replaceWith(html);

            $('label.switch').click(function() {
                var self = $(this);
                var checkbox = self.find("input[type='checkbox']");

                if (checkbox && checkbox.length > 0) {
                    checkbox.prop("checked", !checkbox.prop("checked"));
                }
            });
        }
    };
  });

  app.directive('myDirective', function($compile) {
    return {
      restrict: 'AE', //attribute or element
      scope: {
        myDirectiveVar: '=',
       //bindAttr: '='
      },
      template: '<div class="some">' +
        '<input ng-model="myDirectiveVar"></div>',
      replace: true,
      //require: 'ngModel',
      link: function($scope, elem, attr, ctrl) {
        console.debug($scope);
        //var textField = $('input', elem).attr('ng-model', 'myDirectiveVar');
        // $compile(textField)($scope.$parent);
      }
    };
  });