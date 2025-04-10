CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    `model` char(30) DEFAULT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
      LOCK TABLES `cars` WRITE;
      INSERT INTO `cars` VALUES (0,'Corona'),(0,'RAV-4'),(0,'CRV'),(0,'HRV'),(0,'Demio'),(0,'CX-7');