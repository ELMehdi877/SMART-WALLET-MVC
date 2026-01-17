<?php
namespace App\Repositories;
use App\Core\Database;
use PDO;
use App\Models\Transaction;

class TransactionCalculRepository {
    // Visibilité (Access Modifiers) && attribute(proprieté)

    private PDO $pdo; 
    
    #methode magic
    public function __construct(){
        $this->pdo = Database::connect();
    }

    ### calcule Transaction (Income ou Expense)
    public function sommeTransaction(Transaction $transaction) : float{
        
        $table = $transaction->getNameTable();
        $sql = "SELECT SUM(montants) as total FROM $table WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $transaction->getUserId()
        ]);

        $total = $stmt->fetch(PDO::FETCH_ASSOC) ?? 0.0;
        return $total["total"];
    }

}