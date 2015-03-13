<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $error
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Login");
?>
<div class="panel panel-success centred_box">
    <div class="panel-heading">
        Logged out
    </div>
    <div class="panel-body">
        Auf Wiedersehen, bis zum n&auml;chsten Mal!<br/><br/>
        <a href="/login" type="submit" class="btn btn-primary">Erneut anmelden</a>
    </div>
</div>