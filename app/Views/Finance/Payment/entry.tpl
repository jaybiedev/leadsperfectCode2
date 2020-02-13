[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <form id="frm-payment-entry" class="key-enter-to-tab form-post-ajax-generic" url="/finance/payment/entry">
        <div class="row">
            <div class="col col-3">
                <div class="form-group">
                    <label for="date" style="display:block;">Date</label>
                    <input type="hidden" value="[[$PaymentHeader->payment_header_id]]" name="header[payment_header_id]" id="payment_header_id" />
                    <input type="text" class="form-control datepicker" name="header[date]" id="date" placeholder="Date" value="[[$PaymentHeader->date|date_format:'m/d/Y']]">
                </div>
                <div class="form-group">
                    <label for="reference">Reference</label>
                    <input type="text" class="form-control" name="header[reference]" id="reference" placeholder="Reference" value="[[$PaymentHeader->reference]]">
                </div>
            </div>
            <div class="col col-5">
                <div class="form-group">
                    <label for="account_group_id">Account Group</label>
                    [[accountgroupdropdown name="header[account_group_id]" selected=$PaymentHeader->account_group_id]]
                </div>
                <div class="form-group">
                    <label for="collector_id">Collector</label>
                    <input type="text" class="form-control" name="header[name]" id="collector_id" placeholder="Name" value="[[$PaymentHeader->name]]">
                </div>
            </div>
            <div class="col col-2">
                <div class="form-group">
                    <label for="total_amount">Amount</label>
                    <input type="text" class="form-control format-number" name="header[total_amount]" id="total_amount" placeholder="Total Amount" value="[[$PaymentHeader->total_amount|number_format:"2":".":","]]">
                </div>
                <div class="form-group">
                    <!--
                    <br />
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]">
                        <i class="fa fa-plus"></i> Add New
                    </button>
                    -->
                </div>
            </div> 
            <div class="col col-2">&nbsp;</div>                       
        </div>
        <h6 class="lined"><span>PAYMENT DETAILS ENTRY</span></h6>
        <div class="row" id="payment-detail-entry">
            <div class="col-4 col">
                <div class="form-group">
                    <label for="account_id">Account</label>
                    <input type="hidden" value="" name="detail[payment_detail_id]" />
                    [[accountdropdown name="detail[account_id]" placeholder="Search account on this group"]]
                    <div class="invalid-feedback">Please enter account</div>
                </div>            
            </div>
            <div class="col col-1_5">
                <div class="form-group">
                    <label for="ddate">Date</label>
                    <input type="text" class="form-control datepicker-no-icon" name="detail[ddate]" id="ddate" required="" ng-model="Data.payment_detail.ddate">
                    <div class="invalid-feedback">Please enter date</div>
                </div>            
            </div>
            <div class="col col-1_5">
                <div class="form-group">
                    <label for="withdrawn">Withdrawn</label>
                    <input type="text" class="form-control format-number" name="detail[withdrawn]" id="withdrawn" required="" ng-model="Data.payment_detail.withdrawn">
                    <div class="invalid-feedback">Please enter account</div>
                </div>             
            </div>
            <div class="col col-1_5">
                <div class="form-group">
                    <label for="account_id">Distribution</label>
                    <select class="form-control" name="detail[amountdistribution]">
                        <option value="0">Auto</option>
                        <option value="1">Full Ammortization</option>
                        <option value="2">Full Excess</option>
                    </select>
                </div>            
            </div>
            <div class="col col-3">
                <div class="form-group">
                    <label for="account_id">Remarks</label>
                    <input type="text" class="form-control" name="detail[remarks]" id="remarks" required="" maxlength="500" ng-model="Data.payment_detail.remarks">
                </div>            
            </div>
            <div class="col col-1">
                <div class="form-group">
                    <br />
                    <button type="button" class="btn btn-primary btn-form-post-ajax-generic" callback="alert('x')" id="save-payment-detail">Ok</button>
                </div>
            </div>
        </div>
    </form>
    <table id="payment-entry-datatable" class="data-table table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Account</th>
                <th>Date</th>
                <th>Withdrawn</th>
                <th>Applied</th>
                <th>Excess</th>
                <th>Remarks</th>
            </tr>
        </thead>
    </table>
[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <!--
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
            <label for="account_id">Ammortization</label>
            <input type="text" class="form-control" name="ammort" id="amount" required="" ng-model="Data.payment_detail.amount">
            <div class="invalid-feedback">Please enter ammortization</div>
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

    -->
[[/block]]