[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div>
        <div class="vertical-align">
            <label for="account_group_id">Account Group</label>
            [[accountgroupdropdown id="account_group_id" name="filter[account_group_id]" selected="[[$Report->Filter->account_group_id]]" placeholder="Search account group" include_all="1"]]
        </div>  
        <div>
            <label for="branch_id" class="lbl" style="display:block;">Branch</label>
            [[branchdropdown id="branch_id" name="filter[branch_id]" include_all=1 selected="[[$Report->Filter->branch_id]]"]]
        </div>          
        <div class="vertical-align">
            <label for="date_asof">As Of </label>
            <input type="text" class="datepicker" name="filter[date_asof]" value="[[$Report->Filter->date_asof]]"/>
        </div>
        <div class="vertical-align">
            <label for="months_delinquent">Months Deliquent </label>
            <input type="number" style="width:125px;" class="form-control" name="filter[months_delinquent]" value="[[$Report->Filter->months_delinquent]]"/>
        </div>        
    </div>
[[/block]]
[[block name="ReportBody"]][[$Report->content]][[/block]]