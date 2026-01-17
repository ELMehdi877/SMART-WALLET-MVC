<?php

namespace App\service;
use App\Repositories\UserInterface;

class UserService {
    private UserInterface $userRepo;

    
    public function __construct(UserInterface $userRepo){
        $this->userRepo = $userRepo; 
    }

    // update profil service
    public function signUpUserService() : string {
        if ($this->userRepo->find()) {
            return "ce Email existe déja";
        }
        else{
            $this->userRepo->save();
            return "vous avez cree un nouveaux compte";
        }
    }

    // service save user
    public function loginUserService() : ?string{
        if (!$this->userRepo->find()) {
            return "ce commpte n'existe pas";
        }

        return null;
    }
}