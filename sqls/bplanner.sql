-- Host: localhost    Database: bplanner
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-0+deb10u1

CREATE TABLE `bp_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) binary NOT NULL,
  `user` varchar(100) binary NOT NULL,
  `password` varchar(74) binary NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(35) NOT NULL,
  `functions` set('Developer','Sys_Admin','Functional','Tester','Designer','Data_Analitics') NOT NULL,
  `avatar` varchar(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bp_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_ticket` varchar(6) NOT NULL,
  `f_income` date NOT NULL,
  `module` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `request` varchar(300) NOT NULL,
  `f_from` date NOT NULL,
  `f_to` date NOT NULL,
  `status` enum('Ingresado','Desarrollo','Testing','Rechazado','Aprobado') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
 
CREATE TABLE `bp_ticket_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` varchar(6) NOT NULL,
  `f_commit` date NOT NULL,
  `cant_hours` float(8,2) NOT NULL,
  `amount` float(8.2) NOT NULL,
  `commit` varchar(600) NOT NULL,
  `files_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

