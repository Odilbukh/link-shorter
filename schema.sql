CREATE DATABASE links_shorter
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE links_shorter;

CREATE TABLE links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_url VARCHAR(255) NOT NULL,
    token VARCHAR(8) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expires_at TIMESTAMP
);