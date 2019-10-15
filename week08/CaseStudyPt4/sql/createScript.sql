SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `coffee` CASCADE;

create table coffee (
                          coffee_id int auto_increment primary key,
                          coffee_name varchar(40) not null,
                          type varchar(40) not null,
                          price double not null
);
/*
CREATE table sensor (
                        sensor_id int AUTO_INCREMENT,
                        sensor_name varchar(30) not null,
                        location_id int,
                        PRIMARY KEY (sensor_id)
);


ALTER TABLE `sensor`
    ADD CONSTRAINT `FK_Location_Sensor`
        FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

*/
SET FOREIGN_KEY_CHECKS=1;
/*
insert into sensor (sensor_name, location_id) VALUES ('test1', 1);
*/
