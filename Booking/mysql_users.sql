create table users
(
    nickname varchar(255) not null
        primary key,
    fname    varchar(255) not null,
    lname    varchar(255) not null,
    password varchar(255) not null
);

INSERT INTO mysql.users (nickname, fname, lname, password) VALUES ('alexb', 'Alex', 'Black', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO mysql.users (nickname, fname, lname, password) VALUES ('b', 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f');
INSERT INTO mysql.users (nickname, fname, lname, password) VALUES ('johnm', 'John', 'Mayers', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO mysql.users (nickname, fname, lname, password) VALUES ('t', 't', 't', 'e358efa489f58062f10dd7316b65649e');