/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     29/01/2019 19:23:39                          */
/*==============================================================*/


drop table if exists DATOS;

/*==============================================================*/
/* Table: DATOS                                                 */
/*==============================================================*/
create table DATOS
(
   IDDATO               int not null,
   AREA                 varchar(30) not null,
   CIUDAD				varchar(30) not null,
   PROVINCIA            varchar(30) not null,
   REGION               varchar(30) not null,
   ZONA                 int not null,
   VIVIENDA				int not null,
   PERIODO              varchar(30) not null,
   TIPOCASA             varchar(30) not null,
   JEFE_HOGAR           varchar(30) not null,
   primary key (IDDATO)
);

