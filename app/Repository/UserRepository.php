<?php

namespace IRFANM\PHP\EREPORT\Repository;

use IRFANM\PHP\EREPORT\Domain\User;

class UserRepository
{
    private \PDO $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function simpan(User $user): User
    {
        $stmt = $this->conn->prepare("INSERT INTO users(nama_lengkap, jabatan, username, password, level, blokir) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $user->nama_lengkap, $user->jabatan, $user->username, $user->password, $user->level, $user->blokir
        ]);

        return $user;
    }

    public function update(User $user): User
    {
        $stmt = $this->conn->prepare("UPDATE users set nama_lengkap = ?, jabatan = ?, username = ?, password = ?, level = ?, blokir = ? WHERE username = ?");
        $stmt->execute([
            $user->nama_lengkap, $user->jabatan, $user->username, $user->password, $user->level, $user->blokir
        ]);

        return $user;
    }

    public function findByUsername(string $username): ?User
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        try{
            if($row = $stmt->fetch())
            {
                $user = new User();
                $user->id = $row['id'];
                $user->nama_lengkap = $row['nama_lengkap'];
                $user->jabatan = $row['jabatan'];
                $user->username = $row['username'];
                $user->password = $row['password'];
                $user->level = $row['level'];
                $user->blokir = $row['blokir'];

                return $user;
            }else{
                return null;
            }
        }finally{
            $stmt->closeCursor();
        }

    }

    public function hapusByUsername(string $username): void
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE username = ?");
        $stmt->execute([$username]);
    }

    public function hapusAll(): void
    {
        $this->conn->exec("DELETE FROM users");
    }
}
