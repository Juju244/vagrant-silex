<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 *
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Home");
?>

<div id="start_ueberschrift_box">
    <div id="bunt">
        <h1><b>Travellers Blog - <?php $slots->output("title") ?></b></h1>

        <h3>Wollen Sie etwas &uuml;ber Ihren Urlaub erz&auml;hlen?<br/>
            Hier haben Sie die Chance dazu - <?php if (!isset($_COOKIE["User"])): ?>einloggen und <?php endif ?>los
            geht's!</h3><br/><?php if (!isset($_COOKIE["User"])): ?>
            <a href="/login" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-arrow-right"></span>
                Login</a><?php endif ?>
        <p class="text-right">St&ouml;rt Sie die bunte Farbe? Dann klicken Sie <a href="/uni"
                                                                                  class="btn btn-link">hier</a>.</p>
    </div>
</div>