
DROP database IF EXISTS todo;
CREATE DATABASE todo;
use todo;

CREATE TABLE done(
id INT PRIMARY KEY auto_increment NOT NULL,
alias VARCHAR(255),
name VARCHAR(255)
);
CREATE TABLE items (
    id INT PRIMARY KEY auto_increment NOT NULL,
    name VARCHAR(255),
    created DATETIME,
    done_id int NOT NULL,
    CONSTRAINT fk_done_id FOREIGN KEY (done_id) REFERENCES done(id) ON UPDATE CASCADE ON DELETE CASCADE
);
INSERT INTO done(alias, name)
Values("inprogress", "Inprogress"),
    ("complete", "Complete");

