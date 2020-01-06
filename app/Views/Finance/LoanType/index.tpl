[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-loan_type-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Loan Type</th>
                <th>Rate</th>
                <th>Computed</th>
                <th>Interest</th>
                <th>EIR</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-loan_type-datatable-includeDeleted"> Show deleted records</label>
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
            <label for="loan_type">Loan Type</label>
            <input type="text" class="form-control" name="loan_type" id="loan_type" required="" ng-model="Data.loan_type.loan_type">
            <div class="invalid-feedback">Please enter loan type</div>
        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" id="code" ng-model="Data.loan_type.loan_type_code">
        </div>
        <div class="form-group">
            <label>Rate</label>
            <input type="number" class="form-control" id="loan_rate" ng-model="Data.loan_type.loan_rate">
        </div>
        <div class="form-group">
            <label>Computation Basis</label>
            <input type="text" class="form-control" id="basis" ng-model="Data.loan_type.basis">
        </div>
        <div class="form-group">
            <label>Interest</label>
            <input type="text" class="form-control" id="loan_interest" ng-model="Data.loan_type.loan_interest">
        </div>
        <div class="form-group">
            <label>EIR</label>
            <input type="number" class="form-control" id="eir" ng-model="Data.loan_type.eir">
        </div>        
        <div class="form-group">
            <switch-enabled ng-model="Data.loan_type.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-loan_type" ng-click="saveLoanType()">Save changes</button>
        </div>
    </form>
[[/block]]