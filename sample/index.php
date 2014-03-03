<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>OrangeChat test</title>
	<style type="text/css">
		body {
			font-family: Arial;
		}
		.button {
			-moz-box-shadow:inset -3px -3px 9px -1px #fce2c1;
			-webkit-box-shadow:inset -3px -3px 9px -1px #fce2c1;
			box-shadow:inset -3px -3px 9px -1px #fce2c1;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffc477), color-stop(1, #fb9e25) );
			background:-moz-linear-gradient( center top, #ffc477 5%, #fb9e25 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc477', endColorstr='#fb9e25');
			background-color:#ffc477;
			-webkit-border-top-left-radius:9px;
			-moz-border-radius-topleft:9px;
			border-top-left-radius:9px;
			-webkit-border-top-right-radius:9px;
			-moz-border-radius-topright:9px;
			border-top-right-radius:9px;
			-webkit-border-bottom-right-radius:9px;
			-moz-border-radius-bottomright:9px;
			border-bottom-right-radius:9px;
			-webkit-border-bottom-left-radius:9px;
			-moz-border-radius-bottomleft:9px;
			border-bottom-left-radius:9px;
			text-indent:0;
			border:1px solid #eeb44f;
			display:inline-block;
			color:#ffffff;
			font-family:Arial;
			font-size:18px;
			font-weight:bold;
			font-style:normal;
			height:56px;
			line-height:56px;
			width:145px;
			text-decoration:none;
			text-align:center;
			text-shadow:1px 1px 1px #cc9f52;
		}
		.button:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #fb9e25), color-stop(1, #ffc477) );
			background:-moz-linear-gradient( center top, #fb9e25 5%, #ffc477 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fb9e25', endColorstr='#ffc477');
			background-color:#fb9e25;
		}.button:active {
			position:relative;
			top:1px;
		}
	</style>
</head>
<body>
<p>Test each user in a separated browser (or use anonymous window/private browsing).</p>
<a class="button" href="samplea.php">User 1</a>
<a class="button" href="sampleb.php">User 2</a>
<a class="button" href="samplec.php">User 3</a>
<hr size="1" color="#ccc" />
<p>Run this query in order to install the sample tables:</p>
<pre>SET NAMES utf8;
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


DROP TABLE IF EXISTS `sample_users`;
CREATE TABLE `sample_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sample_friends` (`id`, `user1`, `user2`, `confirmed`) VALUES
(1,	1,	2,	's'),
(2,	1,	3,	's');

INSERT INTO `sample_users` (`id`, `username`, `nome`, `picture`) VALUES
(1,	'admin',	'Administrador',	'admin.jpg'),
(2,	'test',	'Test',	'test.jpg'),
(3,	'other',	'Other',	'other.jpg');</pre>
</body>
</html>
