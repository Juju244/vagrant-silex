<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 */
$slots = $view['slots'];
$view->extend('project_layout.html.php');
$slots->set('title', "Gespeichert");
?>
<div class="panel panel-success centred_box">
    <div class="panel-heading">
        Gespeichert
    </div>
    <div class="panel-body">
        <div class="form-group">
            Die Daten wurden erfolgreich verarbeitet!
        </div>
        <a href="/beitraege" class="btn btn-primary">Beitr&auml;ge ansehen</a>
    </div>
</div>