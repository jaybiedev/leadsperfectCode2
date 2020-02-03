[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div>
        <div class="vertical-align">
            <label for="date_from">From</label>
            <input type="text" class="datepicker" name="filter[date_from]" value="[[$Report->Filter->date_from]]"/>
        </div>
        <div class="vertical-align">
            <label for="date_to">To</label>
            <input type="text" class="datepicker" name="filter[date_to]" value="[[$Report->Filter->date_to]]" />
        </div>
    </div>
    <div>
        <label for="account_class_id">Branch</label>
        [[branchdropdown id="branch_id" name="filter[branch_id]" include_all=1 selected="[[$Report->Filter->branch_id]]"]]
    </div>
[[/block]]
[[block name="ReportBody"]][[$Report->content]][[/block]]