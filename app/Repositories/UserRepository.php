<?php
// require_once __DIR__ . "/../core/RepositoryInterface.php";

// use App\Repositories\UserInterface;

namespace App\repositories;

use App\Repositories\UserInterface;
use App\core\Database; 
use PDO;
use App\Models\User;

class UserRepository implements UserInterface {
    private PDO $pdo;
    private User $user;
    // __construct

    public function __construct(User $user){
        $this->pdo = Database::connect();
        $this->user = $user;
    }
// 
    // register dans baes de donner
    public function save(){
        $sql = "INSERT INTO users(fullname,email,password) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $this->user->getfullname(),
            $this->user->getemail(),
            $this->user->getpassword()
        ]);
    }

    // verification par email
    public function find() : array{
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $this->user->getemail()
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];
    }
}