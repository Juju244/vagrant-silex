<?php
/**
 * @var $app
 */
use Symfony\Component\HttpFoundation\Request;

$app->get("/uni", function () use ($app) {
    setcookie("Farbe", "uni", 0);
    return $app["templating"]->render(
        "project_uni.html.php",
        array()
    );
});

$app->get("/start", function () use ($app) {
    setcookie("Farbe", "bunt", 0);
    return $app["templating"]->render(
        "project_start.html.php",
        array()
    );
});

$app->match("/informationen", function () use ($app) {
    return $app["templating"]->render(
        "project_informationen.html.php",
        array("informationen" => "julia")
    );
});

$app->match("/informationen/{informationen}", function ($informationen) use ($app) {
    return $app["templating"]->render(
        "project_informationen.html.php",
        array("informationen" => $informationen)
    );
});

$app->match("/neuer_beitrag", function (Request $request) use ($app) {
    $error = false;
    if ($request->isMethod("post")) {
        $title = $request->get("title", "");
        $text = $request->get("text", "");
        $currentdate = date("Y-m-d");
        if (($title == "") or ($text == "")) {
            $error = true;
        } else {
            /** @var Doctrine\DBAL\Connection $dbConnection */
            $dbConnection = $app["db"];
            $dbConnection->insert(
                "blog_post",
                array(
                    "title" => $title,
                    "text" => $text,
                    "created_at" => $currentdate,
                    "author" => $_COOKIE["User"]
                )
            );
            return $app["templating"]->render(
                "project_neuer_beitrag_success.html.php"
            );
        }
    }
    return $app["templating"]->render(
        "project_neuer_beitrag.html.php",
        array("error" => $error)
    );
});

$app->match("/beitraege", function () use ($app) {
    $dbConnection = $app["db"];
    $posts = $dbConnection->fetchAll("SELECT * FROM blog_post");
    $error = false;
    $anzahl_zeilen = count($posts);
    if ($anzahl_zeilen == 0) {
        $error = true;
    }
    return $app["templating"]->render(
        "project_beitraege.html.php",
        array("posts" => $posts,
            "error" => $error,
            "anzahl_zeilen" => $anzahl_zeilen
        )
    );
});

$app->match("/article/{id}", function ($id) use ($app) {
    $dbConnection = $app["db"];
    $post = $dbConnection->fetchAssoc("SELECT * FROM blog_post WHERE id = $id");
    return $app["templating"]->render(
        "project_article.html.php",
        array("post" => $post)
    );
});

$app->match("/bearbeiten/{id}", function ($id, Request $request) use ($app) {
    $error = false;
    /* @var Doctrine\DBAL\Connection $dbConnection */
    $dbConnection = $app["db"];
    $post = $dbConnection->fetchAssoc("SELECT * FROM blog_post WHERE id = $id");
    $dbConnection->delete(
        "blog_post",
        array("id" => $id)
    );
    if ($request->isMethod("post")) {
        $title = $request->get("title", "");
        $text = $request->get("text", "");
        $currentdate = date("Y-m-d");
        if (($title == "") or ($text == "")) {
            $error = true;
        } else {
            $dbConnection->insert(
                "blog_post",
                array("title" => $title,
                    "text" => $text,
                    "created_at" => $currentdate,
                    "author" => $_COOKIE["User"]
                )
            );
            return $app["templating"]->render(
                "project_neuer_beitrag_success.html.php"
            );
        }
    }
    return $app["templating"]->render(
        "project_bearbeiten.html.php",
        array("error" => $error,
            "post" => $post,
            "id" => $id)
    );
});

$app->match("/loeschen/{id}", function ($id) use ($app) {
    $ja = false;
    return $app["templating"]->render(
        "project_loeschen.html.php",
        array("id" => $id,
            "ja" => $ja)
    );
});

$app->match("/loeschen/{id}/{ja}", function ($id, $ja) use ($app) {
    if ($ja = true) {
        /* @var Doctrine\DBAL\Connection $dbConnection */
        $dbConnection = $app["db"];
        $post = $dbConnection->fetchAssoc("SELECT * FROM blog_post WHERE id = $id");
        $dbConnection->delete(
            "blog_post",
            array("id" => $id)
        );
    };
    return $app["templating"]->render(
        "project_loeschen.html.php",
        array("ja" => $ja)
    );
});

$app->match("/login", function (Request $request) use ($app) {
    $error = false;
    if ($request->isMethod("post")) {
        $name = $request->get("name", "");
        if ($name == "") {
            $error = true;
        } else {
            setcookie("User", $name, 0);
            return $app["templating"]->render(
                "project_login_success.html.php"
            );
        }
    }
    return $app["templating"]->render(
        "project_login.html.php",
        array("error" => $error)
    );
});

$app->match("/logout", function () use ($app) {
    setcookie("User", "", time() - 3600);
    return $app["templating"]->render(
        "project_logout.html.php"
    );
});