# Smart Wallet – Tableau de Bord Financier (Architecture MVC)

Smart Wallet est une application web de gestion financière permettant aux utilisateurs de gérer leurs **revenus**, **dépenses**, **catégories** et de visualiser leur situation financière via un **dashboard clair et structuré**.

Après le succès de la première version, développée avec une logique PHP peu structurée, l’application a été **migrée vers une architecture MVC (Model – View – Controller)** en **PHP natif**, sans framework, afin d’améliorer la **maintenabilité**, la **lisibilité du code** et la **scalabilité** du projet.

L’objectif principal est de fournir une base technique **propre et professionnelle**, conforme aux standards back-end utilisés en entreprise et prête pour des évolutions futures (API, mobile, multi-utilisateurs).

---

## 🚀 Fonctionnalités principales

### 🔐 Authentification & Sécurité

* Inscription et connexion des utilisateurs.
* Stockage sécurisé des mots de passe (`password_hash`).
* Gestion des sessions PHP.
* Protection des routes selon l’état de connexion.
* Validation des données côté serveur.
* Prévention des attaques :
  * SQL Injection (PDO + requêtes préparées)
  * XSS
  * CSRF (tokens)

---

### 🟢 Gestion des revenus (Incomes)

* Affichage de la liste des revenus de l’utilisateur connecté.
* Ajout d’un revenu via un formulaire dédié.
* Modification d’un revenu existant.
* Suppression d’un revenu.
* Association à une catégorie.
* Filtrage par catégorie.
* Validation des données (montant, date, description).

---

### 🟢 Gestion des dépenses (Expenses)

* Affichage de la liste des dépenses.
* Ajout d’une nouvelle dépense.
* Modification d’une dépense existante.
* Suppression d’une dépense.
* Association à une catégorie.
* Validation des données avant insertion.
* Filtrage par catégorie.

---

### 🗂️ Gestion des catégories (Categories)

* Création de catégories.
* Association des catégories aux revenus et dépenses.
* Filtrage des données financières par catégorie.
* Centralisation de la logique métier dans les Models.

---

### 🟢 Dashboard financier

* Calcul du total des revenus.
* Calcul du total des dépenses.
* Calcul du solde actuel (revenus – dépenses).
* Centralisation de la logique statistique dans le Model.
* Transmission des résultats au contrôleur puis à la vue Dashboard.

---

## 🏗️ Architecture MVC

L’application respecte une architecture **MVC claire**, avec une séparation stricte des responsabilités.

### 📂 Structure du projet

smart-wallet/
│
├── app/
│ ├── controllers/
│ │ ├── AuthController.php
│ │ ├── IncomeController.php
│ │ ├── ExpenseController.php
│ │ ├── CategoryController.php
│ │ └── DashboardController.php
│ │
│ ├── models/
│ │ ├── User.php
│ │ ├── Income.php
│ │ ├── Expense.php
│ │ └── Category.php
│ │
│ ├── views/
│ │ ├── layouts/
│ │ │ ├── header.php
│ │ │ └── footer.php
│ │ ├── auth/
│ │ ├── incomes/
│ │ ├── expenses/
│ │ ├── categories/
│ │ └── dashboard/
│ │
│ └── core/
│ ├── App.php
│ ├── Controller.php
│ ├── Model.php
│ └── Database.php
│
├── public/
│ ├── .htaccess
│ └── index.php
│
├── config/
│ └── config.php
│
├── database/
│ └── database.sql
│
└── README.md

markdown
Copy code

---

## 📌 User Stories (Principales)

### 🧱 Architecture & MVC

* Mettre en place un Front Controller (`public/index.php`).
* Implémenter un système de routing simple.
* Séparer clairement :
  * la logique métier (Model),
  * la logique applicative (Controller),
  * l’affichage (View).
* Appliquer les principes **SOLID** et **DRY**.

---

### 🗄️ Base de données (PostgreSQL)

* Création d’une base de données dédiée.
* Création des tables :
  * `users`
  * `incomes`
  * `expenses`
  * `categories`
* Définition des relations :
  * User → Incomes
  * User → Expenses
  * Category → Incomes / Expenses
* Utilisation de types SQL adaptés (`DECIMAL`, `DATE`, `TEXT`).
* Ajout des contraintes (`PRIMARY KEY`, `FOREIGN KEY`, `NOT NULL`).
* Centralisation du script SQL dans `database.sql`.

---

### 💰 Incomes – CRUD

* Lister les revenus.
* Ajouter un revenu.
* Modifier un revenu.
* Supprimer un revenu.
* Valider les données avant insertion.
* Filtrage par catégorie.

---

### 💸 Expenses – CRUD

* Lister les dépenses.
* Ajouter une dépense.
* Modifier une dépense.
* Supprimer une dépense.
* Valider les données.
* Filtrage par catégorie.

---

### 📊 Dashboard

* Calculer le total des revenus.
* Calculer le total des dépenses.
* Calculer le solde.
* Centraliser les calculs dans le Model.
* Afficher les résultats dans la vue Dashboard.

---

## 🛠️ Technologies utilisées

* **PHP 8+ (PHP natif, sans framework)**
* **PostgreSQL**
* **PDO**
* **HTML5**
* **CSS3 / TailwindCSS**
* **JavaScript (ES6+)**
* **Sessions PHP**
* **Architecture MVC**
* **Principes SOLID**