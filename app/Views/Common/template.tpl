<!DOCTYPE html>
<html>
<head>
	<title>JGM Finance Corporation</title>
	<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/libs/fontawesome/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/Common/style.css">
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

    <script src="/libs/jquery/js/jquery.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="/libs/tools/Common/js/Utils.js"></script>

</head>
<body>
<div class="container">
    [[block name="ContentBody"]]Content Area[[/block]]
</div>
[[foreach from=$footer.javascripts item=file]]
    <script src="[[$file]]"></script>
[[/foreach]]
</body>
</html>