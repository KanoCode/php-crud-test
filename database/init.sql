-- create database
CREATE DATABASE IF NOT EXISTS userdata;
  -- CHARACTER SET utf8mb4
  -- COLLATE utf8mb4_unicode_ci;

USE userdata;


-- GRANT ALL PRIVILEGES ON my_app_db.* TO 'my_app_user'@'localhost';
-- FLUSH PRIVILEGES;

-- create tables
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  phone_number VARCHAR(10) UNIQUE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
