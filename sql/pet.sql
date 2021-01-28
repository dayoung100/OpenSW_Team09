create table pets(
    idPets int(11) auto_increment primary key not null,
    name tinytext not null,
    type tinytext,
    breed tinytext,
    bday date,
    owner int(11) not null,
    foreign key (owner) references users(idUsers)
        on delete cascade
        on update cascade
);