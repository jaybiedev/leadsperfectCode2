[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <form class="form-inline" action="" method="GET">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control datepicker" id="date" name="date" value="[[$date]]">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Go</button>
        <!-- <button id="btn-search-client" class="btn btn-outline"><i class="fa fa-search"></i> Search By Client</button> -->
        <button type="button" id="btn-new-entry" class="btn btn-outline"><i class="fa fa-plus"></i> Add New Entry</button>
    </form>

<table class="data-table table table-striped" id="payment-index-datatable">
    <thead>
    <tr> 
      <th width="5%"><strong>#</strong></th>
      <th width="12%"><strong>Encoded</strong></th>
      <th width="15%"><strong>Group</strong></th>
      <th width="20%"><strong>Collector</strong></th>
      <th width="7%" align="center"><strong>Status</strong></th>
      <th width="8%" align="center"><strong>Reference</strong></th>
      <th width="10%" align="center"><strong>Amount</strong></th>
      <th align="center"><strong>User</strong></th>
    </tr>
    </thead>
    <tbody>
    [[foreach from=$Query->getResult() item=row name=rows]]
        <tr>
        <td align="right" nowrap>[[$smarty.foreach.rows.iteration]]. </td>
        <td>[[$row->date|date_format:"%m/%d/%Y"]]</td>
        <td> 
            [[if ($row->account_group != '')]]
                <a href="payment/entry/[[$row->payment_header_id]]">[[$row->account_group]]</a>
            [[elseif ($row->entry_type == 'W')]]
                <a href="payment/entry/[[$row->payment_header_id]]">Passbook/ATM Withdrawal Entry</a>
            [[/if]]
        </td>
        <td>[[$row->name]]</td>
        <td>
            <a href="payment/entry/[[$row->payment_header_id]]">
                [[$row->status|record_status]]
            </a>
        </td>
        <td>[[$row->reference]]</td>
        <td align="right">[[$row->total_amount|number_format:2:".":","]]</td>
        <td>[[$row->adminname]]</td>
        </tr>
    [[/foreach]]
    </tbody>
  </table>    
[[/block]]