<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $post
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Einträge");
?>
<div class="panel panel-danger centred_box">
    <div class="panel-heading">
        <?= "\"" . $post["title"] . "\""; ?>
        <br/>
        <?= "von " . $post["author"] . " vom " . $post["created_at"]; ?>
    </div>
    <div class="panel-body">
        <?= $post["text"]; ?>
    </div>
    <div class="panel-footer">
        <a href="/beitraege" class="btn btn-default">zur&uuml;ck</a>
        <?php if (isset($_COOKIE["User"]) && ($post["author"] == $_COOKIE["User"])): ?>
                <a class="btn btn-default" href="/bearbeiten/<?= $post["id"]; ?>">bearbeiten</a>
                <a class="btn btn-default" href="/loeschen/<?= $post["id"]; ?>">l&ouml;schen</a>
            <?php endif ?>
    </div>
</div>