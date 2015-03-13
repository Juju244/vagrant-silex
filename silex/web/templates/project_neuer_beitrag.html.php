<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $error
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Neuer Beitrag");
?>
<?php if (!isset($_COOKIE["User"])): ?>
    <div class="centred_box">
    <div class="alert alert-danger">
        <div class="glyphicon glyphicon-warning-sign"></div>
        Bitte erst einloggen!<br/><br/>
        <a href="/login" class="btn btn-default">Login</a>
    </div>
    </div>
<?php else: ?>
    <div class="panel panel-danger centred_box">
        <div class="panel-heading">
            Neuer Beitrag
        </div>
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <div class="glyphicon glyphicon-warning-sign"></div>
                Bitte alle Felder ausfüllen!
            </div>
        <?php endif ?>
        <div class="panel-body">
            <form action="/neuer_beitrag" method="post">
                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" class="form-control" name="title" id="title"
                           placeholder="Geben Sie einen Titel an">
                </div>
                <textarea class="form-control" rows="5" name="text" id="text"
                          placeholder="Geben Sie Ihren Text ein"></textarea>
                <br/>
                <button type="submit" class="btn btn-default">Absenden</button>
            </form>
        </div>
    </div>
<?php endif ?>