<?php

namespace IRFANM\PHP\EREPORT\App;

class View
{
    public static function view(string $view, $model = null)
    {
        require_once __DIR__ . "/../View/Layouts/header.php";
        require_once __DIR__ . "/../View/" . $view . ".php";
        require_once __DIR__ . "/../View/Layouts/footer.php";
    }

    public static function redirect(string $url)
    {
        header("Location: $url");
        if(getenv("mode") != "test") {
            exit();
        }
    }
}
