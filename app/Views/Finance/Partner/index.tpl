[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-partner-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Partner</th>
            </tr>
        </thead>
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-partner-datatable-includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="load()">
            <i class="fa fa-plus"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form form-post-ajax-generic" role="form" autocomplete="off"  novalidate="" 
        method="POST" url="/finance/partner/post"/>
        <div class="form-group">
            <label for="department">Partner</label>
            <input type="text" name="partner_id" ng-model="Data.partner.partner_id"  class="hidden"/>
            <input type="text" class="form-control" name="field[partner]" id="partner" required="" ng-model="Data.partner.partner">
            <div class="invalid-feedback">Please enter partner</div>
        </div>
        <div class="form-group">
            <switch-enabled data-ng-model="Data.partner.enabled" name="enabled"/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-form-post-ajax-generic" 
                id="save-partner"
                data-parent-modal="[[$View->modalID]]"
                data-datatable-refresh="#manage-partner-datatable"
                >Save changes</button>
        </div>
    </form>
[[/block]]