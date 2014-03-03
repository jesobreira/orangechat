<?php

require_once 'common.php';

mysql_connection();
update_lastact();

if(!(isset($_GET['act'])) OR !(preg_match('/^(update_chat_bar|chat_friends_list)$/', $_GET['act']))) exit;

switch ($_GET['act']) {
	case 'update_chat_bar':
		update_chat_bar();
		break;
	
	case 'chat_friends_list':
		chat_friends_list();
		break;
}

function update_chat_bar() {
	$count = sizeof(getonlinecontacts(getuserid()));
	echo t('Chat').' ('.$count.')';
	exit;
}

function chat_friends_list() {
	$friends = getonlinecontacts(getuserid());
	$count = sizeof($friends);
	if($count) {
		$result = null;
		foreach($friends as $friend) {
			$result .= '<a href="#" onclick="javascript:chatWith(\''.$friend.'\', \''.get_display_name($friend).'\');hide_chat_list();return false;" class="chat_boxes" ><li class="chat_boxes">'.get_display_name($friend).'</li></a>';
		}
		// echo '<div class="sub chat_boxes">'.t('Chat').' ('.$count.')</div>';
		echo '<ul  class="chat_boxes">'.$result.'</ul>';
	} else {
		echo t('No online users.');
	}
}
