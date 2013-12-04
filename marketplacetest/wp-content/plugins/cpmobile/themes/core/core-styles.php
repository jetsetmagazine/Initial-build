<style type="text/css">
#headerbar, #cpmobile-login, #cpmobile-search {
	background: #<?php echo cp_get_header_background(); ?> url(<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-images/head-fade-bk.png);
}
#headerbar-title, #headerbar-title a {
	color: #<?php echo cp_get_header_color(); ?>;
}
#cpmobile-menu-inner a:hover {
	color: #<?php echo cp_get_link_color(); ?>;
}
#catsmenu-inner a:hover {
	color: #<?php echo cp_get_link_color(); ?>;
}
#drop-fade {
background: #<?php echo cp_get_header_border_color(); ?>;
}
a, h3#com-head {
	color: #<?php echo cp_get_link_color(); ?>;
}

a.h2, a.sh2, .page h2 {
font-family: '<?php echo cp_get_h2_font(); ?>';
}

<?php cpmobile_thumb_reflections(); ?>

<?php if (cp_is_truncated_enabled()) { ?>
a.h2{
text-overflow: ellipsis;
white-space: nowrap;
overflow: hidden;
}
<?php } ?>

</style>