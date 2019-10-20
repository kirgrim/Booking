create table messages
(
    id      int auto_increment
        primary key,
    topic   varchar(255) not null,
    text    varchar(255) not null,
    date    date         not null,
    contact varchar(255) null
);

INSERT INTO mysql.messages (id, topic, text, date, contact) VALUES (10, 'Complaint', 'I do not like hotel services.', '2019-04-25', 'email me on email@gmail.com');