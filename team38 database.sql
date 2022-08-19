

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `postTime` datetime NOT NULL,
  `comments` varchar(45000) DEFAULT NULL,
  `hasRead` int(11) DEFAULT '0',
  `approved` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `comments_fk1_idx` (`user_id`),
  KEY `comments_fk2_idx` (`forum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;


INSERT INTO `comments` (`id`, `forum_id`, `user_id`, `postTime`, `comments`, `hasRead`, `approved`) VALUES
(1, 3, 13, '2022-04-12 12:58:18', 'bbbb', 1, 0),
(2, 3, 13, '2022-04-12 13:15:01', 'he Time class constructor can take any parameter that the internal DateTime PHP class can. When passing a number or numeric string, it will be interpreted as a UNIX timestamp.\r\n\r\nIn test cases you can mock out now() using setTestNow():', 1, 0),
(8, 4, 13, '2022-04-13 12:47:52', 'cscscs', 1, 1),
(10, 1, 13, '2022-04-13 16:28:54', 'ccc', 1, 0),
(11, 7, 13, '2022-04-13 16:29:01', 'cs', 1, 0),
(12, 4, 13, '2022-04-29 20:04:33', 'fdsfsdfs', 1, 0),
(13, 1, 13, '2022-04-30 14:59:06', ' bnvbnvb', 1, 0),
(14, 1, 13, '2022-04-30 21:09:57', 'fdsfs', 1, 0),
(15, 1, 13, '2022-04-30 21:13:45', 'cccc', 1, 0),
(16, 1, 13, '2022-04-30 21:15:21', 'gfgfdgdfg', 1, 0),
(17, 1, 13, '2022-04-30 21:18:20', 'bbbbbbbbbbbbbb', 1, 0),
(19, 1, 18, '2022-04-30 21:28:54', 'yyyyyyyyyyyyyyyyyyyyyyyyy', 1, 0),
(20, 2, 18, '2022-05-02 23:41:46', 'fsdfsdfsd', 0, 1),
(22, 7, 18, '2022-05-04 15:09:29', 'dsdsds', 0, 1);


DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(4500) DEFAULT NULL,
  `postTime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `approved` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `forums_fk1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;



INSERT INTO `forums` (`id`, `title`, `content`, `postTime`, `user_id`, `approved`) VALUES
(1, 'avv', '', '2022-04-11 13:58:56', 13, 0),
(2, 'A Bootstrap 5 starter layout for your next blog homepage', 'oremconsectetur adipisicing elit. Reiciendis aliquid ', '2022-04-11 13:59:13', 13, 1),
(3, 'or sit amet, consecte', 'xsxssd', '2022-04-11 14:09:02', 13, 0),
(4, 'ac', 'ccc', '2022-04-11 10:12:21', 13, 0),
(7, 'gfd', 'ggg', '2022-04-13 16:19:24', 13, 1),
(8, 'fds', 'fds', '2022-04-28 16:41:00', 18, 1),
(9, 'ccc', '12121', '2022-05-04 15:04:38', 18, 0);

CREATE TABLE `contactus_content` (
    `id` int(11) NOT NULL,
    `phone` varchar(255) DEFAULT NULL,
    `address` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `openinghours` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus_content`
--

INSERT INTO `contactus_content` (`id`, `phone`, `address`, `email`, `openinghours`) VALUES
    (1, '0412 345 679', '10 Monash street clayton 31111', 'activehearts@activehearts.com', 'Monday: 9:00am - 9:00pm\r\nTuesday: 9:00am - 9:00pm\r\nWednesday: 9:00am - 9:00pm\r\nThursday: 9:00am - 9:00pm\r\nSaturday: 9:00am - 9:00pm\r\nSunday: Closed');



ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_fk2` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `forums`
  ADD CONSTRAINT `forums_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

