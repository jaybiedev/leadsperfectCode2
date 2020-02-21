[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-loan_type-datatable" class="data-table table table-striped  generic-data-table" style="width:100%">
        <thead>
            <tr>
                <th data-field="loan_type_id" data-primaryKey="true" data-hidden="true">Id</th>
                <th data-field="loan_type">Loan Type</th>
                <th data-field="loan_rate">Rate</th>
                <th data-field="basis" render="LoanType.renderBasis(data, row)">Computed</th>
                <th data-field="loan_interest" render="LoanType.renderInterest(data, row)">Interest</th>
                <th data-field="eir">EIR</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-loan_type-datatable-includeDeleted" class="includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="loadRecord()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary" ng-click="restoreRecords()" data-datatable-refresh="#manage-loan_type-datatable">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary" ng-click="restoreRecords()" data-datatable-refresh="#manage-loan_type-datatable">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>
[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" url="/finance/loantype/post"/>
        <div class="form-group">
            <input type="text" name="id" ng-model="Data.fields.loan_type_id"  class="hidden"/>
            <label for="loan_type">Loan Type</label>
            <input type="text" class="form-control" name="field[loan_type]" id="loan_type" required="" ng-model="Data.fields.loan_type">
            <div class="invalid-feedback">Please enter loan type</div>
        </div>
        <div class="form-group">
            <label>Rate</label>
            <input type="text" class="form-control" name="field[loan_rate]" ng-model="Data.fields.loan_rate">
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label style="display:block;">Computation Basis</label>
                    [[loantypebasisdropdown name="field[basis]" style="width:100%;" ng-model="Data.fields.basis"]]
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label style="display:block;">Interest</label>
                    [[loantypeinterestdropdown name="field[loan_interest]" style="width:100%;" ng-model="Data.fields.loan_interest"]]
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>EIR</label>
            <input type="text" class="form-control" name="field[eir]" ng-model="Data.fields.eir">
        </div>        
        <div class="form-group">
            <switch-enabled data-ng-model="Data.fields.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                data-parent-modal="[[$View->modalID]]"
                data-datatable-refresh="#manage-loan_type-datatable"
                >Save changes</button>
        </div>
    </form>
[[/block]]