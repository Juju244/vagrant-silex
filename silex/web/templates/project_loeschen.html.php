<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $id
 * @var $ja
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Beitrag löschen");
?>
<?php if (!$ja): ?>
    <div class="panel panel-danger centred_box">
        <div class="panel-heading">
            Beitrag l&ouml;schen
        </div>
        <div class="panel-body">
            Wollen Sie diesen Eintrag wirklich unwiderruflich l&ouml;schen?<br/><br/>
            <a href="/loeschen/<?= $id ?>/ja" class="btn btn-success">Ja</a>
            <a href="/beitraege" type="submit" class="btn btn-danger">Nein</a>
        </div>
    </div>
<?php else: ?>
<div class="panel panel-success centred_box">
    <div class="panel-heading">
        Gel&ouml;scht
    </div>
    <div class="panel-body">
        <div class="form-group">
            Ihr Beitrag wurde gel&ouml;scht.
        </div>
        <a href="/beitraege" class="btn btn-default">Beitr&auml;ge</a>
    </div>
</div>
<?php endif ?>