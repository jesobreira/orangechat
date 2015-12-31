OrangeChat
==========
Simple PHP/Javascript Facebook-like chat widget ([online demo](http://orangechat.gopagoda.com))
Based in the chat box by [Anant Garg](http://anantgarg.com)
Integration, themes support and translation support by [Jefrey S. Santos](http://jefrey.ml)

How to install
-------------
1. Run the following code to your database:
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
```
2. Copy "orangechat" folder to your webpath.

3. Add the following lines on the HEAD of all the pages that you want to display the chat:
```html
<!-- start orangechat code -->
<link type="text/css" rel="stylesheet" media="all" href="../orangechat/orangecss.php" />
<script type="text/javascript" src="../orangechat/orangejs.php"></script>
<!-- end orangechat code -->
```
4. In the "orangechat" folder, configure the "config.inc.php" file.
Also, you may want to edit "integration.php" to make it compatible to your code. Don't do it if you're going to run the demo.
Don't worry. Everything is explained.

*That's all!*

Running the example
-----------------
1. After installing OrangeChat (following the steps above), run the following SQL queries:
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
```
2. Then open http://yourserver/orangechatpath/sample in two different browsers.

Translating OrangeChat
--------------------
1. Inside the "orangechat" folder, enter "lang" folder and copy the "en.xml" file to "(your_language_iso_code).xml".
2. Translate the strings in the XML tags. There is just a few. Don't worry!
3. Enable your language in config.inc.php folder.

Creating themes
--------------
1. In the "themes" folder, copy any of the folders and rename it to your theme name.
2. Edit the style.css file as you want.
3. Edit the chat.gif file. It's the icon that will appear on the chat bar.
4. Optionally, edit the loading.gif image. It's the animation that appears while loading the online users list. If this file doesn't exist, the default one, in the "images" folder, will be used.

Files schema
-----------
| File | Description |
| ---- | ----------- |
| index.php | Does nothing, for while. |
| chat.php | Controls the messages log, message sending and reading. |
| chatbar.php | Gets the online users list. |
| common.php | Common variables, includes and functions. |
| config.inc.php | App configuration. |
| integrated_functions.php | More functions that aren't required to edit. |
| integration.php | Functions and variables to integrate OrangeChat to your app. |
| orangecss.php | Controls the stylesheets. |
| orangejs.php | Controls the Javascripts. |
