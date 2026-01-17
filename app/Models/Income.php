<?php
namespace App\Models;
use App\Models\Transaction;

class Income extends Transaction{
    public function getNameTable() : string{
        return "income";
    }
}