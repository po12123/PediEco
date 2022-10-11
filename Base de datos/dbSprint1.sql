/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/10/2022 05:09:36                          */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists ENCARGADODEESTABLECIMIENTO;

drop table if exists PRODUCTO;

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   IDCLIENTE            int not null,
   NOMBRES              varchar(80) not null,
   APELLIDOS            varchar(80) not null,
   NUMEROCELULAR        int not null,
   CORREOELECTRONICO    varchar(150) not null,
   CONTRASENA           varchar(50) not null,
   primary key (IDCLIENTE)
);

/*==============================================================*/
/* Table: ENCARGADODEESTABLECIMIENTO                            */
/*==============================================================*/
create table ENCARGADODEESTABLECIMIENTO
(
   IDENCARGADO          int not null,
   NOMBREESTABLECIMIENTO varchar(50) not null,
   DIRECCIONESTABLECIMIENTO varchar(150) not null,
   NOMBREENCARGADO      varchar(50) not null,
   APELLIDOENCARGADO    varchar(50) not null,
   NUMEROCELULARENCARGADO int not null,
   CONTRASENAENCARGADO  varchar(50) not null,
   CORREOELECTRONICOESTABLECIMIENTO varchar(100) not null,
   LOGO                 varchar(1024) not null,
   PERMISO              bool not null,
   DOC                  varchar(1024),
   primary key (IDENCARGADO)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   IDPRODUCTO           int not null,
   IDENCARGADO          int not null,
   NOMBREPRODUCTO       varchar(1024) not null,
   DESCRIPCIONPRODUCTO  varchar(1024) not null,
   TIEMPODISPONIBLE     time not null,
   CANTIDADDEPRODUCTO   int not null,
   PRECIO               float not null,
   IMAGENPRODUCTO       varchar(1024) not null,
   DISPONIBLE           bool not null,
   primary key (IDPRODUCTO)
);
--hola estoy aqui
alter table PRODUCTO add constraint FK_REGISTRA foreign key (IDENCARGADO)
      references ENCARGADODEESTABLECIMIENTO (IDENCARGADO) on delete restrict on update restrict;

