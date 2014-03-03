OrangeChat
==========
Simple PHP/Javascript Facebook-like chat widget

How to install
-------------
Run the following code to your database:
```sql
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `chat_lastactivity`;
CREATE TABLE `chat_lastactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

Copy "orangechat" folder to your webpath.

Add the following lines on the HEAD of all the pages that you want to display the chat:
```html
<!-- start orangechat code -->
<link type="text/css" rel="stylesheet" media="all" href="../orangechat/orangecss.php" />
<script type="text/javascript" src="../orangechat/orangejs.php"></script>
<!-- end orangechat code -->

In the "orangechat" folder, configure the "config.inc.php" file.
Also, you may want to edit "integration.php" to make it compatible to your code. Don't do it if you're going to run the demo.

That's all!

Running the example
-----------------
After installing OrangeChat (following the steps above), run the following SQL queries:
```sql
SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '-03:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
DROP TABLE IF EXISTS `sample_friends`;
CREATE TABLE `sample_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `confirmed` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `sample_friends` (`id`, `user1`, `user2`, `confirmed`) VALUES
(1,	1,	2,	's'),
(2,	1,	3,	's');
DROP TABLE IF EXISTS `sample_users`;
CREATE TABLE `sample_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `sample_users` (`id`, `username`, `nome`, `picture`) VALUES
(1,	'admin',	'Administrador',	'admin.jpg'),
(2,	'test',	'Test',	'test.jpg'),
(3,	'other',	'Other',	'other.jpg');

Then open http://yourserver/orangechatpath/sample in two different browsers.