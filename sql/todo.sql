create table todo(
    idTodo int(11) auto_increment primary key not null,
    title tinytext,
    date date,
    time time,
    type tinytext,
    detail tinytext,
    pet int(11),
    owner int(11) not null,
        foreign key (pet) references pets(idPets)
        on delete cascade
        on update cascade,
    foreign key (owner) references users(idUsers)
        on delete cascade
        on update cascade
);
