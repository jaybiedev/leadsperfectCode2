<!DOCTYPE html>
<html>
<head>
	<title>[[$View->pageTitle]]</title>
	<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/libs/fontawesome/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/libs/datatable/datatables.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Finance/style.css">
    <link rel="stylesheet" type="text/css" href="../css/Common/forms.css">
    [[foreach from=$header.stylesheets item=file]]
        <link rel="stylesheet" type="text/css" href="[[$file]]">
    [[/foreach]]
    
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
<body ng-app="FinanceApplication" ng-controller="[[$View->moduleID]]Ctrl" ng-cloak>
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
                [[foreach name=entry item=entry from=$menu]]
                    <li class="nav-item [[if $entry->children neq null]]dropdown[[/if]]">
                        <a href="[[$entry->slug]]" class="nav-link dropdown-toggle" [[if $entry->children neq null]]data-toggle="dropdown" aria-haspopup="true"[[/if]]  aria-expanded="false" id="[[$entry->path]]">[[$entry->menu]]</a>
                        [[if $entry->children neq null]]
                            [[include file="../Common/_recursive_ul.tpl" child=$entry->children parent=$entry depth=2]]
                        [[/if]]
                    </li>
                [[/foreach]]
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
        [[if $View->pageHeader != null]]
            <div class="page-title">[[$View->pageHeader]]</div>
        [[/if]]
        [[if $View->pageDescription != null]]
            <div class="page-description hidden">[[$View->pageDescription]]</div>
        [[/if]]
        [[block name="ContentBody"]]Content Area[[/block]]
    </main>

    [[if $View->modalID neq null]]
        <div id="[[$View->modalID]]" class="modal fade modal-form" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">[[$View->modalTitle]]</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        [[block name="ModalBody"]]Modal Body Area[[/block]]
                    </div>
                </div>
            </div>
        </div>
    [[/if]]

    <script src="/libs/jquery/js/jquery.min.js"></script>
    <script src="/libs/popper/js/popper.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="/libs/datatable/datatables.min.js"></script>
    <script src="/libs/angular/angular.min.js"></script>
    <script src="/libs/angular/angular-animate.min.js"></script>

    <script src="/libs/tools/Finance/js/angular.app.js"></script>
    <script src="/libs/tools/Finance/js/angular.controller.js"></script>
    <script src="/js/Common/angular.directives.js"></script>
    <script src="/libs/tools/Common/js/datatable.tools.js"></script>
    <script src="/js/Finance/nav.js"></script>

    [[foreach from=$footer.javascripts item=file]]
        <script src="[[$file]]"></script>
    [[/foreach]]
</body>
</html>