
CREATE DATABASE MOVIEPASS;


use MOVIEPASS;


create table Cinema
{
    id int auto_increment,
    capacidad int ,
    adress string,
    name string,
    price int,

    constraint pkCinema primary key (id),

}

create table Room
{
    id int auto_increment,
    idCinema int,
    name string,
    constraint pkRoom primary key (id),
    constraint fkRoom foreign key (idCinema) reference Cinema (id),
}

create table Show
{
    id int auto_increment,
    dia date,
    hora string,
    idMovie int, 
    idRoom int,
    constraint pkShow primary key (id),
    constraint fkShowMovie foreign key (idMovie) reference Movie (id),
    constraint fkShowRoom foreign key (idRoom) reference Room(id),

}

create table Ticket
{
    id int auto_increment,
    qr byte,
    price float,
    idRoom int,
    idPurchase int,
    constraint pkTicket primary key Ticket (id),
    constraint fkTicketRoom foreign key (idRoom) reference Room(id),
    constraint fkTicketPurchase foreign key (idPurchase) reference Purchase(id),

}

create table Movie
{
    id int auto_increment,
    idShow int,
    duration int,
    image byte,
    language string,
    title string not null,
    constraint pkMovie primary key (id),
    constraint fkMovieShow foreign key (idShow) reference Show(id),


}

create table Gender
{
    id int auto_increment,
    name string not null,
    constraint pkGender primary key (id),
}

create table MovieXGender
{
    idMovie int,
    idGender int,
    constraint pkMovieXGender primary key (idMovie,idGender),
    constraint fkMovieXGender foreign key (idMovie) reference Movie (id),
    constraint fkGenderXGender foreign key (idGender) reference Gender (id),

}

create table Purchase
{
    id int auto_increment,
    quantity int,
    discount int,
    purchase_day date,
    total float,
    idUser int,
    idPayment int,
    constraint pkPurchase primary key (id),
    constraint fkTicketUser foreign key (idUser) reference User(id),
    constraint fkTicketPayment foreign key (idPayment)reference Payment(id),


}

create table Payment
{
    id int auto_increment,
    auth_cod int,
    pay_day date,
    total float,
    idAccount int,

    constraint pkPayment primary key (id),
    constraint fkPayment foreign key (idAccount) reference Account(id),

}

create table Account
{
    id int auto_increment,
    name string,

    constraint pkAccount primary key (id),
} 

create table User
{
    id int auto_increment,
    email varchar[50] not null,
    idProfile int,
    pass varchar[50] not null,
 
    idRole int,

    constraint pkUser primary key (id),
    constraint fkUserRole foreign key (idRole) reference Roles(id),
    constraint fkUserProfile foreign key (idProfile) reference Profiles(id),

}

create table Roles
{
    id int auto_increment,
    name string,

    constraint pkRole primary key (id),
}

create table Profiles
{
    id int auto_increment,
    idUser int,
    userName varchar[50] not null,
    gender string,
    isAdmin boolean,
    birthday date,
    photo url,

    constraint pkProfile primary key (id),
    constraint fkProfileUser foreign key (idUser) reference User (id),
}

