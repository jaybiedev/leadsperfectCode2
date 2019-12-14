[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
      <table id="manage-branch-datatable" class="data-table table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Branch</th>
                <th>Code</th>
                <th>Address</th>
            </tr>
        </thead>
        <!--
        <thead>
            <tr>
                <th>Branch</th>
                <th>Code</th>
                <th>Address</th>
            </tr>
        </thead>
        -->
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value="" id="manage-branch-datatable-includeDeleted"> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#[[$View->modalTitle]]">
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
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#[[$View->modalTitle]]">Add New</a>
            <a class="dropdown-item" href="#">Remove Selected</a>
            <a class="dropdown-item" href="#">Restore Selected</a>
        </div>
    </div>
    -->

[[/block]]

<!-- CRUD Modal -->
[[block name="ModalBody"]]
    <!-- form entry -->
    <form class="form" role="form" autocomplete="off"  novalidate="" method="POST" action="/    >
        <div class="form-group">
            <label for="department">Branch</label>
            <input type="text" class="form-control" name="department" id="Branch" required="">
            <div class="invalid-feedback">Please enter a branch name</div>
        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" id="code">
        </div>
        <div class="form-group">
            <label>Enabled</label>
            <div>
                <select class="form-control" name="enabled">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-department">Save changes</button>
            <input type="submit" />
        </div>
    </form>
[[/block]]