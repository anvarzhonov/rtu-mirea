

create table orders(
    id_order int(10) AUTO_INCREMENT,
    order_date DATE NOT NULL,
    order_completion_date DATE NOT NULL,
    completed varchar(10) NOT NULL,
    cost_of_order int(20) NOT NULL,
    PRIMARY KEY (id_order)
);

create table employees(
    id_employee int(10) AUTO_INCREMENT,
    name_employee int(100) NOT NULL,
    PRIMARY KEY (id_employee)
);

create table positions_of_employees(
    id_position int(10) AUTO_INCREMENT,
    name_position varchar(20) NOT NULL,
    PRIMARY KEY (id_position)
);

create table orders_employees(
    id_order int(10) NOT NULL,
    id_employee int(10) NOT NULL,
    PRIMARY KEY (id_employee,id_order)
);

create table pricelist_orders(
    id_order INTEGER NOT NULL,
	id_service  INTEGER NOT NULL,
    PRIMARY KEY (id_order,id_service)
);

create table client(
   id_client int(10) AUTO_INCREMENT,
   name_client varchar(20) NOT NULL,
   phone_number int(20),
   PRIMARY KEY (id_client) 
);

create table priceList(
    id_service int(10) AUTO_INCREMENT,
    name_service varchar(20) NOT NULL,
    price_of_service int(30) NOT NULL,
    PRIMARY KEY (id_service)
);



create table types_of_services(
    id_product int(10) AUTO_INCREMENT,
    name_type_of_service varchar(20) NOT NULL,
    PRIMARY KEY (id_product)
    
);

create table SEO_promotion(
    id_product int(10) AUTO_INCREMENT,
    name_type_of_service varchar(20) NOT NULL,
    PRIMARY KEY (id_product)
    
);

create table contextual_advertising(
    id_product int(10) AUTO_INCREMENT,
    name_of_tariff varchar(20) NOT NULL,
    price_of_tariff varchar(20) NOT NULL,
    description_about_tariff varchar(20) NOT NULL,
    PRIMARY KEY (id_product)
    
);

create table targeted_advertising(
    id_product int(10) AUTO_INCREMENT,
    name_placement_platform varchar(20) NOT NULL,
    PRIMARY KEY (id_product)
);
