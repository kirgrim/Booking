create table bookings
(
    register_number int auto_increment
        primary key,
    place_id        int          null,
    start_date      date         null,
    end_date        date         null,
    user            varchar(255) not null,
    isPaid          tinyint(1)   not null,
    constraint bookings_ibfk_1
        foreign key (place_id) references livingplaces (place_number)
);

create index place_id
    on bookings (place_id);

INSERT INTO mysql.bookings (register_number, place_id, start_date, end_date, user, isPaid) VALUES (2, 2, '2019-02-07', '2019-02-21', 'a', 1);
INSERT INTO mysql.bookings (register_number, place_id, start_date, end_date, user, isPaid) VALUES (123, 1, '2017-09-09', '2017-10-10', 'b', 0);
INSERT INTO mysql.bookings (register_number, place_id, start_date, end_date, user, isPaid) VALUES (124, 1, '2005-02-18', '2005-03-03', 'b', 0);
INSERT INTO mysql.bookings (register_number, place_id, start_date, end_date, user, isPaid) VALUES (136, 4, '2019-04-25', '2019-05-11', 'alexb', 0);