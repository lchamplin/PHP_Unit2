use f21_lchamplin;

DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Product;

CREATE TABLE Orders (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id int,
    customer_id int,
    quantity int, 
    price decimal(6, 2),
    tax decimal(6, 2),
    donation decimal(6, 2),
    timestamp bigint
);

CREATE TABLE Customer (
    id int REFERENCES Orders(customer_id),
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255)
);

CREATE TABLE Product ( 
    id int REFERENCES Orders(product_id), 
    product_name varchar(255), 
    image_name varchar(255), 
    price decimal(6, 2), 
    in_stock int 
);

INSERT INTO Customer (first_name, last_name, email) VALUES('Mickey', 'Mouse', 'mmouse@mines.edu');
INSERT INTO Customer (first_name, last_name, email) VALUES('Jordan', 'Ratliff', 'cwiggl3s@gmail.com');

INSERT INTO Product (product_name, image_name, price, in_stock) VALUES('Gummy Bears', 'gummy_bears.jpg', 5, 0);
INSERT INTO Product (product_name, image_name, price, in_stock) VALUES('Chocolates', 'chocolates.jpg', 3, 3);
INSERT INTO Product (product_name, image_name, price, in_stock) VALUES('Caramels', 'caramels.jpg', 8, 32);


