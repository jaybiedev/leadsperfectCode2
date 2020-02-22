[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-servicecharge-datatable" class="data-table table table-striped generic-data-table" style="width:100%">
        <thead>
            <tr>
                <th data-field="feetable_id" data-primaryKey="true" data-hidden="true">Id</th>
                <th data-field="afrom">From</th>
                <th data-field="ato">To</th>
                <th data-field="fee">Fee</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-servicecharge-datatable-includeDeleted" class="includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="loadRecord()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary" ng-click="restoreRecords()" data-datatable-refresh="#manage-servicecharge-datatable">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary"  ng-click="deleteRecords()" data-datatable-refresh="#manage-servicecharge-datatable">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" url="/finance/servicecharge/post"/>
        <div class="form-group">
            <input type="text" name="id" ng-model="Data.fields.feetable_id"  class="hidden"/>
            <label for="afrom">From</label>
            <input type="number" class="form-control" name="field[afrom]" id="afrom" required="" ng-model="numberify(Data.fields.afrom)" ng-model-options="{ getterSetter: true }">
            <div class="invalid-feedback">Please enter "from" amount</div>
        </div>
        <div class="form-group">
            <label for="department">To</label>
            <input type="number" class="form-control" name="field[ato]" id="ato" required="" ng-model="numberify(Data.fields.ato)" ng-model-options="{ getterSetter: true }">
            <div class="invalid-feedback">Please enter "to" amount</div>
        </div>
        <div class="form-group">
            <label for="department">Fee</label>
            <input type="number" class="form-control" name="fee" id="field[afrom]" required="" ng-model="numberify(Data.fields.fee)" ng-model-options="{ getterSetter: true }">
            <div class="invalid-feedback">Please enter fee amount</div>
        </div>
        <div class="form-group">
            <switch-enabled data-ng-model="Data.fields.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                data-parent-modal="[[$View->modalID]]"
                data-datatable-refresh="#manage-servicecharge-datatable"
                >Save changes</button>
        </div>
    </form>
[[/block]]