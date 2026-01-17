<?php

namespace App\Models;


class User{
    // Visibilité (Access Modifiers) && attribute(proprieté)
    private int $id;
    private string $fullname;
    private string $email;
    private string $password;

    public function __construct(string $fullname,string $email,string $password){
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters
    public function getId() : int {
        return $this->id; 
    }
    
    public function getFullname() : string { 
        return $this->fullname; 
    }
    
    public function getEmail() : string { 
        return $this->email; 
    }
    
    public function getPassword() : string { 
        return $this->password; 
    }

    // Setters
    public function setId(int $id){ 
        $this->id = $id; 
    }

}