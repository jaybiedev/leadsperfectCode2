[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optradio">By Date
        </label>  
        <div class="vertical-align">
            <label for="date_from">From</label>
            <input type="text" class="datepicker" id="date_from" />
        </div>
        <div class="vertical-align">
            <label for="date_to">To</label>
            <input type="text" class="datepicker" id="date_to" />
        </div>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio">By Control Number
    </label>
        <div class="vertical-align">
            <label for="control_from">From</label>
            <input type="text" class="form-control" id="control_from" />
        </div>
        <div class="vertical-align">
            <label for="control_to">To</label>
            <input type="text" class="form-control" id="control_to" />
        </div>  
    </div>
    <div>
        <label for="account_class_id">Classification</label>
        [[accountclassificationdropdown id="account_class_id" name="account_class_id" include_all=1]]
    </div>
    <div>
        <label for="account_class_id">Branch</label>
        [[branchdropdown id="branch_id" name="branch_id" include_all=1]]
    </div>
[[/block]]
[[block name="ReportBody"]]
    Body Here
[[/block]]