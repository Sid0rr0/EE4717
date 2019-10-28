insert into coffee (coffee_name, description, type, price) VALUES ('Just Java', 'Regular house blend, decaffeinated coffee, or flavor of the day.', 'Endless Cup', 2);
insert into coffee (coffee_name, description, type, price) VALUES ('Cafe au Lait', '', 'Single', 2);
insert into coffee (coffee_name, description, type, price) VALUES ('Cafe au Lait', 'House blended coffee infused into a smooth, steamed milk.', 'Double', 3);
insert into coffee (coffee_name, description, type, price) VALUES ('Iced Cappuccino', '', 'Single', 4.75);
insert into coffee (coffee_name, description, type, price) VALUES ('Iced Cappuccino', 'Sweetened espresso blended with icy-cold milk and served in chilled glass.', 'Double', 5.75);

insert into sale (dt) VALUES (NOW());
insert into sale (dt) VALUES('2019-10-21 14:29:36');

insert into saleAmount (sale_id, coffee_id, amount) VALUES (1, 2, 2);
insert into saleAmount (sale_id, coffee_id, amount) VALUES (2, 2, 1);
insert into saleAmount (sale_id, coffee_id, amount) VALUES (2, 4, 2);
