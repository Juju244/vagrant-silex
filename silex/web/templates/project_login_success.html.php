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
        Logged in
    </div>
    <div class="panel-body">
        Los gehts! Legen Sie einen neuen Eintrag an oder sehen Sie sich bestehende an!<br/><br/>
        <a href="/neuer_beitrag" type="submit" class="btn btn-primary">Neuer Beitrag</a>
        <a href="/beitraege" type="submit" class="btn btn-primary">Beitr&auml;ge ansehen</a>
    </div>
</div>