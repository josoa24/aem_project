drop database aem_database;

create database aem_database;

use aem_database;

CREATE TABLE aem_country (
    aem_id_country INT AUTO_INCREMENT PRIMARY KEY,
    aem_country VARCHAR(50) NOT NULL
);

CREATE TABLE
    aem_user (
        aem_id_user INT AUTO_INCREMENT PRIMARY KEY,
        aem_name VARCHAR(50),
        aem_first_name VARCHAR(50),
        aem_country INT,
        aem_city VARCHAR(50),
        aem_photos VARCHAR(150),
        FOREIGN KEY (aem_country) REFERENCES aem_country (aem_id_country) ON DELETE CASCADE
    );

CREATE TABLE
    aem_payment (
        aem_id_payment INT AUTO_INCREMENT PRIMARY KEY,
        aem_id_user INT,
        aem_validation TINYINT (1),
        FOREIGN KEY (aem_id_user) REFERENCES aem_user (aem_id_user) ON DELETE CASCADE
    );