[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-accountgroup-datatable" class="data-table table table-striped generic-data-table" style="width:100%">
        <thead>
            <tr>
                <th data-field="account_group_id"  data-primaryKey="true" data-hidden="true">Id</th>
                <th data-field="account_group">Account Group</th>
                <th data-field="account_class">Account Classification</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-AccountGroup-datatable-includeDeleted" class="includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="loadRecord()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary" ng-click="restoreRecords()" >
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary" ng-click="deleteRecords()" >
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" url="/finance/accountgroup/post" />
        <div class="form-group">
            <input type="text" name="id" ng-model="Data.fields.account_group_id"  class="hidden"/>
            <label for="account_group">Account Group</label>
            <input type="text" class="form-control" name="field[account_group]" id="account_group" required="" ng-model="Data.fields.account_group">
            <div class="invalid-feedback">Please enter a account group</div>
        </div>
        <div class="form-group">
            <switch-enabled data-ng-model="Data.fields.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                data-parent-modal="[[$View->modalID]]">Save changes</button>
        </div>
    </form>
[[/block]]