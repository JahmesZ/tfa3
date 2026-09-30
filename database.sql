CREATE DATABASE IF NOT EXISTS tfa3_pos;
USE tfa3_pos;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS users;
CREATE TABLE customers (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(30) NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);
CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);
INSERT INTO customers (full_name,email,phone,created_at) VALUES
('Maria Santos','maria@example.com','0917 123 4567',NOW()),
('Juan dela Cruz','juan@example.com','0928 555 0192',NOW()),
('Angela Reyes','angela@example.com',NULL,NOW());
INSERT INTO users (username,full_name,avatar,created_at) VALUES
('admin','Store Administrator',NULL,NOW()),
('cashier1','Paolo Garcia',NULL,NOW()),
('cashier2','Bea Villanueva',NULL,NOW());
