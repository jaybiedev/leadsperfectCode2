[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" value="date" name="filter[criteriaBy]" [[if $Report->Filter->criteriaBy == 'date']]checked="checked"[[/if]]/>By Date
        </label>  
        <div class="vertical-align">
            <label for="date_from">From</label>
            <input type="text" class="datepicker" name="filter[date_from]" value="[[$Report->Filter->date_from]]"/>
        </div>
        <div class="vertical-align">
            <label for="date_to">To</label>
            <input type="text" class="datepicker" name="filter[date_to]" value="[[$Report->Filter->date_to]]" />
        </div>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" value="byControlNumber" name="filter[criteriaBy]" [[if $Report->Filter->criteriaBy == 'byControlNumber']]checked="checked"[[/if]]/>By Control Number
    </label>
        <div class="vertical-align">
            <label for="control_from">From</label>
            <input type="text" class="form-control" name="filter[control_number_from]" value="[[$Report->Filter->control_number_from]]"/>
        </div>
        <div class="vertical-align">
            <label for="control_to">To</label>
            <input type="text" class="form-control" name="filter[control_number_to]"  value="[[$Report->Filter->control_number_to]]"/>
        </div>  
    </div>
    <div>
        <label for="account_class_id" class="lbl">Classification</label>
        [[accountclassificationdropdown id="account_class_id" name="filter[account_class_id]" selected="[[$Report->Filter->account_class_id]]" include_all=1]]
    </div>
    <div>
        <label for="branch_id" class="lbl" style="display:block;">Branch</label>
        [[branchdropdown id="branch_id" name="filter[branch_id]" include_all=1 selected="[[$Report->Filter->branch_id]]"]]
    </div>
[[/block]]
[[block name="ReportBody"]][[$Report->content]][[/block]]