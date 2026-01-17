<?php 
namespace App\Models;

class Category{
    // Visibilité (Access Modifiers) && attribute(proprieté)
    private int $id;
    private int $user_id;
    public string $category_name;

    public function __construct(int $user_id , string $category_name){
        $this->user_id = $user_id;
        $this->category_name = $category_name;
    }

    public function getCategory() : string {
        return $this->category_name;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getUserId() : int {
        return $this->user_id;
    }

    public function setId(int $id){
        $this->id = $id;
    }
}

