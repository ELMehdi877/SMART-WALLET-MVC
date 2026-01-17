<?php

namespace App\service;
use App\Repositories\UserInterface;

class UserService {
    private UserInterface $userRepo;

    
    public function __construct(UserInterface $userRepo){
        $this->userRepo = $userRepo; 
    }

    // service save user
    public function signUpUserService() : string {
        if ($this->userRepo->find()) {
            return "ce Email existe déja";
        }
        else{
            $this->userRepo->save();
            return "vous avez cree un nouveaux compte";
        }
    }

    // service login user
    public function loginUserService($password) : ?string{
        if (!$this->userRepo->find()) {
            return "ce commpte n'existe pas";
        }
        else {
            $user = $this->userRepo->find();
            if (password_verify($password , $user["password"])) {
                return null;
            }
            else {
                return "mode de passe incorrect";
            }
        }

        return null;
    }
}