


DROP TABLE IF EXISTS `article_content`;
CREATE TABLE IF NOT EXISTS `article_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title1` varchar(450) DEFAULT NULL,
  `paragraph1` varchar(4500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



INSERT INTO `article_content` (`id`, `title1`, `paragraph1`) VALUES
(1, 'Articlesw1', 'Verified articles catered to provide carers with crucial information about neurodivergencefsdfs');
COMMIT;

