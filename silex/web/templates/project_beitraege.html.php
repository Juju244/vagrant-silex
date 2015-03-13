<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $posts
 * @var $error
 * @var $anzahl_zeilen
 * @var $id
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Beitr&auml;ge");
?>
<div class="panel panel-danger centred_box_no_margin">
    <div class="panel-heading">
        &Uuml;bersicht
    </div>
    <?php if ($error == true) { ?>
        <div class="panel-body">
            <div class="alert alert-danger">
                <div class="glyphicon glyphicon-warning-sign"></div>
                Bisher wurden keine Beitr&auml;ge eingesendet!
            </div>
        </div>
    <?php } else { ?>
    <ul class="list-group">
        <?php for ($i = 0;
                   $i < $anzahl_zeilen;
                   $i++) { ?>
            <li class="list-group-item" <?= ($_COOKIE["Farbe"] == "uni") ? "id=\"rahmen\"" : "" ?>>
                <?= ($_COOKIE["Farbe"] == "bunt") ? "<div id=\"hintergrund_uebersicht\">" : "" ?>
                <b>
                    <?= $posts[$i]["title"]; ?>
                </b>
                <?= "vom " . $posts[$i]["created_at"] . " von " . $posts[$i]["author"]; ?>
                <br/>
                <?php $words = explode(" ", $posts[$i]["text"]);
                $anzahl_worte = count($words);
                $ausgabe = NULL;
                if ($anzahl_worte > 10) {
                    for ($j = 0; $j < 10; $j++) {
                        $zwischen = $words[$j];
                        $ausgabe .= " " . $zwischen;
                    } ?>
                    <?= "&quot;$ausgabe... &quot;" ?>
                    <a href="/article/<?= $posts[$i]["id"]; ?>">weiterlesen</a>
                <?php } else { ?>
                    "
                    <?= $posts[$i]["text"];?>
                    "
                <?php }
                if (isset($_COOKIE["User"])) {
                    if ($posts[$i]["author"] == $_COOKIE["User"]) { ?>
                        <p class="text-right"><a href="/bearbeiten/<?= $posts[$i]["id"]; ?>">bearbeiten</a></p>
                        <p class="text-right"><a href="/loeschen/<?= $posts[$i]["id"]; ?>">l&ouml;schen</a></p>
                    <?php }
                } ?>
                <?= ($_COOKIE["Farbe"] == "bunt") ? "</div>" : "" ?>
            </li>
        <?php } ?>
        <?php } ?>
    </ul>
</div>