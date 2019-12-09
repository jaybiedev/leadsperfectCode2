<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-07 11:07:52
  from '/opt/lampp/htdocs/jgm/app/Views/Common/Standards/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5debdc685521b3_56342594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b3e42ed5a8d7d91c02fa3d1247e1da9711dc1b3' => 
    array (
      0 => '/opt/lampp/htdocs/jgm/app/Views/Common/Standards/index.tpl',
      1 => 1575606546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5debdc685521b3_56342594 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- required header wrapper -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8435861845debdc6854f8d0_34512016', "ContentBody");
?>

<!-- end of included block tag --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../../Common/template.tpl");
}
/* {block "ContentBody"} */
class Block_8435861845debdc6854f8d0_34512016 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_8435861845debdc6854f8d0_34512016',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- end of header -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-5">UI Standards</h2>
            <ul class="nav nav-fill">
                <a class="nav-item" href="standards/forms">Forms</a>
                <a class="nav-item" href="#colors">Colors</a>
                <a class="nav-item" href="#smarty">Smarty</a>
            </ul>
        </div>
    </div>
</div>
        
<!-- include close block tag -->
<?php
}
}
/* {/block "ContentBody"} */
}
