drop table if exists platos;
create table platos (
    id int unsigned auto_increment primary key,
    nombre varchar(64) default '',
    precio decimal(6,2) default 0,
    compuesto text null
);

insert into platos values ('','Lomo Saltado',15,'carne y papas');
insert into platos values ('','Salchipapa',10,'salchichas, papa');
insert into platos values ('','Caldo de pollo',15,'pollo huevo, fideos');