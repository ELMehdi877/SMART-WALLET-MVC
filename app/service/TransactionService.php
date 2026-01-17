<?php
namespace App\service;

use App\Repositories\TransactionInterface;
use App\Models\Transaction;
use App\Models\Income;
use App\Models\Expense;

class TransactionService{
    private TransactionInterface $transactionRepo;

    public function __construct(TransactionInterface $transactionRepo){
        $this->transactionRepo = $transactionRepo;
    }

    //add transaction service
    public function addTransactionService(Transaction $transaction) : string{
        if ($transaction->getAmount() <= 0) {
            return "le montant que voua avez inseré est incorrect";
        }
        $this->transactionRepo->addTransaction($transaction);
        return "nouveau transaction";
    }

    //selecte transaction par user service
    public function getByIdUserService(Transaction $transaction) : array{
        return $this->transactionRepo->getTransaction($transaction);
    }

    //update transaction (Income ou Expense) service
    public function updateService(Transaction $transaction) : string {
        if ($transaction->getAmount() <= 0) {
            return "le montant que voua avez inseré est incorrect";
        }

        $this->transactionRepo->updateTransaction($transaction);
        return "modification complete";
    }

    //delete transaction (Income ou Expense) service
    public function deleteService(Transaction $transaction) : string {
        $this->transactionRepo->deleteTransaction($transaction);
        return "supression complete";
    } 

   
}