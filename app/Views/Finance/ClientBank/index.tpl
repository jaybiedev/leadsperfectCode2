[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-clientbank-datatable" class="data-table table table-striped generic-data-table" style="width:100%">
        <thead>
            <tr>
                <th data-field="clientbank_id" data-primaryKey="true" data-hidden="true">Id</th>
                <th data-field="clientbank">Client Bank</th>
                <th data-field="clientbank_code">Code</th>
                <th data-field="clientbank_address">Address</th>
                <th data-field="telno">Telephone</th>
                <th data-field="withdraw_day">Withdraw Day</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-clientbank-datatable-includeDeleted" class="includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="loadRecord()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary" ng-click="restoreRecords()" data-datatable-refresh="#manage-clientbank-datatable">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary" ng-click="deleteRecords()" data-datatable-refresh="#manage-clientbank-datatable">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>
[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" url="/finance/clientbank/post"/>
        <div class="form-group">
            <label for="clientbank">Client Bank</label>
            <input type="text" name="id" ng-model="Data.fields.clientbank_id" class="hidden"/>
            <input type="text" class="form-control" name="field[clientbank]" id="clientbank" required="" ng-model="Data.fields.clientbank">
            <div class="invalid-feedback">Please enter a client bank name</div>
        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" name="field[clientbank_code]" ng-model="Data.fields.clientbank_code">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="field[clientbank_address]" ng-model="Data.fields.clientbank_address">
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" name="field[telno]" ng-model="Data.fields.telno">
        </div>
        <div class="form-group">
            <label>Withdraw Day</label>
            <input type="number" min="0" step="1" max=31" class="form-control" name="field[withdraw_day]" ng-model="Data.fields.withdaw_day">
        </div>
        <div class="form-group">
            <switch-enabled data-ng-model="Data.fields.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                data-parent-modal="[[$View->modalID]]"
                data-datatable-refresh="#manage-clientbank-datatable"
                >Save changes</button>
        </div>
    </form>
[[/block]]