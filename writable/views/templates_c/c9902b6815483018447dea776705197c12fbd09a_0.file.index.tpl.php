<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-08 22:39:20
  from '/opt/lampp/htdocs/jgm/app/Views/Finance/Department/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5dedcff81206a7_87100791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9902b6815483018447dea776705197c12fbd09a' => 
    array (
      0 => '/opt/lampp/htdocs/jgm/app/Views/Finance/Department/index.tpl',
      1 => 1575866359,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dedcff81206a7_87100791 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9872281275dedcff811c088_91022775', "ContentBody");
?>


<!-- CRUD Modal -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5233526015dedcff8120067_61386348', "ModalBody");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Finance/template.tpl");
}
/* {block "ContentBody"} */
class Block_9872281275dedcff811c088_91022775 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_9872281275dedcff811c088_91022775',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_assignInScope('modalTitle', "Department");?>
    <table id="<?php echo $_smarty_tpl->tpl_vars['View']->value->pageTitle;?>
" class="dataTable table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Department</th>
                <th>Code</th>
            </tr>
        </thead>
        <!--
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        -->
    </table>

    <div class="datatable-action-control-wrapper">
        <div class="checkbox">
            <label><input type="checkbox" value=""> Show deleted records</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $_smarty_tpl->tpl_vars['modalTitle']->value;?>
">
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
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#<?php echo $_smarty_tpl->tpl_vars['modalTitle']->value;?>
">Add New</a>
            <a class="dropdown-item" href="#">Remove Selected</a>
            <a class="dropdown-item" href="#">Restore Selected</a>
        </div>
    </div>
    -->

<?php
}
}
/* {/block "ContentBody"} */
/* {block "ModalBody"} */
class Block_5233526015dedcff8120067_61386348 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ModalBody' => 
  array (
    0 => 'Block_5233526015dedcff8120067_61386348',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- form entry -->
    <form class="form" role="form" autocomplete="off"  novalidate="" method="POST" action="/    >
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" name="department" id="department" required="">
            <div class="invalid-feedback">Please enter a department name</div>
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
<?php
}
}
/* {/block "ModalBody"} */
}
