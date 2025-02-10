drop database aem_database;
create database aem_database;
use  aem_database;

CREATE TABLE
    aem_admin (
        aem_id_admin INT AUTO_INCREMENT PRIMARY KEY,
        aem_admin_name VARCHAR(50) NOT NULL,
        aem_admin_email VARCHAR(100) NOT NULL UNIQUE,
        aem_admin_password VARCHAR(255) NOT NULL,
        aem_admin_phone_number VARCHAR(20),
        image_path VARCHAR(255)
    );

INSERT INTO aem_admin (aem_admin_name, aem_admin_email, aem_admin_password, aem_admin_phone_number, image_path)
VALUES ('JOSOA', 'josoarazafimandimby66@gmail.com', '1OzWoFzX', '0349034080', 'assets/images/Josoa.jpg');

CREATE TABLE
    aem_country (
        aem_id_country INT AUTO_INCREMENT PRIMARY KEY,
        aem_country VARCHAR(50) NOT NULL
    );

CREATE TABLE
    aem_user (
        aem_id_user INT AUTO_INCREMENT PRIMARY KEY,
        aem_name VARCHAR(50) NOT NULL,
        aem_first_name VARCHAR(50) NOT NULL,
        aem_date_of_birth DATE NOT NULL,
        aem_place_of_birth VARCHAR(100) NOT NULL,
        aem_id_number VARCHAR(20) NOT NULL UNIQUE,
        aem_id_issue_date DATE NOT NULL,
        aem_id_issue_place VARCHAR(100) NOT NULL,
        aem_country INT NOT NULL,
        aem_state VARCHAR(100) NOT NULL,
        aem_city VARCHAR(100) NOT NULL,
        aem_sex CHAR(1) NOT NULL,
        aem_identity_photo VARCHAR(255),
        aem_payment_screenshot VARCHAR(255),
        aem_phone_number VARCHAR(20),
        aem_user_password VARCHAR(255) NOT NULL,
        FOREIGN KEY (aem_country) REFERENCES aem_country (aem_id_country) ON DELETE CASCADE
    );

CREATE TABLE
    aem_payment (
        aem_id_payment INT AUTO_INCREMENT PRIMARY KEY,
        aem_id_user INT,
        aem_date_inscription DATE DEFAULT CURRENT_DATE,
        aem_validation BOOLEAN,
        FOREIGN KEY (aem_id_user) REFERENCES aem_user (aem_id_user) ON DELETE CASCADE
    );