
create table utilisateur (
utiId int NOT NULL AUTO_INCREMENT,
utiNom VarChar(20),
utiTel int,
utiAnniversiare date,
utiPrenom VarChar(20),
utiRôle VarChar(15),
utiPassword VarChar(40),
uitEmail VarChar(50),
primary key (utiId)
); 
create table club_Basket(
club_BasketId int NOT NULL AUTO_INCREMENT,
club_BasketNom VarChar(30),
club_BasketAdresse VarChar(50),
club_BasketTel int,
utiId int,
PRIMARY KEY	(club_BasketId),
FOREIGN KEY (utiId) REFERENCES utilisateur (utiId)
);
create table Matchs(
MatchsId int NOT NULL AUTO_INCREMENT,
MatchResultat double,
MatchOpposition VarChar(100),
MatchAdresse VarCHar(50),
primary key (MatchsId)
);
drop table consultation;
drop table consultation_medicament;
drop table medecin;
drop table patient;
drop table medicament;

create table Rencontre(
RencontreId int  NOT NULL AUTO_INCREMENT,
RencontreHeure time,
RencontreJour date,
MatchsId int,
primary key (rencontreId),
foreign key (MatchsId) references Matchs (MatchsId)
);

create table Equipe(
EquipeId int NOT NULL AUTO_INCREMENT,
EquipeCatégorie VarChar(20),
EquipeJoueurs VarChar(40),
RencontreId int,
utiId int,
club_BasketId int,
primary key (EquipeId),
foreign key (RencontreId) references Rencontre (RencontreId),
foreign key (utiId) references utilisateur (utiId),
foreign key (club_BasketId) references club_Basket (club_BasketId)
);
alter table utilisateur
rename column utiAnniversiare to utiAnniversaire;
alter table utilisateur
rename column uitEmail to utiEmail;
alter table utilisateur
drop column utiTel ;
alter table utilisateur
ADD utiTel VarChar(25);

insert into utilisateur(utiNom, utiTel, utiAnniversaire, utiPrenom, utiRôle, utiPassword, utiEmail)
values ("Augustin", "+32478162923", "2007-04-18", "Collin", "Admin", "TchoupiD3Lahess", "colaugu@gmail.com");

