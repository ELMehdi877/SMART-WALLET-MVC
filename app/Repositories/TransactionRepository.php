<?php
namespace App\Repositories;
use App\Core\Database;
use PDO;
use App\Models\Transaction;

class TransactionRepository {
    // Visibilité (Access Modifiers) && attribute(proprieté)

    private PDO $pdo; 
    
    #methode magic
    public function __construct(){
        $this->pdo = Database::connect();
    }



    ### Add Transaction (Income ou Expense)
    public function addTransaction(Transaction $transaction){
        
        $table = $transaction->getNameTable();
        $sql = "INSERT INTO $table(user_id,category_name,montants,description,date) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $transaction->getUserId(),
            $transaction->getCategoryName(),
            $transaction->getAmount(),
            $transaction->getDescription(),
            $transaction->getDate()
        ]);
    }


    ### selecte tous les Transaction par user_id
    public function getTransaction(Transaction $transaction) : array{

        $table = $transaction->getNameTable();
        $sql = "SELECT * FROM $table WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $transaction->getUserId()
        ]);
        
        $transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // if ($income === false) {
        //     return NULL;
        // }
        return $transaction;
    }

    ### update Transaction (Income ou Expense)
    public function updateTransaction(Transaction $transaction){
        $table = $transaction->getNameTable();
        $sql = "UPDATE $table SET category_name = ?, montants = ?, description = ?, date = ? WHERE user_id = ? AND id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $transaction->getCategoryName(),
            $transaction->getAmount(),
            $transaction->getDescription(),
            $transaction->getDate(),
            $transaction->getUserId(),
            $transaction->getId()

        ]);
    }

    ### delete Transaction (Income ou Expense)
    public function deleteTransaction(Transaction $transaction){
        $table = $transaction->getNameTable();
        $sql = "DELETE FROM $table  WHERE id = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $transaction->getId(),
            $transaction->getUserId()
        ]);
    }

}