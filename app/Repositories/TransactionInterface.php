<?php
namespace App\Repositories;
use App\Models\Transaction;
interface TransactionInterface{
    public function addTransaction(Transaction $objet);
    public function deleteTransaction(Transaction $objet);
    public function updateTransaction(Transaction $objet);
    public function getTransaction(Transaction $objet) : array;
    public function sommeTransaction(Transaction $objet): ?float;
}