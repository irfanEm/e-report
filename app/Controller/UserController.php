<?php

namespace IRFANM\PHP\EREPORT\Controller;

use IRFANM\PHP\EREPORT\App\View;
use IRFANM\PHP\EREPORT\Config\Database;
use IRFANM\PHP\EREPORT\Repository\UserRepository;
use IRFANM\PHP\EREPORT\Service\UserService;

class UserController
{
    private UserService $userService;

    public function __construct()
    {
        $conn = Database::getConnection();
        $userRepo = new UserRepository($conn);
        $this->userService = new UserService($userRepo);
    }

    public function addUserPage()
    {
        View::view("/User/tambah", [
            "title" => "User | Tambah"
        ]);
    }
}
