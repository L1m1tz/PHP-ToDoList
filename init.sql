DROP database IF EXISTS todo;
CREATE DATABASE todo;
use todo;
CREATE TABLE items (
    id INT PRIMARY KEY auto_increment NOT NULL,
    name VARCHAR(255),
    done BOOL,
    created DATETIME
)