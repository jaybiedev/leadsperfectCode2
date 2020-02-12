[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <form id="frm-payment-entry">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="date" style="display:block;">Date</label>
                    <input type="text" class="form-control datepicker" id="date" placeholder="Date" value="[[$date]]">
                </div>
                <div class="form-group">
                    <label for="reference">Reference</label>
                    <input type="text" class="form-control" id="reference" placeholder="Reference">
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <label for="account_group_id">Account Group</label>
                    [[accountgroupdropdown name="account_group_id" selected="$account_group_id"]]
                </div>
                <div class="form-group">
                    <label for="collector_id">Collector</label>
                    <input type="text" class="form-control" id="collector_id" placeholder="Name">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="total_amount">Amount</label>
                    <input type="text" class="form-control" id="total_amount" placeholder="Total Amount">
                </div>
                <div class="form-group">
                    <br />
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]">
                        <i class="fa fa-plus"></i> Add New
                    </button>
                </div>
            </div>                        
        </div>
    </form>
    <table id="payment-entry-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>#</th>
                <th>Account</th>
                <th>Date</th>
                <th>Withdrawn</th>
                <th>Ammortization</th>
                <th>Excess</th>
                <th>Remarks</th>
            </tr>
        </thead>
    </table>
[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form" role="form" autocomplete="off"  novalidate="" method="POST" action="" />
        <div class="form-group">
            <label for="account_id">Account</label>
            [[accountgroupdropdown name="account_id"]]
            <div class="invalid-feedback">Please enter account</div>
        </div>
        <div class="form-group">
            <label for="ddate">Date</label>
            <input type="text" class="form-control datepicker" name="date" id="ddate" required="" ng-model="Data.payment_detail.ddate">
            <div class="invalid-feedback">Please enter date</div>
        </div>
        <div class="form-group">
            <label for="withdrawn">Withdrawn</label>
            <input type="text" class="form-control" name="withdrawn" id="withdrawn" required="" ng-model="Data.payment_detail.withdrawn">
            <div class="invalid-feedback">Please enter account</div>
        </div>                
        <div class="form-group">
            <label for="account_id">Amount</label>
            <input type="text" class="form-control" name="amount" id="amount" required="" ng-model="Data.payment_detail.amount">
            <div class="invalid-feedback">Please enter amount</div>
        </div>
        <div class="form-group">
            <label for="account_id">Excess</label>
            <input type="text" class="form-control" name="excess" id="excess" required="" ng-model="Data.payment_detail.excess">
        </div>
        <div class="form-group">
            <label for="account_id">Remarks</label>
            <input type="text" class="form-control" name="remarks" id="account_id" required="" ng-model="Data.payment_detail.remarks">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="save-payment-detail" ng-click="savePaymentDetail()">Save</button>
        </div>
    </form>
[[/block]]