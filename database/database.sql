-- Active: 1768312369187@@127.0.0.1@5432@smart_wallet


CREATE DATABASE smart_wallet;

DROP DATABASE IF EXISTS smart_wallet WITH (FORCE);
#creation de tableau users
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
    id  SERIAL PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

#creation de tableau category
CREATE TABLE IF NOT EXISTS category(
    id  SERIAL PRIMARY KEY,
    user_id INT,
    CONSTRAINT fr_category_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    category_name VARCHAR(20) NOT NULL,
    created_at DATE DEFAULT CURRENT_DATE
);

#creation de tableau incomes
DROP TABLE IF EXISTS incomes;
CREATE TABLE if not exists incomes(
    id SERIAL PRIMARY KEY,
    user_id INT,
    CONSTRAINT fk_incomes_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    category_name VARCHAR(20) NOT NULL,
    montants DECIMAL(10,2) not null check (montants > 0),
    description VARCHAR(35) not null,
    date DATE DEFAULT CURRENT_DATE,
    created_at DATE DEFAULT CURRENT_DATE
);

DROP TABLE IF EXISTS expenses;
CREATE TABLE if not exists expenses(
    id  SERIAL PRIMARY KEY,
    user_id INT,
    CONSTRAINT fk_expenses_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    category_name VARCHAR(20) NOT NULL,
    montants DECIMAL(10,2) not null check (montants > 0),
    description VARCHAR(35) not null,
    date DATE DEFAULT CURRENT_DATE,
    created_at DATE DEFAULT CURRENT_DATE
);

INSERT INTO users(fullname,email,password) VALUES ("mehdi","mehdi@","123");
