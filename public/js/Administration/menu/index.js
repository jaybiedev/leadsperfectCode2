$(document).ready(function() {
    $('#menutree').jstree({
            "core": {
                "check_callback": true            
            },
            "checkbox" : {
                "keep_selected_style" : false
            },
            "plugins": ["checkbox"]
        });

    $('#search').on("keyup change", function () {
        $('#menutree').jstree(true).search($(this).val());
    });
      
    $('#clear').click(function (e) {
        $('#search').val('').change().focus()
    });


    $('#menutree').on('changed.jstree', function (e, data) {
        var objects = data.instance.get_selected(true)
        var leaves = $.grep(objects, function (o) { return data.instance.is_leaf(o) })
        var list = $('#output');
        
        Administration_Menu.selected_menu_ids = [];

        $.each(leaves, function (i, o) {
            $('<li/>').text(o.text).appendTo(list);
            Administration_Menu.selected_menu_ids.push(this.id);
        })
    })

    $("button#save-permissions").on('click', function() {
        Administration_Menu.savePermissions();
    })
});

var Administration_Menu = {
    selected_menu_ids : [],

    savePermissions : function() {
        debugger;
    }
}