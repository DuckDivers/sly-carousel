<?php
// Admin Menu
add_action( 'admin_menu', 'slyplugin_custom_admin_menu' );
add_action('admin_menu' , 'register_sly_settings');
function slyplugin_custom_admin_menu() {
    add_options_page(
        'Sly Carousel Options',
        'Sly Carousel',
        'manage_options',
        'sly-carousel',
        'sly_options_page'
    );
}
add_action( 'admin_enqueue_scripts', 'dd_enqueue_color_picker' );
function dd_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
function register_sly_settings() {
	register_setting( 'sly_options_page' , 'sly_show_current_page' );
	register_setting( 'sly_options_page' , 'sly_custom_css' );
	register_setting( 'sly_options_page', 'sly_show_on_homepage');
	register_setting( 'sly_options_page', 'sly_background_color');
	register_setting( 'sly_options_page', 'sly_active_color');
	register_setting( 'sly_options_page', 'sly_trail_color');
	register_setting( 'sly_options_page', 'sly_hover_color');
	register_setting( 'sly_options_page', 'sly_font_color');
	register_setting( 'sly_options_page', 'sly_bc_height');
 } 

function sly_options_page() {
 ?>

<div class="wrap">
  <?php screen_icon(); ?>
  <form action="options.php" method="post" id="sly_show_current_page" name="xenbreadcrumbs_options_form">
    <?php settings_fields('sly_options_page'); ?>
    <?php // Get Existing or Initialize Options
		if(get_option( 'sly_show_current_page' )){
			$checked = 'checked';}
			else {$checked ='';};
	  	if(get_option('sly_show_on_homepage')){
	  		$homepage = 'checked';}
			else {$homepage = '';};
		 if(get_option('sly_background_color')){
	  		$bgcolor = get_option ('sly_background_color');}
			else {$bgcolor = '#f7f7f7';};
		 if(get_option('sly_active_color')){
	  		$active = get_option ('sly_active_color');}
			else {$active = '#e6e6e6';};
		 if(get_option('sly_font_color')){
	  		$fontcolor = get_option ('sly_font_color');}
			else {$fontcolor = '#000000';};
		 if(get_option('sly_trail_color')){
	  		$trailcolor = get_option ('sly_trail_color');}
			else {$trailcolor = '#aaaaaa';};	
		 if(get_option('sly_hover_color')){
	  		$hovercolor = get_option ('sly_hover_color');}
			else {$hovercolor = '#a3a3a3';};	
		 if(get_option('sly_bc_height')){
	  		$bcheight = get_option ('sly_bc_height');}
			else {$bcheight = '38';};	
		?>
    <h2>Sly Carousel Options</h2>
    <table class="widefat">

    <tr><td style="padding: 5px; font-family:Verdana, Geneva, sans-serif;color:#666; font-weight:bold; font-size: 16px;"> Customize Your Carousel
        </td></tr>
     <tr>
    <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
        <table>
        	<tr>
            	<td><label for="sly_background_color">Choose the Background Color: </label></td>
           		<td><p><input id="bgcolor"  type="text" name="sly_background_color" class="my-color-field" value="<?php echo $bgcolor;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="sly_active_color"> Choose the Active BG Color: </label></td>
           		<td><p><input id="activecolor"  type="text" name="sly_active_color" class="my-color-field" value="<?php echo $active;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="sly_trail_color"> Choose the Color of the Trail: </label></td>
           		<td><p><input id="trailcolor"  type="text" name="sly_trail_color" class="my-color-field" value="<?php echo $trailcolor;?>"></p></td>
            </tr>
             <tr>
            	<td><label for="sly_hover_color"> Choose the Hover color: </label></td>
           		<td><p><input id="hovercolor"  type="text" name="sly_hover_color" class="my-color-field" value="<?php echo $hovercolor;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="sly_font_color"> Choose the Font Color: </label></td>
           		<td><p><input id="fontcolor"  type="text" name="sly_font_color" class="my-color-field" value="<?php echo $fontcolor;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="sly_bc_height"> Enter the Height of the Breadcrumbs: </label></td>
           		<td><p><input id="bc_height"  type="text" name="sly_bc_height" value="<?php echo $bcheight;?>"> Pixels</p></td>
            </tr>
        </table>
	<!-- end CSS Options -->       
     </td>
     </tr>
      <tr>
        <td style="padding:5px 10px;font-family:Verdana, Geneva, sans-serif;color:#666; border-top: 1px solid #666;"><label for="sly_custom_css">
          <p>Enter Any Additional Custom CSS Below</p>
          <p>
            <textarea rows="10" cols="50" name="sly_custom_css" style="margin-left: 10px;"><?php echo get_option('sly_custom_css');?></textarea>
          </p>
          </label></td>
      </tr>
        </tbody>
        <tfoot>
        <tr>
          <th><input type="submit" name="submit" value="Save Settings" class="button button-primary" onClick="return empty()"  /></th>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<?php }; ?>
