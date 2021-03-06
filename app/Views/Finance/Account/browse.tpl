[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-account-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Account Name</th>
                 <th>Account#</th>
                 <th>Group</th>
                 <th>Branch</th>
                 <th>Status</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-AccountClass-datatable-includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="load()">
            <i class="fa fa-home"></i> Add New
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
            <label for="account">Account Classification</label>
            <input type="text" class="form-control" name="account" id="account" required="" ng-model="Data.AccountClass.AccountClass">
            <div class="invalid-feedback">Please enter a account classification</div>
        </div>
        <div class="form-group">
            <switch-enabled ng-model="Data.AccountClass.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-account" ng-click="saveAccountClass()">Save changes</button>
        </div>
    </form>
[[/block]]