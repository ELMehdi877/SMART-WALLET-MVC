<?php
namespace App\service;

use App\Models\Income;
use App\Models\Expense;
use App\Repositories\UserInterface;

class CategoryService{
    private UserInterface $categoryRepo;

    public function __construct(UserInterface $categoryRepo){
        $this->categoryRepo = $categoryRepo;
    }
    
    // find user service
    public function findCategoryService(){
        $this->categoryRepo->find();
        return "cette category déja existe";
    }

    // service save user
    public function seveCategoryService(){
        $this->categoryRepo->save();
        return "vous avez cree un nouveaux compte";
    }
    
}