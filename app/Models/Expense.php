<?php
namespace App\Models;
use App\Models\Transaction;

class Expense extends Transaction{
    public function getNameTable() : string{
        return "expense";
    }
}