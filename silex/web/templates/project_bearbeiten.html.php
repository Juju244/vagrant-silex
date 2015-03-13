<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $error
 * @var $post
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Beitrag bearbeiten");
?>
<div class="panel panel-danger centred_box">
    <div class="panel-heading">
        Beitrag bearbeiten
    </div>
    <?php if ($error): ?>
        <div class="alert alert-warning">
            <div class="glyphicon glyphicon-warning-sign"></div>
            Bitte alle Felder ausfüllen!
        </div>
    <?php endif ?>
    <div class="panel-body">
        <form action="/neuer_beitrag" method="post">
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" name="title" id="title"
                       value="<?= $post["title"] ?>">
            </div>
            <textarea class="form-control" rows="5" name="text" id="text"
                      placeholder="Geben Sie Ihren Text ein"><?= $post["text"] ?></textarea>
            <br/>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>