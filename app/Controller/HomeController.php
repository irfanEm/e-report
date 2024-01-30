<?php

namespace IRFANM\PHP\EREPORT\Controller;

use IRFANM\PHP\EREPORT\App\View;

class HomeController
{
    public function index()
    {
        echo "Route berhasil !.";
    }

    public function notFound()
    {
        View::view("Errors/404");
    }
}
