<?php
namespace App\Models;
use App\Models\Category;
abstract class Transaction {
    // Visibilité (Access Modifiers) && attribute(proprieté)
    protected int $id;
    protected int $user_id;
    protected Category $category;
    protected float $amount;
    protected string $description; 
    protected string $date; 
    
    #methode magic
    public function __construct(int $user_id,Category $category,float $amount,string $description,string $date){
        $this->user_id = $user_id;
        $this->category = $category;
        $this->amount = $amount;
        $this->description = $description;
        $this->date = $date;
    }

    //Getters

    public function getId() : int {
        return $this->id;
    }

    public function getUserId() : int {
        return $this->user_id;
    }

    public function getCategoryName() : string {
        return $this->category->getCategory();
    }

    public function getCategoryId() : int {
        return $this->category->getId();
    }

    public function getAmount() : float {
        return $this->amount;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getDate() : string {
        return $this->date;
    }

    //setters

    public function setId(int $id){
        $this->id = $id;
    }

    abstract function getNameTable() : string;
}