use f21_lchamplin;

DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Product;

CREATE TABLE Customer (
    id AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255)
);

CREATE TABLE Product ( 
    id AUTO_INCREMENT PRIMARY KEY,
    product_name varchar(255), 
    image_name varchar(255), 
    price decimal(6, 2), 
    in_stock int 
);

CREATE TABLE Orders (
    id AUTO_INCREMENT PRIMARY KEY,
    product_id int REFERENCES Product(id),
    customer_id int REFERENCES Customer(id),
    quantity int, 
    price decimal(6, 2),
    tax decimal(6, 2),
    donation decimal(6, 2),
    timestamp bigint
);

INSERT INTO Customer (first_name, last_name, email) VALUES('Mickey', 'Mouse', 'mmouse@mines.edu');
INSERT INTO Customer (first_name, last_name, email) VALUES('Jordan', 'Ratliff', 'cwiggl3s@gmail.com');

INSERT INTO Product (product_name, image_name, price, in_stock) VALUES('Gummy Bears', 'gummy_bears.jpg', 5, 0);
INSERT INTO Product (product_name, image_name, price, in_stock) VALUES('Chocolates', 'chocolates.jpg', 3, 3);
INSERT INTO Product (product_name, image_name, price, in_stock) VALUES('Caramels', 'caramels.jpg', 8, 32);


