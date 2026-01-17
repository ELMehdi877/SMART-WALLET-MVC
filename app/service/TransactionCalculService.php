<?php
namespace App\service;

use App\Repositories\CalculInterface;
use App\Models\Income;
use App\Models\Expense;

class TransactionCalculService{
    private CalculInterface $calculRepo;

    public function __construct(CalculInterface $calculRepo){
        $this->calculRepo = $calculRepo;
    }

     //calcule Transaction (Income ) service
    public function calculIncomeServcie(Income $income) : float {
        $sommeIncome = $this->calculRepo->sommeTransaction($income);
        return $sommeIncome;
    }

    //calcule Transaction (Expense ) service
    public function calculExpenseServcie(Expense $expense) : float {
        $sommeExpense = $this->calculRepo->sommeTransaction($expense);
        return $sommeExpense;
    }

     //calcule solde actual (Income - Expense ) service
    public function soldeActualServcie(Income $income, Expense $expense) : float {

        $sommeExpense = $this->calculIncomeServcie($income);
        $sommeIncome = $this->calculExpenseServcie($expense);

        return $sommeIncome - $sommeExpense;
    }

    
}