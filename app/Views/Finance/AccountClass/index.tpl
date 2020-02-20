[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-accountclass-datatable" class="data-table table table-striped  generic-data-table" style="width:100%">
        <thead>
            <tr>
                <th data-field="account_class_id" data-primaryKey="true" data-hidden="true">Id</th>
                <th data-field="account_class">Account Classification</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-accountclass-datatable-includeDeleted"  class="includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="loadRecord()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary" data-datatable-refresh="#manage-accountclass-datatable">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary" data-datatable-refresh="#manage-accountclass-datatable">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" url="/finance/accountclass/post" />
        <div class="form-group">
            <label for="accountclass">Account Classification</label>
            <input type="text" name="id" ng-model="Data.fields.account_class_id"  class="hidden"/>
            <input type="text" class="form-control" name="field[account_class]" id="accountclass" required="" ng-model="Data.fields.account_class">
            <div class="invalid-feedback">Please enter a account classification</div>
        </div>
        <div class="form-group">
            <switch-enabled data-ng-model="Data.fields.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                data-parent-modal="[[$View->modalID]]"
                data-datatable-refresh="#manage-accountclass-datatable">Save changes</button>
        </div>
    </form>
[[/block]]