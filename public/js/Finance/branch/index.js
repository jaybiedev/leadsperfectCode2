$(document).ready(function() {

    var dataTableTools = new DataTableTools('#manage-branch-datatable');
    dataTableTools.init({
            "ajax": {url: "/Finance/branch/get", data:{includeDeleted: false}},  
            "columns": [
                { "data": "branch_id", "visible": false },
                { "data": "branch" },
                { "data": "branch_code" },
                { "data": "branch_address" }
            ]}
    );
});

