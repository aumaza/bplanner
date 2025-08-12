/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.5.29-MariaDB, for Linux (x86_64)
--
-- Host: slackzone.ddns.net    Database: bplanner
-- ------------------------------------------------------
-- Server version	10.5.29-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bp_clients`
--

DROP TABLE IF EXISTS `bp_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(200) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `localidad` varchar(300) NOT NULL,
  `provincia` varchar(300) NOT NULL,
  `pais` varchar(300) NOT NULL,
  `cod_postal` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `cuit_cuil` varchar(11) NOT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `file_path` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_clients`
--

LOCK TABLES `bp_clients` WRITE;
/*!40000 ALTER TABLE `bp_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_countries`
--

DROP TABLE IF EXISTS `bp_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spanish_name` varchar(100) NOT NULL,
  `english_name` varchar(100) NOT NULL,
  `iso_2` varchar(2) NOT NULL,
  `iso_3` varchar(3) NOT NULL,
  `phone_prefix` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_countries`
--

LOCK TABLES `bp_countries` WRITE;
/*!40000 ALTER TABLE `bp_countries` DISABLE KEYS */;
INSERT INTO `bp_countries` VALUES (1,'AfganistÃ¡n','Afghanistan','AF','AFG','93'),(2,'Albania','Albania','AL','ALB','355'),(3,'Alemania','Germany','DE','DEU','49'),(4,'Andorra','Andorra','AD','AND','376'),(5,'Angola','Angola','AO','AGO','244'),(6,'Anguila','Anguilla','AI','AIA','1 264'),(7,'AntÃ¡rtida','Antarctica','AQ','ATA','672'),(8,'Antigua y Barbuda','Antigua and Barbuda','AG','ATG','1 268'),(9,'Arabia Saudita','Saudi Arabia','SA','SAU','966'),(10,'Argelia','Algeria','DZ','DZA','213'),(11,'Argentina','Argentina','AR','ARG','54'),(12,'Armenia','Armenia','AM','ARM','374'),(13,'Aruba','Aruba','AW','ABW','297'),(14,'Australia','Australia','AU','AUS','61'),(15,'Austria','Austria','AT','AUT','43'),(16,'AzerbaiyÃ¡n','Azerbaijan','AZ','AZE','994'),(17,'BÃ©lgica','Belgium','BE','BEL','32'),(18,'Bahamas','Bahamas','BS','BHS','1 242'),(19,'Bahrein','Bahrain','BH','BHR','973'),(20,'Bangladesh','Bangladesh','BD','BGD','880'),(21,'Barbados','Barbados','BB','BRB','1 246'),(22,'Belice','Belize','BZ','BLZ','501'),(23,'BenÃ­n','Benin','BJ','BEN','229'),(24,'BhutÃ¡n','Bhutan','BT','BTN','975'),(25,'Bielorrusia','Belarus','BY','BLR','375'),(26,'Birmania','Myanmar','MM','MMR','95'),(27,'Bolivia','Bolivia','BO','BOL','591'),(28,'Bosnia y Herzegovina','Bosnia and Herzegovina','BA','BIH','387'),(29,'Botsuana','Botswana','BW','BWA','267'),(30,'Brasil','Brazil','BR','BRA','55'),(31,'BrunÃ©i','Brunei','BN','BRN','673'),(32,'Bulgaria','Bulgaria','BG','BGR','359'),(33,'Burkina Faso','Burkina Faso','BF','BFA','226'),(34,'Burundi','Burundi','BI','BDI','257'),(35,'Cabo Verde','Cape Verde','CV','CPV','238'),(36,'Camboya','Cambodia','KH','KHM','855'),(37,'CamerÃºn','Cameroon','CM','CMR','237'),(38,'CanadÃ¡','Canada','CA','CAN','1'),(39,'Chad','Chad','TD','TCD','235'),(40,'Chile','Chile','CL','CHL','56'),(41,'China','China','CN','CHN','86'),(42,'Chipre','Cyprus','CY','CYP','357'),(43,'Ciudad del Vaticano','Vatican City State','VA','VAT','39'),(44,'Colombia','Colombia','CO','COL','57'),(45,'Comoras','Comoros','KM','COM','269'),(46,'RepÃºblica del Congo','Republic of the Congo','CG','COG','242'),(47,'RepÃºblica DemocrÃ¡tica del Congo','Democratic Republic of the Congo','CD','COD','243'),(48,'Corea del Norte','North Korea','KP','PRK','850'),(49,'Corea del Sur','South Korea','KR','KOR','82'),(50,'Costa de Marfil','Ivory Coast','CI','CIV','225'),(51,'Costa Rica','Costa Rica','CR','CRI','506'),(52,'Croacia','Croatia','HR','HRV','385'),(53,'Cuba','Cuba','CU','CUB','53'),(54,'Curazao','CuraÃ§ao','CW','CWU','5999'),(55,'Dinamarca','Denmark','DK','DNK','45'),(56,'Dominica','Dominica','DM','DMA','1 767'),(57,'Ecuador','Ecuador','EC','ECU','593'),(58,'Egipto','Egypt','EG','EGY','20'),(59,'El Salvador','El Salvador','SV','SLV','503'),(60,'Emiratos Ãrabes Unidos','United Arab Emirates','AE','ARE','971'),(61,'Eritrea','Eritrea','ER','ERI','291'),(62,'Eslovaquia','Slovakia','SK','SVK','421'),(63,'Eslovenia','Slovenia','SI','SVN','386'),(64,'EspaÃ±a','Spain','ES','ESP','34'),(65,'Estados Unidos de AmÃ©rica','United States of America','US','USA','1'),(66,'Estonia','Estonia','EE','EST','372'),(67,'EtiopÃ­a','Ethiopia','ET','ETH','251'),(68,'Filipinas','Philippines','PH','PHL','63'),(69,'Finlandia','Finland','FI','FIN','358'),(70,'Fiyi','Fiji','FJ','FJI','679'),(71,'Francia','France','FR','FRA','33'),(72,'GabÃ³n','Gabon','GA','GAB','241'),(73,'Gambia','Gambia','GM','GMB','220'),(74,'Georgia','Georgia','GE','GEO','995'),(75,'Ghana','Ghana','GH','GHA','233'),(76,'Gibraltar','Gibraltar','GI','GIB','350'),(77,'Granada','Grenada','GD','GRD','1 473'),(78,'Grecia','Greece','GR','GRC','30'),(79,'Groenlandia','Greenland','GL','GRL','299'),(80,'Guadalupe','Guadeloupe','GP','GLP','590'),(81,'Guam','Guam','GU','GUM','1 671'),(82,'Guatemala','Guatemala','GT','GTM','502'),(83,'Guayana Francesa','French Guiana','GF','GUF','594'),(84,'Guernsey','Guernsey','GG','GGY','44'),(85,'Guinea','Guinea','GN','GIN','224'),(86,'Guinea Ecuatorial','Equatorial Guinea','GQ','GNQ','240'),(87,'Guinea-Bissau','Guinea-Bissau','GW','GNB','245'),(88,'Guyana','Guyana','GY','GUY','592'),(89,'HaitÃ­','Haiti','HT','HTI','509'),(90,'Honduras','Honduras','HN','HND','504'),(91,'Hong kong','Hong Kong','HK','HKG','852'),(92,'HungrÃ­a','Hungary','HU','HUN','36'),(93,'India','India','IN','IND','91'),(94,'Indonesia','Indonesia','ID','IDN','62'),(95,'IrÃ¡n','Iran','IR','IRN','98'),(96,'Irak','Iraq','IQ','IRQ','964'),(97,'Irlanda','Ireland','IE','IRL','353'),(98,'Isla Bouvet','Bouvet Island','BV','BVT',''),(99,'Isla de Man','Isle of Man','IM','IMN','44'),(100,'Isla de Navidad','Christmas Island','CX','CXR','61'),(101,'Isla Norfolk','Norfolk Island','NF','NFK','672'),(102,'Islandia','Iceland','IS','ISL','354'),(103,'Islas Bermudas','Bermuda Islands','BM','BMU','1 441'),(104,'Islas CaimÃ¡n','Cayman Islands','KY','CYM','1 345'),(105,'Islas Cocos (Keeling)','Cocos (Keeling) Islands','CC','CCK','61'),(106,'Islas Cook','Cook Islands','CK','COK','682'),(107,'Islas de Ã…land','Ã…land Islands','AX','ALA','358'),(108,'Islas Feroe','Faroe Islands','FO','FRO','298'),(109,'Islas Georgias del Sur y Sandwich del Sur','South Georgia and the South Sandwich Islands','GS','SGS','500'),(110,'Islas Heard y McDonald','Heard Island and McDonald Islands','HM','HMD',''),(111,'Islas Maldivas','Maldives','MV','MDV','960'),(112,'Islas Malvinas','Falkland Islands (Malvinas)','FK','FLK','500'),(113,'Islas Marianas del Norte','Northern Mariana Islands','MP','MNP','1 670'),(114,'Islas Marshall','Marshall Islands','MH','MHL','692'),(115,'Islas Pitcairn','Pitcairn Islands','PN','PCN','870'),(116,'Islas SalomÃ³n','Solomon Islands','SB','SLB','677'),(117,'Islas Turcas y Caicos','Turks and Caicos Islands','TC','TCA','1 649'),(118,'Islas Ultramarinas Menores de Estados Unidos','United States Minor Outlying Islands','UM','UMI','246'),(119,'Islas VÃ­rgenes BritÃ¡nicas','Virgin Islands','VG','VGB','1 284'),(120,'Islas VÃ­rgenes de los Estados Unidos','United States Virgin Islands','VI','VIR','1 340'),(121,'Israel','Israel','IL','ISR','972'),(122,'Italia','Italy','IT','ITA','39'),(123,'Jamaica','Jamaica','JM','JAM','1 876'),(124,'JapÃ³n','Japan','JP','JPN','81'),(125,'Jersey','Jersey','JE','JEY','44'),(126,'Jordania','Jordan','JO','JOR','962'),(127,'KazajistÃ¡n','Kazakhstan','KZ','KAZ','7'),(128,'Kenia','Kenya','KE','KEN','254'),(129,'KirguistÃ¡n','Kyrgyzstan','KG','KGZ','996'),(130,'Kiribati','Kiribati','KI','KIR','686'),(131,'Kuwait','Kuwait','KW','KWT','965'),(132,'LÃ­bano','Lebanon','LB','LBN','961'),(133,'Laos','Laos','LA','LAO','856'),(134,'Lesoto','Lesotho','LS','LSO','266'),(135,'Letonia','Latvia','LV','LVA','371'),(136,'Liberia','Liberia','LR','LBR','231'),(137,'Libia','Libya','LY','LBY','218'),(138,'Liechtenstein','Liechtenstein','LI','LIE','423'),(139,'Lituania','Lithuania','LT','LTU','370'),(140,'Luxemburgo','Luxembourg','LU','LUX','352'),(141,'MÃ©xico','Mexico','MX','MEX','52'),(142,'MÃ³naco','Monaco','MC','MCO','377'),(143,'Macao','Macao','MO','MAC','853'),(144,'MacedÃ´nia','Macedonia','MK','MKD','389'),(145,'Madagascar','Madagascar','MG','MDG','261'),(146,'Malasia','Malaysia','MY','MYS','60'),(147,'Malawi','Malawi','MW','MWI','265'),(148,'Mali','Mali','ML','MLI','223'),(149,'Malta','Malta','MT','MLT','356'),(150,'Marruecos','Morocco','MA','MAR','212'),(151,'Martinica','Martinique','MQ','MTQ','596'),(152,'Mauricio','Mauritius','MU','MUS','230'),(153,'Mauritania','Mauritania','MR','MRT','222'),(154,'Mayotte','Mayotte','YT','MYT','262'),(155,'Micronesia','Estados Federados de','FM','FSM','691'),(156,'Moldavia','Moldova','MD','MDA','373'),(157,'Mongolia','Mongolia','MN','MNG','976'),(158,'Montenegro','Montenegro','ME','MNE','382'),(159,'Montserrat','Montserrat','MS','MSR','1 664'),(160,'Mozambique','Mozambique','MZ','MOZ','258'),(161,'Namibia','Namibia','NA','NAM','264'),(162,'Nauru','Nauru','NR','NRU','674'),(163,'Nepal','Nepal','NP','NPL','977'),(164,'Nicaragua','Nicaragua','NI','NIC','505'),(165,'Niger','Niger','NE','NER','227'),(166,'Nigeria','Nigeria','NG','NGA','234'),(167,'Niue','Niue','NU','NIU','683'),(168,'Noruega','Norway','NO','NOR','47'),(169,'Nueva Caledonia','New Caledonia','NC','NCL','687'),(170,'Nueva Zelanda','New Zealand','NZ','NZL','64'),(171,'OmÃ¡n','Oman','OM','OMN','968'),(172,'PaÃ­ses Bajos','Netherlands','NL','NLD','31'),(173,'PakistÃ¡n','Pakistan','PK','PAK','92'),(174,'Palau','Palau','PW','PLW','680'),(175,'Palestina','Palestine','PS','PSE','970'),(176,'PanamÃ¡','Panama','PA','PAN','507'),(177,'PapÃºa Nueva Guinea','Papua New Guinea','PG','PNG','675'),(178,'Paraguay','Paraguay','PY','PRY','595'),(179,'PerÃº','Peru','PE','PER','51'),(180,'Polinesia Francesa','French Polynesia','PF','PYF','689'),(181,'Polonia','Poland','PL','POL','48'),(182,'Portugal','Portugal','PT','PRT','351'),(183,'Puerto Rico','Puerto Rico','PR','PRI','1'),(184,'Qatar','Qatar','QA','QAT','974'),(185,'Reino Unido','United Kingdom','GB','GBR','44'),(186,'RepÃºblica Centroafricana','Central African Republic','CF','CAF','236'),(187,'RepÃºblica Checa','Czech Republic','CZ','CZE','420'),(188,'RepÃºblica Dominicana','Dominican Republic','DO','DOM','1 809'),(189,'RepÃºblica de SudÃ¡n del Sur','South Sudan','SS','SSD','211'),(190,'ReuniÃ³n','RÃ©union','RE','REU','262'),(191,'Ruanda','Rwanda','RW','RWA','250'),(192,'RumanÃ­a','Romania','RO','ROU','40'),(193,'Rusia','Russia','RU','RUS','7'),(194,'Sahara Occidental','Western Sahara','EH','ESH','212'),(195,'Samoa','Samoa','WS','WSM','685'),(196,'Samoa Americana','American Samoa','AS','ASM','1 684'),(197,'San BartolomÃ©','Saint BarthÃ©lemy','BL','BLM','590'),(198,'San CristÃ³bal y Nieves','Saint Kitts and Nevis','KN','KNA','1 869'),(199,'San Marino','San Marino','SM','SMR','378'),(200,'San MartÃ­n (Francia)','Saint Martin (French part)','MF','MAF','1 599'),(201,'San Pedro y MiquelÃ³n','Saint Pierre and Miquelon','PM','SPM','508'),(202,'San Vicente y las Granadinas','Saint Vincent and the Grenadines','VC','VCT','1 784'),(203,'Santa Elena','AscensiÃ³n y TristÃ¡n de AcuÃ±a','SH','SHN','290'),(204,'Santa LucÃ­a','Saint Lucia','LC','LCA','1 758'),(205,'Santo TomÃ© y PrÃ­ncipe','Sao Tome and Principe','ST','STP','239'),(206,'Senegal','Senegal','SN','SEN','221'),(207,'Serbia','Serbia','RS','SRB','381'),(208,'Seychelles','Seychelles','SC','SYC','248'),(209,'Sierra Leona','Sierra Leone','SL','SLE','232'),(210,'Singapur','Singapore','SG','SGP','65'),(211,'Sint Maarten','Sint Maarten','SX','SMX','1 721'),(212,'Siria','Syria','SY','SYR','963'),(213,'Somalia','Somalia','SO','SOM','252'),(214,'Sri lanka','Sri Lanka','LK','LKA','94'),(215,'SudÃ¡frica','South Africa','ZA','ZAF','27'),(216,'SudÃ¡n','Sudan','SD','SDN','249'),(217,'Suecia','Sweden','SE','SWE','46'),(218,'Suiza','Switzerland','CH','CHE','41'),(219,'SurinÃ¡m','Suriname','SR','SUR','597'),(220,'Svalbard y Jan Mayen','Svalbard and Jan Mayen','SJ','SJM','47'),(221,'Swazilandia','Swaziland','SZ','SWZ','268'),(222,'TayikistÃ¡n','Tajikistan','TJ','TJK','992'),(223,'Tailandia','Thailand','TH','THA','66'),(224,'TaiwÃ¡n','Taiwan','TW','TWN','886'),(225,'Tanzania','Tanzania','TZ','TZA','255'),(226,'Territorio BritÃ¡nico del OcÃ©ano Ãndico','British Indian Ocean Territory','IO','IOT','246'),(227,'Territorios Australes y AntÃ¡rticas Franceses','French Southern Territories','TF','ATF',''),(228,'Timor Oriental','East Timor','TL','TLS','670'),(229,'Togo','Togo','TG','TGO','228'),(230,'Tokelau','Tokelau','TK','TKL','690'),(231,'Tonga','Tonga','TO','TON','676'),(232,'Trinidad y Tobago','Trinidad and Tobago','TT','TTO','1 868'),(233,'Tunez','Tunisia','TN','TUN','216'),(234,'TurkmenistÃ¡n','Turkmenistan','TM','TKM','993'),(235,'TurquÃ­a','Turkey','TR','TUR','90'),(236,'Tuvalu','Tuvalu','TV','TUV','688'),(237,'Ucrania','Ukraine','UA','UKR','380'),(238,'Uganda','Uganda','UG','UGA','256'),(239,'Uruguay','Uruguay','UY','URY','598'),(240,'UzbekistÃ¡n','Uzbekistan','UZ','UZB','998'),(241,'Vanuatu','Vanuatu','VU','VUT','678'),(242,'Venezuela','Venezuela','VE','VEN','58'),(243,'Vietnam','Vietnam','VN','VNM','84'),(244,'Wallis y Futuna','Wallis and Futuna','WF','WLF','681'),(245,'Yemen','Yemen','YE','YEM','967'),(246,'Yibuti','Djibouti','DJ','DJI','253'),(247,'Zambia','Zambia','ZM','ZMB','260'),(248,'Zimbabue','Zimbabwe','ZW','ZWE','263');
/*!40000 ALTER TABLE `bp_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_hours`
--

DROP TABLE IF EXISTS `bp_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `cant_hour` varchar(3) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `ticket_number` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_hours`
--

LOCK TABLES `bp_hours` WRITE;
/*!40000 ALTER TABLE `bp_hours` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_pay_hours`
--

DROP TABLE IF EXISTS `bp_pay_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_pay_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `cant_total_hours` varchar(4) NOT NULL,
  `total_amount` float(8,2) NOT NULL,
  `month` varchar(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `pay_status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_pay_hours`
--

LOCK TABLES `bp_pay_hours` WRITE;
/*!40000 ALTER TABLE `bp_pay_hours` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_pay_hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_projects`
--

DROP TABLE IF EXISTS `bp_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(300) NOT NULL,
  `client` varchar(300) NOT NULL,
  `project_leader` varchar(150) NOT NULL,
  `functional` varchar(150) NOT NULL,
  `technologies` varchar(2000) NOT NULL,
  `requeriments` text NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_projects`
--

LOCK TABLES `bp_projects` WRITE;
/*!40000 ALTER TABLE `bp_projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_teams`
--

DROP TABLE IF EXISTS `bp_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `member` varchar(150) NOT NULL,
  `function` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_teams`
--

LOCK TABLES `bp_teams` WRITE;
/*!40000 ALTER TABLE `bp_teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_ticket`
--

DROP TABLE IF EXISTS `bp_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_ticket`
--

LOCK TABLES `bp_ticket` WRITE;
/*!40000 ALTER TABLE `bp_ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_ticket_track`
--

DROP TABLE IF EXISTS `bp_ticket_track`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_ticket_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` varchar(6) NOT NULL,
  `f_commit` date NOT NULL,
  `cant_hours` float(8,2) NOT NULL,
  `amount` float NOT NULL,
  `commit` varchar(600) NOT NULL,
  `files_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_ticket_track`
--

LOCK TABLES `bp_ticket_track` WRITE;
/*!40000 ALTER TABLE `bp_ticket_track` DISABLE KEYS */;
/*!40000 ALTER TABLE `bp_ticket_track` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bp_usuarios`
--

DROP TABLE IF EXISTS `bp_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bp_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(74) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `celular` varchar(15) NOT NULL,
  `functions` set('Developer','Sys_Admin','Functional','Tester','Designer','Data_Analitics') NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bp_usuarios`
--

LOCK TABLES `bp_usuarios` WRITE;
/*!40000 ALTER TABLE `bp_usuarios` DISABLE KEYS */;
INSERT INTO `bp_usuarios` VALUES (1,'Administrador','root@gmail.com','$2y$10$gRLxcx9Ry5iKjstsRuEqpOu9PtdFgADjqhDMgRlF.zwwJU1pTdYha','root@gmail.com','1161669201','Sys_Admin','../core/avatars/meeting-chair.png',1);
/*!40000 ALTER TABLE `bp_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-11 18:15:25
