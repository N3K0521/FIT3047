

DROP TABLE IF EXISTS `homepage_content`;
CREATE TABLE IF NOT EXISTS `homepage_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title1` varchar(450) DEFAULT NULL,
  `paragraph1` varchar(4500) DEFAULT NULL,
  `image1` varchar(450) DEFAULT NULL,
  `title2` varchar(450) DEFAULT NULL,
  `paragraph2` varchar(4500) DEFAULT NULL,
  `image2` varchar(450) DEFAULT NULL,
  `title3` varchar(450) DEFAULT NULL,
  `paragraph3` varchar(4500) DEFAULT NULL,
  `title4` varchar(450) DEFAULT NULL,
  `paragraph4` varchar(4500) DEFAULT NULL,
  `image3` varchar(450) DEFAULT NULL,
  `name1` varchar(450) DEFAULT NULL,
  `usertype1` varchar(450) DEFAULT NULL,
  `userdes` varchar(4500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO `homepage_content` (`id`, `title1`, `paragraph1`, `image1`, `title2`, `paragraph2`, `image2`, `title3`, `paragraph3`, `title4`, `paragraph4`, `image3`, `name1`, `usertype1`, `userdes`) VALUES
(1, 'Our mission is to care for carers13', 'Active Hearts, is a Melbourne-based non-profit organisation founded and run solely by Kim Blanshard, a dual carer for a neurodiverse son and a partner with an acquired neurological issue. We are primarily concerned with providing assistance for those involved with neurological disorders, especially to persons caring for neurodiverse people.1', 'hfghf.jpg', 'Our founding2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.2', 'jghjg.jpg', 'Growth & beyond3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.3', 'Our Founder4', '\"Caring for Carers\"4', 'avatar5.jpg', 'Kim51fd', 'Founder & CEO5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.3');
COMMIT;

