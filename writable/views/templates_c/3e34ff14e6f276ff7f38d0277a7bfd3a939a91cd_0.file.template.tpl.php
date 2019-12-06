<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-06 14:02:01
  from '/opt/lampp/htdocs/jgm/app/Views/Common/template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5deab3b930a0c3_91218860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e34ff14e6f276ff7f38d0277a7bfd3a939a91cd' => 
    array (
      0 => '/opt/lampp/htdocs/jgm/app/Views/Common/template.tpl',
      1 => 1575662518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5deab3b930a0c3_91218860 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
	<title>JGM Finance Corporation</title>
	<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/libs/fontawesome/css/all.css" crossorigin="anonymous">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['header']->value['stylesheets'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
">
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/Finance/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/Finance/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/Finance/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/Finance/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/Finance/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/Finance/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/Finance/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/Finance/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/Finance/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/Finance/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/Finance/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/Finance/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/Finance/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="/assets/Finance/favicon.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/Finance/favicon.ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">    

    <?php echo '<script'; ?>
 src="/libs/jquery/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</head>
<body>
<div class="container">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3597100525deab3b9307f75_87324590', "ContentBody");
?>

</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footer']->value['javascripts'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
"><?php echo '</script'; ?>
>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</body>
</html><?php }
/* {block "ContentBody"} */
class Block_3597100525deab3b9307f75_87324590 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_3597100525deab3b9307f75_87324590',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Content Area<?php
}
}
/* {/block "ContentBody"} */
}
