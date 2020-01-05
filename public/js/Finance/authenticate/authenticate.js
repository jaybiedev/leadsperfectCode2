$(document).ready(function() {

    $("form#frm-authenticate").on( "submit", function( event ) {
        event.preventDefault();

        var data = {username: CommonUtils.encrypt($("input#username", this ).val()), 
                    password: CommonUtils.encrypt($("input#password", this ).val()),
                    redirectTo :  CommonUtils.getParam('redirectTo')
                };

        $.ajax({
            type: "POST",
            url: "/finance/authenticate",
            /*contentType: 'application/json',
            data: JSON.stringify(data),*/
            data: data,
            success: function(response) {
                $("#login-error").html("");
                if (!response.success) {
                    $("#login-error").html("Invalid Username or Password").show();
                }
                else if (response.data.redirectTo) {
                    window.location.replace(response.data.redirectTo);
                }
            },
            dataType: 'json'
          });

      });
/*
    $("form#frm-authenticate").on('click', function() {
        $.ajax({
            type: "POST",
            url: "/finance/authenticate",
            data: ,
            success: function(response) {
                debugger;
            },
            dataType: 'json'
          });
    }) */
    
});