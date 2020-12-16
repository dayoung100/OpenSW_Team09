create table accountbook(
    idSpends int(11) auto_increment primary key not null,
    amount int(8),
    date date,
    log tinytext,
    pet int(11),
    owner int(11) not null,
    foreign key (pet) references pets(idPets)
        on delete cascade
        on update cascade,
    foreign key (owner) references users(idUsers)
        on delete cascade
        on update cascade
);
