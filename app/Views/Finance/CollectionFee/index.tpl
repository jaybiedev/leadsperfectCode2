[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-collectionfee-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>From</th>
                <th>To</th>
                <th>Fee</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-collectionfee-datatable-includeDeleted"> Show deleted records</label>
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
            <label for="department">From</label>
            <input type="number" class="form-control" name="afrom" id="afrom" required="" ng-model="Data.collectionfee.afrom">
            <div class="invalid-feedback">Please enter "from" amount</div>
        </div>
        <div class="form-group">
            <label for="department">To</label>
            <input type="number" class="form-control" name="ato" id="ato" required="" ng-model="Data.collectionfee.ato">
            <div class="invalid-feedback">Please enter "to" amount</div>
        </div>
        <div class="form-group">
            <label for="department">Fee</label>
            <input type="number" class="form-control" name="fee" id="afrom" required="" ng-model="Data.collectionfee.fee">
            <div class="invalid-feedback">Please enter fee amount</div>
        </div>
        <div class="form-group">
            <switch-enabled ng-model="Data.collectionfee.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-collectionfee" ng-click="savefeetable()">Save changes</button>
        </div>
    </form>
[[/block]]