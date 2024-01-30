<?php

namespace IRFANM\PHP\EREPORT\Service;

use Exception;
use IRFANM\PHP\EREPORT\Config\Database;
use IRFANM\PHP\EREPORT\Domain\User;
use IRFANM\PHP\EREPORT\Exception\ValidationException;
use IRFANM\PHP\EREPORT\Model\UserDaftarRequest;
use IRFANM\PHP\EREPORT\Model\UserDaftarResponse;
use IRFANM\PHP\EREPORT\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function daftar(UserDaftarRequest $request): UserDaftarResponse
    {
        $this->validasiDaftarUser($request);

        try{
            Database::beginTransaction();

            $user = $this->userRepo->findByUsername($request->username);
            if($user != null)
            {
                throw new ValidationException("Username wis dienggo nder !");
            }

            $user = new User();
            $user->nama_lengkap = $request->nama_lengkap;
            $user->jabatan = $request->jabatan;
            $user->username = $request->username;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            $user->level = $request->level;
            $user->blokir = $request->blokir;

            $this->userRepo->simpan($user);

            $response = new UserDaftarResponse();
            $response->user = $user;

            Database::commitTransaction();

            return $response;
        }catch(Exception $err){
            Database::rollbackTransaction();
            throw $err;
        }
    }

    private function validasiDaftarUser(UserDaftarRequest $request): void
    {
        if($request->nama_lengkap == null || $request->jabatan == null || $request->username == null || $request->password == null || $request->level == null || $request->blokir == null || 
        trim($request->nama_lengkap) == "" || trim($request->jabatan) == "" || trim($request->username) == "" || trim($request->password) == "" || trim($request->level) == "" || trim($request->blokir) == "")
        {
            throw new ValidationException("Datane wajib diisi kabeh nder !");
        }
    }
}
