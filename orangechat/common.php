<?php
session_start();

require_once 'config.inc.php';
require_once 'integration.php';
require_once 'integrated_functions.php';

function base() {
	echo ORANGE_BASE;
}

function mysql_connection() {
	mysql_connect(DBPATH, DBUSER, DBPASS) or die("Can't connect to MySQL server.");
	mysql_select_db(DBNAME) or die("Wasn't able to use database.");
	mysql_query("SET NAMES utf8;");
}

function update_lastact() {
	$userid = mysql_real_escape_string(stripslashes(getuserid()));
	$time = time();
	$qry = mysql_query("SELECT 1 FROM chat_lastactivity WHERE user='$userid' ORDER BY id DESC LIMIT 1");
	if(mysql_num_rows($qry)) {
		mysql_query("UPDATE chat_lastactivity SET time='$time' WHERE user='$userid'");
	} else {
		mysql_query("INSERT INTO chat_lastactivity (`user`, `time`) VALUES ('$userid', '$time');");
	}
}

function t($string) {
	if(!file_exists('lang/'.LANGUAGE.'.xml')) return $string;
	$xml = simplexml_load_file('lang/'.LANGUAGE.'.xml');
	$result = $xml->xpath('/lang/message[@original="'.$string.'"]');
	if(isset($result[0][0])) {
		return trim($result[0][0]);	
	} else {
		return $string;
	}
}

function info() {
	echo <<<HTML
/*
	OrangeChat

	Programming, integration support and administration panel by Jefrey S. Santos (jefreysobreira[at]gmail[dot]com)
	Chat boxes by Anant Garg (anantgarg.com)
*/


HTML;
}