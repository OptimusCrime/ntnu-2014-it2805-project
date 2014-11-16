<!DOCTYPE html>
<html>
<head>
    <title>ITK-Frisør[[+if isset($TITLE)]] :: [[+$TITLE]][[+/if]]</title>
    <base href="[[+$URL]]" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,800" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,600,800" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCllJyO8J0APYYx5E8GeQyamUFsZyrwZ_A"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <header id="logo-wrapper">
            <div id="logo">
                <a href=""><img src="assets/images/logo.png" alt="IKT-frisør" /></a>
            </div>
        </header>
        <nav id="menu">
            <ul class="menu">
                <li[[+if $TOP_LEVEL_MENU == "index"]] class="selected"[[+/if]]>
                    <a href="">Forsiden</a>
                </li>
                <li[[+if $TOP_LEVEL_MENU == "priser"]] class="selected"[[+/if]]>
                    <a href="priser">Priser</a>
                </li>
                <li[[+if $TOP_LEVEL_MENU == "om-oss"]] class="selected"[[+/if]]>
                    <a href="om-oss">Om oss</a>
                </li>
                <li[[+if $TOP_LEVEL_MENU == "produkter"]] class="selected"[[+/if]]>
                    <a href="produkter">Produkter</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="produkter/hairgel">Hårgelé</a>
                        </li>
                        <li>
                            <a href="produkter/shower-pack">Balsam &amp; Shampoo &ndash; pakke</a>
                        </li>
                        <li>
                            <a href="produkter/barberkit">Barberkit</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="mailto:post@ikt-frisor.no">Kontakt oss</a>
                </li>
                <li[[+if $TOP_LEVEL_MENU == "diys"]] class="selected"[[+/if]]>
                    <a href="diys">DIYS</a>
                </li>  
                <li class="order[[+if $TOP_LEVEL_MENU == 'bestilling']] selected[[+/if]]">
                    <a href="bestilling">Bestilling</a>
                </li>          
            </ul>
        </nav>
        <div class="clear"></div>
    </div>
    <div id="container">
