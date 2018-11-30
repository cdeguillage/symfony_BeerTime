INSERT INTO `beertime`.`t_user` (`username`, `password`, `email`, `roles`, `connected`) VALUES ('admin', 'admin', 'admin@beertime.fr', 'admin,user, placer', '0');
INSERT INTO `beertime`.`t_user` (`username`, `password`, `email`, `roles`, `connected`) VALUES ('cdg', 'cdg', 'cdg@beertime.fr', 'user,placer', '0');
INSERT INTO `beertime`.`t_user` (`username`, `password`, `email`, `roles`, `connected`) VALUES ('buveur', 'buveur', 'buveur@beertime.fr', 'user', '0');

INSERT INTO `beertime`.`t_address` (`name`, `street`, `zipcode`, `town`, `country`) VALUES ('Place of beer', '45, rue machin', '59000', 'LILLE', 'FRANCE');
INSERT INTO `beertime`.`t_address` (`name`, `street`, `zipcode`, `town`, `country`) VALUES ('The festbeer', 'Champ d\'à côté', '75542', 'PARIS', 'FRANCE');
INSERT INTO `beertime`.`t_address` (`name`, `street`, `zipcode`, `town`, `country`) VALUES ('Event of beer', 'Là-bas, pas bien', '98000', 'AILLEURS', 'FRANCE');

INSERT INTO `beertime`.`t_tags` (`tags`, `icon`) VALUES ('beerseau', 'lienurlavatar_seau');
INSERT INTO `beertime`.`t_tags` (`tags`, `icon`) VALUES ('beerbassine', 'lienurlavatar_bassine');
INSERT INTO `beertime`.`t_tags` (`tags`, `icon`) VALUES ('beeraquarium', 'lienurlavatar_aquarium');

INSERT INTO `beertime`.`t_event` (`name`, `description`, `dateevent_start`, `dateevent_end`, `price`, `idaddress`, `idusercreate`) VALUES ('Place of beer', 'Place of beer description', '2018-01-01', '2018-01-01', '27', '1', '1');
INSERT INTO `beertime`.`t_event` (`name`, `description`, `dateevent_start`, `dateevent_end`, `price`, `idaddress`, `idusercreate`) VALUES ('The festbeer', 'The festbeer description', '2018-11-01', '2018-12-31', '0', '2', '2');
INSERT INTO `beertime`.`t_event` (`name`, `description`, `dateevent_start`, `dateevent_end`, `price`, `idaddress`, `idusercreate`) VALUES ('Event of beer', 'Event of beer description', '2018-12-15', '2015-12-31', '237', '3', '2');

INSERT INTO `beertime`.`t_program` (`idevent`, `title`, `description`, `timeperiod_start`, `timeperiod_end`, `price`) VALUES ('1', 'Place of beer H1', 'Place of beer - baptème', '17', '20', '10');
INSERT INTO `beertime`.`t_program` (`idevent`, `title`, `description`, `timeperiod_start`, `timeperiod_end`, `price`) VALUES ('1', 'Place of beer H2', 'Place of beer - Yeeaaahhhh', '20', '8', '15');
INSERT INTO `beertime`.`t_program` (`idevent`, `title`, `description`, `timeperiod_start`, `timeperiod_end`, `price`) VALUES ('2', 'The festbeer', 'The festbeer', '11', '23', '0');
INSERT INTO `beertime`.`t_program` (`idevent`, `title`, `description`, `timeperiod_start`, `timeperiod_end`, `price`) VALUES ('3', 'Event of beer', 'Event of beer', '18', '8', '0');

INSERT INTO `beertime`.`t_participant` (`idevent`, `iduser`, `idtag`, `bookingnumber`) VALUES ('1', '1', '1', '456131456');
INSERT INTO `beertime`.`t_participant` (`idevent`, `iduser`, `idtag`, `bookingnumber`) VALUES ('2', '1', '1', '115615645');
INSERT INTO `beertime`.`t_participant` (`idevent`, `iduser`, `idtag`, `bookingnumber`) VALUES ('3', '1', '1', '131313115');
INSERT INTO `beertime`.`t_participant` (`idevent`, `iduser`, `idtag`, `bookingnumber`) VALUES ('1', '2', '2', '151561561');
INSERT INTO `beertime`.`t_participant` (`idevent`, `iduser`, `idtag`, `bookingnumber`) VALUES ('3', '3', '3', '987941548');
INSERT INTO `beertime`.`t_participant` (`idevent`, `iduser`, `idtag`, `bookingnumber`) VALUES ('2', '3', '3', '547855211');
