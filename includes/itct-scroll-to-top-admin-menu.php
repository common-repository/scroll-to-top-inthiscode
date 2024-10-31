<?php
add_action( 'admin_menu', 'itct_add_admin_menu' ); // Add Admin Menu
function itct_add_admin_menu(  ) { 
	add_menu_page( 'Scroll To Top', 'Scroll To Top', 'manage_options', 'itct_scrolltop', 'itct_options_page' );
}
function itct_options_page(  ) { 
	?>
	<form action='options.php' method='post'>
		<h1>Scroll To Top</h1>
		<?php
		settings_fields( 'itct_pluginPage' );
		do_settings_sections( 'itct_pluginPage' );
		submit_button();
		?>
	</form>
	<?php
}