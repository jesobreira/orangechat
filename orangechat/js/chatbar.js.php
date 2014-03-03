<?php
header("Content-type: text/javascript");
require_once '../common.php';
chdir("../");

if(file_exists('themes/'.THEME.'/loading.gif'))
	$loading = ORANGE_BASE.'themes/'.THEME.'/loading.gif';
else
	$loading = ORANGE_BASE.'images/loading.gif';

?>
function show_chat_list() {
	$("#chat_list").show();
	$("#chat_friends_list").html("<img  src=\'<?php echo $loading; ?>\' width=16 height=16 />");
	$("#chat_friends_list").load("<?php base(); ?>chatbar.php?act=chat_friends_list");
	$("#chat_bar").removeClass("chat_bar");
	$("#chat_bar").addClass("chat_bar_active");
}
function hide_chat_list() {
	$("#chat_list").hide();
	$("#chat_bar").removeClass("chat_bar_active");
	$("#chat_bar").addClass("chat_bar");
}
function update_chat_bar() {
	$("#chat_bar_content").load("<?php base(); ?>chatbar.php?act=update_chat_bar");
}
$(document).ready(function($) {
	$("body").append('<div id="chat_list" class="chat_boxes"> \
				<div id="chat_list_content" class="chat_boxes"> \
				<div class="chat_boxes chatbox_header"><?php echo t('Online friends'); ?></div> \
				<div id="chat_friends_list" class="chat_boxes"></div> \
				</div> \
			</div> \
			<div id="chat_bar" class="chat_boxes chat_bar"> \
			<div id="chat_bar_content" class="chat_boxes"> \
			</div> \
			</div>');
	$("#chat_bar").click(function() {
		show_chat_list();
	});
	$(document).click(function(event) {
		if ( !$(event.target).hasClass("chat_boxes")) {
			 hide_chat_list();
		}
	});
	update_chat_bar();
	setInterval(function() {
		update_chat_bar();
	}, 9000);
});
