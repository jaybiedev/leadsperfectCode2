[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-admin-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>User Group</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-admin-datatable-includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="load()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form" role="form" autocomplete="off"  novalidate="" method="POST" action="" />
        <div class="form-group">
            <label for="admin">User Name</label>
            <input type="text" class="form-control" name="username" id="admin" required="required" ng-model="Data.admin.username">
            <div class="invalid-feedback">Please enter user name</div>
        </div>
        <div class="form-group">
            <label for="admin">Full Name</label>
            <input type="text" class="form-control" name="code" id="name" ng-model="Data.admin.name">
            <div class="invalid-feedback">Please enter full name</div>
        </div> 
        <div class="form-group">
            <label for="admin">User Group</label>
            <input type="text" class="form-control" name="adminusergroup_id" id="adminusergroup_id" ng-model="Data.admin.adminusergroup_id">
            <div class="invalid-feedback">User group -- need to be dropdown</div>
        </div>               
        <div class="form-group">
            <switch-enabled ng-model="Data.admin.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-admin" ng-click="saveAdmin()">Save changes</button>
        </div>
    </form>
[[/block]]