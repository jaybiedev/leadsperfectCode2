[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div>
        <div class="vertical-align">
            <label for="account_id">Account</label>
            [[accountgroupdropdown id="account_id" name="filter[account_group_id]" selected="[[$Report->Filter->account_group_id]]" include_all="true" placeholder="Search account group"]]
        </div>    
        <div class="vertical-align">
            <label for="date_to">As of</label>
            <input type="text" class="datepicker" name="filter[date_to]" value="[[$Report->Filter->date_to]]" />
        </div>
        <div class="vertical-align">
            <label for="date_to">Recalculate</label>
            [[yesnodropdown name="filter[recalculate]" selected="[[$Report->Filter->recalculate]]"]]
        </div>        
    </div>
[[/block]]
[[block name="ReportBody"]][[$Report->content]][[/block]]