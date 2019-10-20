create table buildingtype
(
    type_id int auto_increment
        primary key,
    name    varchar(256) null
);

INSERT INTO mysql.buildingtype (type_id, name) VALUES (1, 'villa');
INSERT INTO mysql.buildingtype (type_id, name) VALUES (2, 'apartment');
INSERT INTO mysql.buildingtype (type_id, name) VALUES (3, 'house');