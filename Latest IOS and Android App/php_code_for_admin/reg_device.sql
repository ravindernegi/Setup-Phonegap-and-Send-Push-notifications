

CREATE TABLE IF NOT EXISTS `reg_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regId` text NOT NULL,
  `date_curr` datetime NOT NULL,
  `deviceType` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

