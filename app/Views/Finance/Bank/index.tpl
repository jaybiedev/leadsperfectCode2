[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-bank-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Branch</th>
                <th>Branch Access</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-bank-datatable-includeDeleted"> Show deleted records</label>
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
            <label for="department">Bank</label>
            <input type="text" class="form-control" name="bank" id="bank" required="" ng-model="Data.bank.bank">
            <div class="invalid-feedback">Please enter a bank name</div>
        </div>
        <div class="form-group">
            <label>Account Number</label>
            <input type="text" class="form-control" id="code" ng-model="Data.bank.bank_account">
        </div>
        <div class="form-group">
            <label>Branch</label>
            <input type="text" class="form-control" id="branch_id" ng-model="Data.bank.branch_id">
        </div>
        <div class="form-group">
            <label>Branch Access</label>
            <switch-enabled ng-model="Data.bank.braccess" />
        </div>
        <div class="form-group">
            <switch-enabled ng-model="Data.bank.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-bank" ng-click="saveBank()">Save changes</button>
        </div>
    </form>
[[/block]]