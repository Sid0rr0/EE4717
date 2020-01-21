SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `items` CASCADE;
DROP TABLE IF EXISTS `customers` CASCADE;
DROP TABLE IF EXISTS `sales` CASCADE;
DROP TABLE IF EXISTS `salesAmount` CASCADE;

CREATE TABLE items
(
    ID        int(40)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name      varchar(40) NOT NULL,
    category  varchar(40) NOT NULL,
    price     double      NOT NULL,
    quantity int(40)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


CREATE TABLE customers (
    ID          int(40)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name        varchar(40) NOT NULL,
    surname     varchar(40) NOT NULL,
    address     varchar(40) NOT NULL

)ENGINE = InnoDB
 DEFAULT CHARSET = utf8;

CREATE TABLE sales (
    ID          int(40)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    customer_id int(40)     NOT NULL ,
    dt          DATETIME
);

CREATE TABLE salesAmount (
    ID          int(40)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sale_id int(40)     NOT NULL,
    flower_id   int(40)     NOT NULL,
    amount      int(40)     NOT NULL
);

ALTER TABLE salesAmount
    ADD CONSTRAINT `fk_saleAmount_flower`
        FOREIGN KEY (`flower_id`) REFERENCES `items` (`ID`);

ALTER TABLE salesAmount
    ADD CONSTRAINT `fk_saleAmount_sales`
        FOREIGN KEY (`sale_id`) REFERENCES `sales` (`ID`);

ALTER TABLE sales
    ADD CONSTRAINT `fk_sales_customer`
        FOREIGN KEY (`customer_id`) REFERENCES `customers` (`ID`);


INSERT INTO `items` (`ID`, `name`, `category`, `price`, `quantity`) VALUES
(1, 'Fredskalla', 'indoor', 16, 20),
(2, 'Lemon tree', 'indoor', 10, 15),
(3, 'Monstera', 'indoor', 62, 26),
(4, 'Paradise', 'indoor', 19, 30),
(5, 'Pineapple', 'indoor', 39, 30),
(6, 'Mountain Palm', 'indoor', 33, 25),
(7, 'China Doll', 'indoor', 90, 8),
(8, 'Banana Plant', 'indoor', 60, 10),
(9, 'Amazonian Shield', 'indoor', 9, 13),
(10, 'Eucalyptus', 'indoor', 4, 30),
(11, 'Golden Pothos', 'indoor', 19, 15),
(12, 'Money Tree', 'indoor', 44.99, 10),
(13, 'Coconut Palm', 'indoor', 29.99, 10),
(14, 'Dolce Vita', 'indoor', 34.99, 10),
(15, 'Ingens', 'indoor', 119.99, 5),
(16, 'Garden Girls', 'outdoor', 23.9, 10),
(17, 'Chinese Juniper', 'outdoor', 21.9, 10),
(18, 'Skyline', 'outdoor', 9.5, 20),
(19, 'Bear Bamboo', 'outdoor', 9.9, 20),
(20, 'Buxbom', 'outdoor', 28.5, 20),
(21, 'Calluna', 'outdoor', 5.9, 20);

SET FOREIGN_KEY_CHECKS=1;
