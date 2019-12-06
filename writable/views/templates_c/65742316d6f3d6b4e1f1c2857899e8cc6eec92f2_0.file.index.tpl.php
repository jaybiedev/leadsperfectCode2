<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-05 22:18:19
  from '/opt/lampp/htdocs/firstproject/app/Views/Finance/Department/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de9d68b675f66_08759797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65742316d6f3d6b4e1f1c2857899e8cc6eec92f2' => 
    array (
      0 => '/opt/lampp/htdocs/firstproject/app/Views/Finance/Department/index.tpl',
      1 => 1575605888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de9d68b675f66_08759797 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15168571055de9d68b6757d3_03311719', "ContentBody");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Finance/template.tpl");
}
/* {block "ContentBody"} */
class Block_15168571055de9d68b6757d3_03311719 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_15168571055de9d68b6757d3_03311719',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Deprtment Content Goes Here
<?php
}
}
/* {/block "ContentBody"} */
}
