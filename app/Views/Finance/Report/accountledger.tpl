[[extends file="Finance/Report/report_template.tpl"]]
[[block name="ReportFilter"]]
    <div>
        <div class="vertical-align">
            <label for="account_id">Account</label>
            [[accountdropdown id="account_id" name="filter[account_id]" selected="[[$Report->Filter->account_id]]" placeholder="Search name, account or card"]]
        </div>    
        <div class="vertical-align">
            <label for="show_withdrawn">Show Withdrawn</label>
            [[yesnodropdown name="filter[show_withdrawn]" selected="[[$Report->Filter->show_withdrawn]]"]]
        </div>
        <div class="vertical-align">
            <label for="show_withdrawn">Loan Status</label>
            <select name="filter[show_loan_status]" class="bt-dropdown form-control">
                <option value="A" [[if $Report->Filter->show_loan_status == 'A']]SELECTED[[/if]]>Show all</option>
                <option value="B" [[if $Report->Filter->show_loan_status == 'B']]SELECTED[[/if]]>Balance</option>
                <option value="F" [[if $Report->Filter->show_loan_status == 'F']]SELECTED[[/if]]>First</option>
                <option value="P" [[if $Report->Filter->show_loan_status == 'P']]SELECTED[[/if]]>Paid</option>
            </select>
        </div>
    </div>
[[/block]]
[[block name="ReportBody"]][[$Report->content]][[/block]]