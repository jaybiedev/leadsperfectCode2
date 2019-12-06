<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-05 06:59:22
  from '/opt/lampp/htdocs/firstproject/app/Views/Standards/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de8ff2a2d82a3_17581313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4239e8ff70caa2a674f85275b1b7a5d4a76efa6e' => 
    array (
      0 => '/opt/lampp/htdocs/firstproject/app/Views/Standards/index.tpl',
      1 => 1575550759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de8ff2a2d82a3_17581313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- required header wrapper -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9470732185de8ff2a2d7944_76843264', "ContentBody");
?>

<!-- end of included block tag --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../finance.tpl");
}
/* {block "ContentBody"} */
class Block_9470732185de8ff2a2d7944_76843264 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_9470732185de8ff2a2d7944_76843264',
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
