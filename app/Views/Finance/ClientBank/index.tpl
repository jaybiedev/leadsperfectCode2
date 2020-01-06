[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-clientbank-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Client Bank</th>
                <th>Code</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Withdraw Day</th>
            </tr>
        </thead>
        <!--
        <thead>
            <tr>
                <th>clientbank</th>
                <th>Code</th>
                <th>Address</th>
            </tr>
        </thead>
        -->
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-clientbank-datatable-includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalID]]" ng-click="load()">
            <i class="fa fa-home"></i> Add New
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="fa fa-trash-restore-alt"></i> Restore Selected
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="fa fa-trash-alt"></i> Delete Selected
        </button>
    </div>

    <!--
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#[[$View->modalID]]">Add New</a>
            <a class="dropdown-item" href="#">Remove Selected</a>
            <a class="dropdown-item" href="#">Restore Selected</a>
        </div>
    </div>
    -->

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form" role="form" autocomplete="off"  novalidate="" method="POST" action="" />
        <div class="form-group">
            <label for="department">Client Bank</label>
            <input type="text" class="form-control" name="clientbank" id="clientbank" required="" ng-model="Data.clientbank.clientbank">
            <div class="invalid-feedback">Please enter a client bank name</div>
        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" id="code" ng-model="Data.clientbank.clientbank_code">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" id="clientbank_address" ng-model="Data.clientbank.clientbank_address">
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" id="telno" ng-model="Data.clientbank.telno">
        </div>
        <div class="form-group">
            <label>Withdraw Day</label>
            <input type="number" min="0" step="1" max=31" class="form-control" id="clientbank_address" ng-model="Data.clientbank.withdaw_day">
        </div>
        <div class="form-group">
            <switch-enabled ng-model="Data.clientbank.enabled" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-clientbank" ng-click="saveclientbank()">Save changes</button>
        </div>
    </form>
[[/block]]