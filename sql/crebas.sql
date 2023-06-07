use testdomi;
drop table if exists plat;
drop table if exists categorie;

create table categorie (
	idC			integer 	primary key,
    libelleC	varchar(50) unique not null
);
create table plat (
	idP 		integer 	primary key,
	idC			integer,
    libelleP	varchar(50) unique not null,
    prixP		integer		not null,    
    foreign key(idC) references categorie(idc)
);

insert into categorie (idc, libellec) values 
	(1,'entrée'),
    (2,'plat'),
    (3,'fromage'),
    (4,'dessert');
insert into plat (idP, idC, libelleP, prixP) values
	(1,1,'Artichaut nature',800),
    (2,1,'Oeufs mimosa',1150),
    (3,1,'Soufflé au fromage',950),
    (4,2,'Pâtes sauce bolognaise',1200),
    (5,2,'Raviolis japonais',1450),
    (6,2,'Osso buco de dinde',1850),
    (7,3,'Camenbert',500),
    (8,3,'Kiri',500),
    (9,4,'Mini gâteau ballon de football',999),
    (10,4,'Smoothie aux fruits',850),
    (11,4,'Crême dessert chocolat',799);
    
select * from categorie;
select * from plat;
SELECT idP, libelleP, prixP FROM plat;
SELECT idP, libelleP, prixP, p.idC, libelleC FROM plat p, categorie c where p.idC = 1 and p.idC = c.idC