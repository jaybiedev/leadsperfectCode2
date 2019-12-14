function DataTableTools(selector) {

    this.datatable = null;
    this.selector = selector;
    this.includeDeleted = false;
    this.settings = {
        dom: "Bfrtip",
        "processing": true,
        "serverSide": true,
        "ajax": {url: "/Product/module/action",  data: {includeDeleted: false}},
        "columns": [
            { "data": "id", "visible": false },
            { "data": "name" },
            { "data": "code" },
            { "data": "field" }
        ],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        buttons: [
            /*
                {   text: 'Add',
                    action: function ( e, dt, node, config ) {
                        debugger;
                        $('.modal.modal-form').on('shown.bs.modal', function () {
                            $('#myInput').trigger('focus')
                        });
                    }
                }
            */
            // 'pdf', 'print', 'excel', 'copy', 'csv',
        ],
        "drawCallback": function( settings ) {
            $(settings.nTBody).show();
        }
    };

    this.init = function(custom_settings) {
        $.extend( this.settings, custom_settings);

        this.settings.ajax.data.includeDeleted = this.isIncludeDeleted();
        this.datatable = $(this.selector).DataTable(this.settings);
        this.toggleIncludeDeleted();
        $(self.selector + " tbody").show();

    }

    this.refresh =  function()
    {
        this.datatable.ajax.reload();
    }

    this.destroy = function() 
    {
        this.datatable.clear();
        this.datatable.destroy();
    }

    this.isIncludeDeleted = function()
    {
        var id = this.selector.replace(".", "").replace("#", "") + "-includeDeleted";
        var isIncludeDeleteCheckbox = $("input[type='checkbox']#" + id );
        if (isIncludeDeleteCheckbox.length == 0)
            return false;

        return isIncludeDeleteCheckbox.prop("checked");
    }
    
    // checkbox must have id as "select-includeDeleted"
    this.toggleIncludeDeleted = function()
    {
        var id = this.selector.replace(".", "").replace("#", "") + "-includeDeleted";
        var toggleDeleteCheckbox = $("input[type='checkbox']#" + id );

        var self = this;
        toggleDeleteCheckbox.change(function() {
            self.settings.ajax.data.includeDeleted = this.checked;
            // destroy ans re-dreate dataTable
            $(self.selector + " tbody").hide();
            self.destroy();
            self.init({});
        });
    }
}