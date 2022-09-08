create database guia2;

use guia2;

create table producto(
pid int(3) auto_increment,
pdesc varchar (30),
pprecio float(5.2),
primary key (pid)
);

insert into producto (pdesc, pprecio) values ('notebook' , 5000.25) ,('teclado',3500) ,('mouse',1500.99);

create table rol(
rolid int (1) auto_increment,
rolDesc varchar (20),
primary key (rolid)
);

insert into rol (rolDesc) values ('admin'), ('empleado') ,('profesor');

create table usuario(
usuid int (2) auto_increment,
usunom varchar (20),
usucontra varchar (20),
usurol int (1),
primary key (usuid),
foreign key (usurol) references rol(rolid)
);

insert into usuario (usunom, usucontra, usurol) values ('Alfa','1234', 1) ,('Beta','1234',2) ,('Gama','1234',3);

create table mensajes(
menid int auto_increment,
menemisor int (2),
menasunto varchar (80),
mentexto varchar (255),
menfecha varchar (20),
menhora varchar (20),
primary key (menid),
foreign key (menemisor) references usuario(usuid)
);

insert into mensajes (menemisor,menasunto,mentexto,menfecha,menhora) values (2,'¿CÓMO FUNCIONA NISSAN e-POWER?','Los vehículos equipados con la motorización eléctrica Nissan e-POWER son impulsados exclusivamente por su motor de alto rendimiento.','07/09/2022','22:52:45'),
(2,'¿CÓMO FUNCIONA NISSAN e-POWER?','Los vehículos equipados con la motorización eléctrica Nissan e-POWER son impulsados exclusivamente por su motor de alto rendimiento.','07/09/2022','22:52:45'),
(2,'¿CÓMO FUNCIONA NISSAN e-POWER?','Los vehículos equipados con la motorización eléctrica Nissan e-POWER son impulsados exclusivamente por su motor de alto rendimiento.','07/09/2022','22:52:45');


