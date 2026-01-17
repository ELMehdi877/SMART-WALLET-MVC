<?php

namespace App\Repositories;

interface UserInterface{
    public function save();
    public function find() : array;
}