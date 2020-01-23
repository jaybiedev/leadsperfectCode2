$(document).ready(function(){
    $("button#frm-cancel").on("click", function() {
        window.location.href = "/finance/account";
    });

    $("button#frm-save").on("click", function() {
        $("form#frm-account-edit").submit();
    });
    
})