[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div>
        <div>
            <label for="account_class_id">Account</label>
            [[accountdropdown id="account_id" name="filter[account_id]" selected="[[$Report->Filter->account_id]]"]]
        </div>    
        <div class="vertical-align">
            <label for="date_from">From</label>
            <input type="text" class="datepicker" name="filter[date_from]" value="[[$Report->Filter->date_from]]"/>
        </div>
        <div class="vertical-align">
            <label for="date_to">To</label>
            <input type="text" class="datepicker" name="filter[date_to]" value="[[$Report->Filter->date_to]]" />
        </div>
    </div>
[[/block]]
[[block name="ReportBody"]][[$Report->content]][[/block]]