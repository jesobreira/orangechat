<?php
/* Optional editing */

/*
	Received arguments:
		- $userid = user to check if is online or not

	Must have a bool return (true or false), if the $userid user is
	logged in or not. Want a tip? Look up for the last activity
	time of that user. Usually they don't delay more than 5 minutes
	to act.

	Change it only if you know exactly what you're doing.
*/
function is_online($userid) {
	$userid = mysql_real_escape_string(stripslashes($userid));
	$qry = mysql_query("SELECT time FROM chat_lastactivity WHERE user='$userid' ORDER BY id DESC LIMIT 1");
	if(!mysql_num_rows($qry)) return false;
	else {
		$fetch = mysql_fetch_array($qry);
		$lastact = $fetch['time'];
		$limit = strtotime("-20 seconds"); // update interval is 9 seconds
		return ($lastact>$limit);
	}
}

/*
	Receives no arguments.
	Must return the current logged in user ID.

	Change it only if you know exactly what you're doing.
*/
function getuserid() {
	global $_SESSION;
	return $_SESSION[SESSION];
}

/*
	Received arguments:
	- $userid

	Same as getcontacts() but returns online friends only.
*/
function getonlinecontacts($userid) {
	$return = array();
	$friends = getcontacts($userid);
	foreach($friends as $friend) {
		if(is_online($friend)) {
			$return[] = $friend;
		}
	}
	return $return;
}

/*
	Received arguments:
	- $message

	Work with the message text before it's sent.
	Useful if you want to block words, add bbcode etc.
*/
function hook_message_text($message) {
	return $message;
}

/*
	Received arguments:
		- $from = sender ID
		- $to = receiver ID
		- $message = message text
		- $time = timestamp of the message time
		- $message_id = message ID on chat table

	Optional. Write this function only if you want it to do something automatically
	when a message is sent (like updating some messages table).
*/
function hook_message_sent($from, $to, $message, $time, $message_id) {
	// do nothing
}
