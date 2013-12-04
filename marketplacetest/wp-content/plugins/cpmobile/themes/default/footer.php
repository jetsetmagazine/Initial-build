<div id="footer">

	<center>
		<div id="cpmobile-switch-link">
			<?php cpmobile_core_footer_switch_link(); ?>
		</div>
	</center>
	
	<p><?php $str = cpmobile_custom_footer_msg(); echo stripslashes($str); ?></p>
	<!-- Toni +2.0 -->
	<?php if (cp_can_show_powered_by()){ ?>
	<p><?php 	_e( 'Powered by', 'cpmobile' ); ?> <a href="http://www.wordpress.org/"><?php _e( 'WordPress', 'cpmobile' ); ?></a> <?php _e( '+', 'cpmobile' ); ?> <a href="http://www.bravenewcode.com/products/cpmobile-pro"><?php cpmobile(); ?></a></p>
	<?php } ?>
	<?php if ( !cp_cpmobile_is_exclusive() ) { wp_footer(); } ?>
</div>

<?php cpmobile_get_stats(); 

?>
</body>
</html>