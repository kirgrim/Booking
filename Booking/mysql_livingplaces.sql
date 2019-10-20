create table livingplaces
(
    place_number   int auto_increment
        primary key,
    type           int          null,
    city           varchar(255) null,
    address        varchar(255) not null,
    cost_per_night decimal      null,
    name           varchar(255) not null,
    constraint livingplaces_ibfk_1
        foreign key (type) references buildingtype (type_id)
);

create index type
    on livingplaces (type);

INSERT INTO mysql.livingplaces (place_number, type, city, address, cost_per_night, name) VALUES (1, 1, 'Dublin', 'address1', 70, 'name1');
INSERT INTO mysql.livingplaces (place_number, type, city, address, cost_per_night, name) VALUES (2, 2, 'Dublin', 'address2', 65, 'name2');
INSERT INTO mysql.livingplaces (place_number, type, city, address, cost_per_night, name) VALUES (3, 3, 'Dublin', 'address3', 75, 'name3');
INSERT INTO mysql.livingplaces (place_number, type, city, address, cost_per_night, name) VALUES (4, 2, 'Dublin', 'address4', 70, 'Hilton');