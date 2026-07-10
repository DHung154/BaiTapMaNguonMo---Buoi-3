-- database.sql
-- Chạy file này trong phpMyAdmin hoặc mysql client trước khi test bài 12

CREATE DATABASE IF NOT EXISTS lab_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lab_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
