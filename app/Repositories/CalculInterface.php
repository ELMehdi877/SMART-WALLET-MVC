<?php
namespace App\Repositories;
use App\Models\Transaction;

interface CalculInterface{
    public function sommeTransaction(Transaction $transaction) : float ;
}