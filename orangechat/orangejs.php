<?php
require_once 'common.php';
header("Content-type: text/javascript");

$base = str_replace(basename(__FILE__), null, $_SERVER['PHP_SELF']);
info();
?>
var jquery_included = false;
if(typeof jQuery == 'undefined' || typeof $ == 'undefined') {
	jquery_included = true;
	var jq = document.createElement('script');
	jq.type = 'text/javascript';
	jq.src = '<?php base(); ?>js/jquery.js';
	jq.id = 'orangechat_jquery';
	document.getElementsByTagName('head')[0].appendChild(jq);
}

if(jquery_included) {
	document.getElementById('orangechat_jquery').onload = function() {
		load_javascripts();
	}
} else {
	load_javascripts();
}

function load_javascripts() {
	var chatjs = document.createElement('script');
		chatjs.type = 'text/javascript';
		chatjs.src = '<?php base(); ?>js/chat.js.php';
		document.getElementsByTagName('head')[0].appendChild(chatjs);

	var chatbarjs = document.createElement('script');
		chatbarjs.type = 'text/javascript';
		chatbarjs.src = '<?php base(); ?>js/chatbar.js.php';
		document.getElementsByTagName('head')[0].appendChild(chatbarjs);	
}
