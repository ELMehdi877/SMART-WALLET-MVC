<?php
namespace App\Repositories;
use App\Models\Category;
use App\Repositories\UserInterface;
use App\core\Database;
use PDO;
class CategoryRepository implements UserInterface{
    private Category $category;
    private PDO $pdo; 
    
    #methode magic
    public function __construct(Category $category){
        $this->pdo = Database::connect();
    }

    // register dans baes de donner
    public function save(){
        $sql = "INSERT INTO category(user_id,category_name) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $this->category->getUserId(),
            $this->category->getCategory()
        ]);
    }
    
    // filtrage par category
    public function find() : array{

        $sql = "SELECT * FROM category WHERE user_id = ? AND category_name = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $this->category->getUserId(),
            $$this->category->getCategory()
        ]);
        $table_filtre = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $table_filtre;

    }
}