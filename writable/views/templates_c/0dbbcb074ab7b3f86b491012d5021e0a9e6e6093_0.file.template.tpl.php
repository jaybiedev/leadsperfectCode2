<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-06 13:07:17
  from '/opt/lampp/htdocs/jgm/app/Views/Finance/template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5deaa6e5338f17_85082783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dbbcb074ab7b3f86b491012d5021e0a9e6e6093' => 
    array (
      0 => '/opt/lampp/htdocs/jgm/app/Views/Finance/template.tpl',
      1 => 1575659172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5deaa6e5338f17_85082783 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="/libs/fontawesome/css/all.css" crossorigin="anonymous">

	<!--Custom styles-->
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
<body>

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
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9846120195deaa6e53378d3_40012594', "ContentBody");
?>

    </main>

    <?php echo '<script'; ?>
 src="/libs/jquery/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
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
class Block_9846120195deaa6e53378d3_40012594 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ContentBody' => 
  array (
    0 => 'Block_9846120195deaa6e53378d3_40012594',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Content Area<?php
}
}
/* {/block "ContentBody"} */
}
