$("#treeview .parent").click(function (e) {
    e.stopPropagation();
    $(this).find(">ul").toggle("slow");
    if ($(this).hasClass("close"))
        $(this).removeClass("close");
    else
        $(this).addClass("close");
});