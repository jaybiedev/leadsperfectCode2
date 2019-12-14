<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-13 18:08:48
  from '/opt/lampp/htdocs/jgm/app/Views/Finance/template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5df42810ae1904_64742882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dbbcb074ab7b3f86b491012d5021e0a9e6e6093' => 
    array (
      0 => '/opt/lampp/htdocs/jgm/app/Views/Finance/template.tpl',
      1 => 1576282127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Common/_recursive_ul.tpl' => 1,
  ),
),false)) {
function content_5df42810ae1904_64742882 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['View']->value->pageTitle;?>
</title>
	<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/libs/fontawesome/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/libs/datatable/datatables.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Finance/style.css">
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
</head>
<body ng-app="FinanceApplication" ng-controller="FinanceCtrl as ctrl" ng-cloak>
    <div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
        <a class="navbar-brand" href="#">
            <div class="logo wrapper">
                <img src="/assets/Finance/logo.png" class="fit-image" />
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'entry', false, NULL, 'entry', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
                    <li class="nav-item <?php if ($_smarty_tpl->tpl_vars['entry']->value->children != null) {?>dropdown<?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->slug;?>
" class="nav-link dropdown-toggle" <?php if ($_smarty_tpl->tpl_vars['entry']->value->children != null) {?>data-toggle="dropdown" aria-haspopup="true"<?php }?>  aria-expanded="false" id="<?php echo $_smarty_tpl->tpl_vars['entry']->value->path;?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->menu;?>
</a>
                        <?php if ($_smarty_tpl->tpl_vars['entry']->value->children != null) {?>
                            <?php $_smarty_tpl->_subTemplateRender("file:../Common/_recursive_ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('child'=>$_smarty_tpl->tpl_vars['entry']->value->children,'parent'=>$_smarty_tpl->tpl_vars['entry']->value,'depth'=>2), 0, true);
?>
                        <?php }?>
                    </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<!--
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://fontenele.github.io/bootstrap-navbar-dropdowns/" target="_blank">Github</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown1">
                        <li class="dropdown-item" href="#"><a>Action 1</a></li>
                        <li class="dropdown-item dropdown">
                            <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1.1</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                                <li class="dropdown-item" href="#"><a>Action 1.1</a></li>
                                <li class="dropdown-item dropdown">
                                    <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1.1.1</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">
                                        <li class="dropdown-item" href="#"><a>Action 1.1.1</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown2">
                        <li class="dropdown-item" href="#"><a>Action 2 A</a></li>
                        <li class="dropdown-item" href="#"><a>Action 2 B</a></li>
                        <li class="dropdown-item" href="#"><a>Action 2 C</a></li>
                        <li class="dropdown-item dropdown">
                            <a class="dropdown-toggle" id="dropdown2-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2.1</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown2-1">
                                <li class="dropdown-item" href="#"><a>Action 2.1 A</a></li>
                                <li class="dropdown-item" href="#"><a>Action 2.1 B</a></li>
                                <li class="dropdown-item" href="#"><a>Action 2.1 C</a></li>
                                <li class="dropdown-item dropdown">
                                    <a class="dropdown-toggle" id="dropdown2-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2.1.1</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown2-1-1">
                                        <li class="dropdown-item" href="#"><a>Action 2.1.1 A</a></li>
                                        <li class="dropdown-item" href="#"><a>Action 2.1.1 B</a></li>
                                        <li class="dropdown-item" href="#"><a>Action 2.1.1 C</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-item dropdown">
                                    <a class="dropdown-toggle" id="dropdown2-1-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2.1.2</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown2-1-2">
                                        <li class="dropdown-item" href="#"><a>Action 2.1.2 A</a></li>
                                        <li class="dropdown-item" href="#"><a>Action 2.1.2 B</a></li>
                                        <li class="dropdown-item" href="#"><a>Action 2.1.2 C</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
-->                
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </div>
    </div>

    <main role="main" class="container">
        <?php if ($_smarty_tpl->tpl_vars['View']->value->pageHeader != null) {?>
            <div class="page-title"><?php echo $_smarty_tpl->tpl_vars['View']->value->pageHeader;?>
</div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['View']->value->pageDescription != null) {?>
            <div class="page-description hidden"><?php echo $_smarty_tpl->tpl_vars['View']->value->pageDescription;?>
</div>
        <?php }?>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14103596025df42810ade8e1_85255454', "ContentBody");
?>

    </main>

    <?php if ($_smarty_tpl->tpl_vars['View']->value->modalTitle != null) {?>
        <div id="<?php echo $_smarty_tpl->tpl_vars['View']->value->modalTitle;?>
" class="modal fade modal-form" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['View']->value->modalTitle;?>
</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10152192375df42810ae0452_56024414', "ModalBody");
?>

                    </div>
                </div>
            </div>
        </div>
    <?php }?>

    <?php echo '<script'; ?>
 src="/libs/jquery/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/popper/js/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/datatable/datatables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/angular/angular.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/angular/angular-animate.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="/libs/tools/Finance/js/angular.app.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/tools/Finance/js/angular.controller.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/Finance/nav.js"><?php echo '</script'; ?>
>

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
class Block_14103596025df42810ade8e1_85255454 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_14103596025df42810ade8e1_85255454',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Content Area<?php
}
}
/* {/block "ContentBody"} */
/* {block "ModalBody"} */
class Block_10152192375df42810ae0452_56024414 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ModalBody' => 
  array (
    0 => 'Block_10152192375df42810ae0452_56024414',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Modal Body Area<?php
}
}
/* {/block "ModalBody"} */
}
