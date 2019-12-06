<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-05 22:06:48
  from '/opt/lampp/htdocs/firstproject/app/Views/Common/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de9d3d81071d2_65755557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b4da2cf28f81043d603444675f95dceeb95c29f' => 
    array (
      0 => '/opt/lampp/htdocs/firstproject/app/Views/Common/content.tpl',
      1 => 1575605207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de9d3d81071d2_65755557 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18015003985de9d3d8105380_17989764', "ContentBody");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../Common/template.tpl");
}
/* {block "ContentBody"} */
class Block_18015003985de9d3d8105380_17989764 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_18015003985de9d3d8105380_17989764',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php
}
}
/* {/block "ContentBody"} */
}
