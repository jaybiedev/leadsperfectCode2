<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-05 22:00:22
  from '/opt/lampp/htdocs/firstproject/app/Views/Common/default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de9d256eee720_44937171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae787d6353a1af3ee50e4dfa584208c1a1d9d7f9' => 
    array (
      0 => '/opt/lampp/htdocs/firstproject/app/Views/Common/default.tpl',
      1 => 1575604807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de9d256eee720_44937171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12895183165de9d256eecd27_34086716', "ContentBody");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "template.tpl");
}
/* {block "ContentBody"} */
class Block_12895183165de9d256eecd27_34086716 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_12895183165de9d256eecd27_34086716',
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
