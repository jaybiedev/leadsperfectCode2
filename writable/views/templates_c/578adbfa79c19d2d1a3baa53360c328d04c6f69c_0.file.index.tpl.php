<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-05 06:58:29
  from '/opt/lampp/htdocs/firstproject/app/Views/Department/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de8fef59ea995_87445964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '578adbfa79c19d2d1a3baa53360c328d04c6f69c' => 
    array (
      0 => '/opt/lampp/htdocs/firstproject/app/Views/Department/index.tpl',
      1 => 1575549952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de8fef59ea995_87445964 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_905280285de8fef59e8970_15544093', "ContentBody");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../finance.tpl");
}
/* {block "ContentBody"} */
class Block_905280285de8fef59e8970_15544093 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_905280285de8fef59e8970_15544093',
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
