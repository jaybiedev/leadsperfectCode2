[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-branch-datatable" class="data-table table table-striped generic-data-table" style="width:100%">
        <thead>
            <tr>
                <th data-field="branch_id" data-primaryKey="true" data-hidden="true">Id</th>
                <th data-field="branch">Branch</th>
                <th data-field="branch_code">Code</th>
                <th data-field="branch_address">Address</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-branch-datatable-includeDeleted" class="includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="loadRecord()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary"  ng-click="restoreRecords()" data-datatable-refresh="#manage-branch-datatable">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary" ng-click="deleteRecords()" data-datatable-refresh="#manage-branch-datatable">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>
[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" url="/finance/branch/post" />
        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" name="id" ng-model="Data.fields.branch_id"  class="hidden"/>
            <input type="text" class="form-control" name="field[branch]" id="Branch" required="" ng-model="Data.fields.branch">
            <div class="invalid-feedback">Please enter a branch name</div>
        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" name="field[branch_code]" ng-model="Data.fields.branch_code">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="field[branch_address]" ng-model="Data.fields.branch_address">
        </div>
        <div class="form-group">
            <switch-enabled data-ng-model="Data.fields.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                data-parent-modal="[[$View->modalID]]"
                data-datatable-refresh="#manage-branch-datatable"
            >Save changes</button>
        </div>
    </form>
[[/block]]