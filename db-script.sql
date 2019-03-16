CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `statuses` VALUES (1,'Incomplete'),(2,'Complete');

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tasks_statuses_idx` (`status_id`),
  CONSTRAINT `fk_tasks_statuses` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `tasks` VALUES (1,'admin','admin@example.com','Some quick example text to build on the card title and make up the bulk of the card\'s content.',2),(2,'guest','mr.bob@example.com','Some quick example text to build on the card title and make up the bulk of the card\'s content.',1),(3,'user','user@example.com','Some quick example text to build on the card title and make up the bulk of the card\'s content.',1),(4,'qwerty','ytrewq@example.com','Some quick example text to build on the card title and make up the bulk of the card\'s content.',1),(5,'test','test@example.com','Some quick example text to build on the card title and make up the bulk of the card\'s content.',1),(6,'ace','the_best@example.com','Some quick example text to build on the card title and make up the bulk of the card\'s content.',2);

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` VALUES (1,'admin','$2y$10$I3jqfm5N/Q0Ii/mmApnq2OOpZEDOHvS39dVlUw7b3dyR3btGpiNk2');