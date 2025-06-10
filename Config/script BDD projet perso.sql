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
create table club_basket(
club_basketId int NOT NULL AUTO_INCREMENT,
club_basketNom VarChar(30),
club_basketAdresse VarChar(50),
club_basketTel int,
utiId int,
PRIMARY KEY (club_basketId),
FOREIGN KEY (utiId) REFERENCES utilisateur (utiId)
);
create table Matchs(
MatchsId int NOT NULL AUTO_INCREMENT,
MatchResultat double,
MatchOpposition VarChar(100),
MatchAdresse VarCHar(50),
primary key (MatchsId)
);
create table Rencontre(
RencontreId int  NOT NULL AUTO_INCREMENT,
RencontreHeure time,
RencontreJour date,
MatchsId int,
EquipeId int,
primary key (rencontreId),
foreign key (MatchsId) references Matchs (MatchsId),
foreign key (EquipeId) references equipe (EquipeId)
);

create table Equipe(
EquipeId int NOT NULL AUTO_INCREMENT,
EquipeCatégorie VarChar(20),
EquipeJoueurs VarChar(40),
utiId int,
club_basketId int,
primary key (EquipeId),
foreign key (utiId) references utilisateur (utiId),
foreign key (club_basketId) references club_basket (club_basketId)
);
alter table utilisateur
rename column utiAnniversiare to utiAnniversaire;
alter table utilisateur
rename column uitEmail to utiEmail;
alter table utilisateur
drop column utiTel ;
alter table utilisateur
ADD utiTel VarChar(25);
alter table club_basket
ADD club_basketImage VarChar(200);
alter table club_basket
drop column club_basketTel;

drop table utilisateur;
drop table rencontre;
drop table matchs;
drop table equipe;
drop table club_basket;

insert into club_basket ( club_basketNom, club_basketAdresse, club_basketImage )
values ("RBC_Erpent","Pl. Notre Dame de la Paix, 5101 Namur","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0nX_1O7DTVRJmdFthrtgnrbysUqylwYJcNQ&s");
insert into utilisateur(utiNom, utiPrenom, utiTel, utiAnniversaire, utiRôle, utiPassword, utiEmail)
values("Collin","Augustin","0478162923","2007-04-18","Joueur","Tchoupid3laTess","240400@site.asty-moulin.be");
