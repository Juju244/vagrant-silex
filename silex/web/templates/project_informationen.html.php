<?php
/**
 * @var $view \Symfony\Component\Templating\PhpEngine
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $informationen
 */
$slots = $view["slots"];
$view->extend("project_layout.html.php");
$slots->set("title", "Informationen");
?>
<div id="hintergrund_informationen" class="centred_box_no_margin">
    <h1><b>Travellers Blog - <?php $slots->output("title") ?></b></h1>
    <ul class="nav nav-tabs">
        <li <?= $informationen == "julia" ? "class=\"active\"" : "" ?> role="presentation"><a
                href="/informationen/julia">Julia Haller</a></li>
        <li <?= $informationen == "tb" ? "class=\"active\"" : "" ?> role="presentation"><a href="/informationen/tb">Travellers
                Blog</a></li>
        <li <?= $informationen == "neuer_beitrag" ? "class=\"active\"" : "" ?> role="presentation"><a
                href="/informationen/neuer_beitrag">Neuer Beitrag</a></li>
        <li <?= $informationen == "beitraege" ? "class=\"active\"" : "" ?> role="presentation"><a
                href="/informationen/beitraege">Beitr&auml;ge</a></li>
        <li <?= $informationen == "login" ? "class=\"active\"" : "" ?> role="presentation"><a
                href="/informationen/login">Login</a></li>
    </ul>
    <?php if ($informationen == "tb") { ?>
        <div class="texte">
            Der &quot;Travellers Blog&quot; &ndash; kurz TB &ndash; soll eine M&ouml;glichkeit zum Teilen von
            Erfahrungen, Tr&auml;umen und W&uuml;nschen darstellen.<br/>Egal, ob draufg&auml;ngerische Skiausfl&uuml;ge,
            tolle Badeurlaube am Meer, Familienausfl&uuml;ge zum Baggersee oder in den Freizeitpark, ein sonniger Fr&uuml;hlingstag
            im Gr&uuml;nen, die absolut genialste Geburtstagsparty mit Freunden an der nahegelegenen Feuerstelle im
            Wald, eine Weltreise mit der besten Freundin/dem besten Freund bzw. Partnerin/Partner oder romatische Abende
            beim Candle Light Dinner im Sonnenuntergang &ndash; hier ist jegliche Art von Bericht/Erlebnis erw&uuml;nscht.<br/>Haben
            Sie etwas Tolles erlebt? Prima, erz&auml;hlen Sie davon!<br/>
            <?= (isset($_COOKIE["User"])) ? "<br/><a href=\"/neuer_beitrag\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-arrow-right\"></span> Neuer Beitrag</a>" : "Allerdings bevorzuge ich es, dass man Ihrem Erlebnis auch einen Namen zuordnen kann, daher m&ouml;chte ich Sie bitten, hier kurz Ihren (Vor-)Namen zu hinterlassen:<br/><br/><a href=\"/neuer_beitrag\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-arrow-right\"></span> Login</a>" ?>
        </div>

    <?php } elseif ($informationen == "neuer_beitrag") { ?>
        <div class="texte">Das hier ist Ihr Bereich: Hier k&ouml;nnen Sie Ihre Berichte/Beitr&auml;ge verfassen, welche
            dann unter &quot;<a href="/beitraege">Beitr&auml;ge</a>&quot; zu lesen sind. Wollen Sie Ihre Erfahrungen/Tr&auml;ume
            mit
            der Community teilen? Nur zu!<br/>
            <?= (isset($_COOKIE["User"])) ? "<br/><a href=\"/neuer_beitrag\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-arrow-right\"></span> Neuer Beitrag</a>" : "Aber loggen Sie sich davor bitte hier ein<br/><br/><a href=\"/neuer_beitrag\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-arrow-right\"></span> Login</a>" ?>
        </div>

    <?php } elseif ($informationen == "beitraege") { ?>
        <div class="texte">
            Hier finden Sie die bereits eingesendeten Beitr&auml;ge von anderen Nutzern.<br/>Auch wenn Sie sich nicht
            anmelden (wollen), k&ouml;nnen Sie die Beitr&auml;ge ansehen. Ihre eigenen Beitr&auml;ge, k&ouml;nnen Sie
            nach
            Herzenslust bearbeiten oder, wenn Sie es sich anders &uuml;berlegen sollten, k&ouml;nnen Sie ihn nat&uuml;rlich
            auch wieder l&ouml;schen &ndash; was wir aber alle sehr bedauern w&uuml;rden!<br/>Sehen Sie es sich doch
            einmal an<br/><br/>
            <a href="/beitraege" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-right"></span> Beitr&auml;ge</a>
        </div>

    <?php } elseif ($informationen == "login") { ?>
        <div class="texte">
            Login bedeutet hier
            keinesfalls<?php if (isset($_COOKIE["User"])): ?> &ndash; wie Sie sicherlich bemerkt haben &ndash;<?php endif ?>
            , dass Sie einen Account anlegen sollen. Es ist meines Erachtens einfach sch&ouml;ner, wenn man einen
            Namen vor Augen hat, der diesen Beitrag verfasst hat. Daher appelliere ich an Ihre Ehrlichkeit: bitte geben
            Sie keine Namen wie &quot;Anonym&quot; ein, der Bericht ist dann einfach nicht so glaubhaft (bzw. noch
            unpers&ouml;nlicher als es ohnehin via Blog schon ist).<br/>Los geht's!<br/><br/>
            <?php if (!isset($_COOKIE["User"])) : ?>
                <a href="/login" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-right"></span> Login</a>
            <?php endif ?>
        </div>

    <?php } else { ?>
        <div class="col-md-3">
            <img src="../img/julia.jpg" alt="Julia Haller">
        </div>
        <div class="col-md-8 texte">
            Hallo&nbsp;miteinander,<br/><br/>ich bin Julia Haller, Gr&uuml;nderin dieses &quot;Travellers Blogs&quot;. Ich m&ouml;chte
            Sie/Euch dazu ermuntern, Ihre/Eure Urlaubserfahrungen hier zu teilen.<br/>Hatten Sie einen absolut
            traumhaften
            Urlaub an der spanischen Riviera oder im kanadischen Pulverschnee? Erz&auml;hlen Sie anderen davon, die ein
            wenig tr&auml;umen m&ouml;chten oder selbst eine Reise planen, aber nicht wissen, wo's hingehen soll. Viel
            Spa&szlig; beim Schreiben und Lesen!<br/><br/>Ihre/Eure Julia
        </div>
    <?php } ?>
</div>