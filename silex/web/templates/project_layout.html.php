<?php
/**
 * @var $view
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 */
$slots = $view["slots"];
$title = $slots->get("title");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/stylesheet_layout.css" type="text/css"/>
    <base href="http://localhost:8001/">
    <title>Blog | <?php $slots->output("title"); ?></title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= ($_COOKIE["Farbe"] == "bunt") ? "/start" : "/uni" ?>">
            <img src="../img/nav-brand.jpg" alt="Travellers Blog - Home">
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li <?= $title == "Informationen" ? "class=\"active\"" : "" ?> >
                <a href="/informationen"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                    Informationen</a></li>
            <li <?= $title == "Neuer Beitrag" ? "class=\"active\"" : "" ?> >
                <a href="/neuer_beitrag"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Neuer
                    Beitrag</a>
            </li>
            <li <?= $title == "Beitr&auml;ge" ? "class=\"active\"" : "" ?> >
                <a href="/beitraege"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Beitr&auml;ge</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($_COOKIE["User"])): ?>
                <li <?= $title == "Login" ? "class=\"active\"" : "" ?> >
                    <a href="/login"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</a>
                </li>
            <?php else: ?>
                <li><a href="/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div id="hintergrund">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <?php
            $slots->output("_content");
            ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<footer class="navbar-fixed-bottom">
    <div id="hintergrund_footer">
        <div id="footer_links">
            <span class="glyphicon glyphicon-copyright-mark"></span> 2015 by Julia Haller
        </div>
        <div id="footer_rechts">
        <?php if ($title != "Home"): ?>
                <?php if ($_COOKIE == "bunt"): ?>
                    Wollen Sie keine knallig-bunten Farbkombinationen im Design? Das k&ouml;nnen Sie auf der <a
                        href="/uni">Startseite</a> &auml;ndern.
                <?php else: ?>
                    Wollen Sie lieber knallig-bunten Farbkombinationen im Design? Das k&ouml;nnen Sie auf der <a
                        href="/start">Startseite</a> &auml;ndern.
                <?php endif ?>
        <?php else: ?>
            <?= date("D, d M Y, H:i:s") ?>
            GMT
        <?php endif ?>
        </div>
    </div>
</footer>
</body>
</html>