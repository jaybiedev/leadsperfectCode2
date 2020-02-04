[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-usergroup-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Group</th>
                <th>Code</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-usergroup-datatable-includeDeleted"> Show deleted records</label>
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
            <label for="usergroup">User Group</label>
            <input type="text" class="form-control" name="usergroup" id="usergroup" required="" ng-model="Data.usergroup.adminusergroup">
            <div class="invalid-feedback">Please enter user group name</div>
        </div>
        <div class="form-group">
            <label for="usergroup">Code</label>
            <input type="text" class="form-control" name="code" id="usergroup" required="" ng-model="Data.usergroup.usergroup">
            <div class="invalid-feedback">Please code</div>
        </div>        
        <div class="form-group">
            <switch-enabled ng-model="Data.usergroup.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-usergroup" ng-click="saveusergroup()">Save changes</button>
        </div>
    </form>
[[/block]]