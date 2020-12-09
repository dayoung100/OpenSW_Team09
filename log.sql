create table logs(
    idLogs int(11) auto_increment primary key not null,
    title tinytext not null,
    date date,
    log longtext,
    owner int(11) not null,
    foreign key (owner) references users(idUsers)
        on delete cascade
        on update cascade
);