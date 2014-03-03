<?php
header("Content-type: text/css");
include 'common.php';
?>
@import url("<?php base(); ?>css/screen.css");

<?php if(preg_match('/MSIE 7/', $_SERVER['HTTP_USER_AGENT'])): ?>
@import url("css/screen_ie.css");
<?php endif; ?>

@import url("<?php base(); ?>css/chat.css");

<?php if(file_exists('themes/'.THEME.'/style.css')): ?>
@import url("<?php base(); ?>themes/<?php echo THEME; ?>/style.css");
<?php endif; ?>