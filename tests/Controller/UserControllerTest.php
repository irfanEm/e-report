<?php

namespace IRFANM\PHP\EREPORT\Controller;

use IRFANM\PHP\EREPORT\Config\Database;
use PHPUnit\Framework\TestCase;
use IRFANM\PHP\EREPORT\Service\UserService;
use IRFANM\PHP\EREPORT\Controller\UserController;
use IRFANM\PHP\EREPORT\Repository\UserRepository;

class UserControllerTest extends TestCase
{
    private UserController $userController;
    private UserRepository $userRepo;

    protected function setUp(): void
    {
        $this->userController = new UserController();
        $this->userRepo = new UserRepository(Database::getConnection());
        $this->userRepo->hapusAll();
    }

    public function testPostDaftar()
    {
        $_POST['nama'] = "Balqis FA";
        $_POST['jabatan'] = "1";
        $_POST['email'] = "contoh@email.com";
        $_POST['password'] = "rahasia";
        $_POST['level'] = "2";
        $_POST['blokir'] = "off";

        $this->userController->addUserPost();

        $this->expectOutputRegex("[Location: /]");
    }
}
