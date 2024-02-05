<?php

namespace IRFANM\PHP\EREPORT\Controller;

use IRFANM\PHP\EREPORT\App\View;
use IRFANM\PHP\EREPORT\Config\Database;
use IRFANM\PHP\EREPORT\Exception\ValidationException;
use IRFANM\PHP\EREPORT\Model\UserDaftarRequest;
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

    public function addUserPost()
    {
        $request = new UserDaftarRequest();
        $request->nama_lengkap = $_POST['nama'];
        $request->jabatan = $_POST['jabatan'];
        $request->username = $_POST['email'];
        $request->password = $_POST['password'];
        $request->level = $_POST['level'];
        $request->blokir = $_POST['blokir'] ?? "off";

        try{
            $this->userService->daftar($request);
            View::redirect("/");
        }catch(ValidationException $err){
            View::view("/User/tambah", [
                "title" => "User | Tambah",
                "error" => $err->getMessage()
            ]);
        }

    }
}
