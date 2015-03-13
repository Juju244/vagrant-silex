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
<div class="panel panel-danger centred_box">
    <div class="panel-heading">
        Login
    </div>
    <?php if ($error == true) { ?>
        <div class="alert alert-danger">
            <div class="glyphicon glyphicon-warning-sign"></div>
            Bitte geben Sie Ihren Namen ein!
        </div>
    <?php } ?>
    <div class="panel-body">
        <form action="/login" method="post">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" id="name"
                       placeholder="Geben Sie Ihren Namen an">
            </div>
            <?php if ($error == false) { ?>
                <div class="modal hide fade">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        <h3>Modal header</h3>
                    </div>
                    <div class="modal-body">
                        <p>done</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn">Close</a>
                        <a href="#" class="btn btn-primary">Save changes</a>
                    </div>
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>