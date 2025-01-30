CREATE DATABASE todo_list_db;

USE todo_list_db;

CREATE TABLE lane (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255)
);

CREATE TABLE item (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    lane_id INT(11),
    title VARCHAR(255),
    FOREIGN KEY (lane_id) REFERENCES lane(id)
);

INSERT INTO lane (title) VALUES ('Todo'), ('In Progress'), ('Done');