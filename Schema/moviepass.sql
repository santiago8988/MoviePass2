
CREATE DATABASE IF NOT EXISTS moviepass;


use moviepass;


create table IF NOT EXISTS Cinema
(
    id int AUTO_INCREMENT NOT NULL,
    nameCinema varchar(50),
    adress varchar(50),
    constraint pkCinema primary key (id)
    
    
 );


create table IF NOT EXISTS Room
(

    id int AUTO_INCREMENT NOT NULL,
    idCinema int,
    nameRoom varchar(50),
    capacity int,
    price int,
    constraint pkRoom primary key (id),
    constraint fkRoom foreign key (idCinema) REFERENCES Cinema (id)

);
  
create table IF NOT EXISTS Movie
(
    id int AUTO_INCREMENT NOT NULL,
    title varchar(70) NOT NULL ,
    poster varchar(75),
    overview varchar(300),
    classification boolean,
    voteAverage float,
    voteCount int,
    original_language varchar(50),
    duration int,
    realeseDate date,

    constraint pkMovie primary key (id),
    constraint unq_title UNIQUE(title)

    
);

create table IF NOT EXISTS Showw
(
    id int AUTO_INCREMENT NOT NULL,
    showday varchar(30),
    hour varchar(50),
    soldTickets int,
    idMovie int, 
    idRoom int,
    idCinema int,
    price int,
    capacity int,
    constraint pkShow primary key (id),
    constraint fkShowMovie foreign key (idMovie) REFERENCES Movie (id),
    constraint fkShowRoom foreign key (idRoom) REFERENCES Room(id),
    constraint fkShowCinema foreign key (idCinema) REFERENCES Cinema (id)

);

create table IF NOT EXISTS Account
(
    id int AUTO_INCREMENT,
    accname varchar(50),

    constraint pkAccount primary key (id)
);

create table IF NOT EXISTS Payment
(
    id int AUTO_INCREMENT,
    auth_cod int,
    pay_day date,
    total float,
    idAccount int,

    constraint pkPayment primary key (id),
    constraint fkPayment foreign key (idAccount) REFERENCES Account(id)
);





create table IF NOT EXISTS User
(
    id int AUTO_INCREMENT,
    email varchar(50) not null,
    pass varchar(50) not null,
    userName varchar(50) NOT NULL,
    gender varchar(10) NOT NULL,
    birthday date,
    photo varchar(300),
    isAdmin boolean,


  constraint pkUser primary key (id),
  constraint unq_email UNIQUE(email)

   
);





create table IF NOT EXISTS Purchase
(
    id int AUTO_INCREMENT NOT NULL,
    quantity int,
    discount int,
    purchase_day date,
    total float,
    idUser int,
    idPayment int,
    constraint pkPurchase primary key (id),
    constraint fkTicketUser foreign key (idUser) REFERENCES User(id),
    constraint fkTicketPayment foreign key (idPayment)REFERENCES Payment(id)
);



create table IF NOT EXISTS Ticket
(
   id int AUTO_INCREMENT NOT NULL,
    qr varchar(30),
    price float,
    idRoom int,
    idPurchase int,
    constraint pkTicket primary key Ticket (id),
    constraint fkTicketRoom foreign key (idRoom) REFERENCES Room(id),
    constraint fkTicketPurchase foreign key (idPurchase) REFERENCES Purchase(id)
);



create table IF NOT EXISTS Gender
(
    id int NOT NULL,
    nameGender varchar(50) NOT NULL,
    constraint pkGender primary key (id)
);



create table IF NOT EXISTS MovieXGender
(
   
    idMovie int NOT NULL,
    idGender int NOT NULL,
    constraint pkMovieGender primary key (idMovie,idGender),
    constraint fkMovieXGender foreign key (idMovie) REFERENCES Movie (id),
    constraint fkGenderXGender foreign key (idGender) REFERENCES Gender (id)

);




