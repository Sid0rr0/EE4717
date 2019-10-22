SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `saleAmount` CASCADE;
DROP TABLE IF EXISTS `coffee` CASCADE;
DROP TABLE IF EXISTS `sale` CASCADE;

create table coffee (
    coffee_id int auto_increment primary key,
    coffee_name varchar(40) not null,
    description varchar(300),
    type varchar(40) not null,
    price double not null
);

CREATE table saleAmount (
    saleAmount_id int auto_increment primary key,
    sale_id int not null,
    coffee_id int not null,
    amount int not null
);

CREATE table sale (
    sale_id int AUTO_INCREMENT primary key,
    dt DATETIME
);

ALTER TABLE saleAmount
    ADD CONSTRAINT `fk_saleAmount_coffee`
        FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`coffee_id`);

ALTER TABLE saleAmount
    ADD CONSTRAINT `fk_saleAmount_sale`
        FOREIGN KEY (`sale_id`) REFERENCES sale ( `sale_id` );

SET FOREIGN_KEY_CHECKS=1;

