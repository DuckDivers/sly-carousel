<?php
header("Content-type: text/css; charset: UTF-8");
header('Cache-control: must-revalidate');
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);
?>
<?php 
	// Get the CSS ?>
	 .frame ul li {
            background-color: <?php echo get_option('sly_background_color'); ?>;
		}
     .breadcrumb .crust a.crumb {
     		color: <?php echo get_option('sly_font_color'); ?>;
		}    
     .breadcrumb .crust:last-child a.crumb {
            font-weight: 700;
            color: <?php echo get_option('sly_font_color'); ?>;
            background-color: <?php echo get_option('sly_active_color'); ?>;
        }
     .frame ul li.active {
            background-color: <?php echo get_option('sly_active_color'); ?>;
        }
     .breadcrumb .crust.firstVisibleCrumb a.crumb,.breadcrumb .crust:first-child a.crumb {
            background-color: <?php echo get_option('sly_trail_color'); ?>;
            padding-left: 10px;
        }
     .breadcrumb .crust .arrow span, .breadcrumb .crust.homeCrumb:last-child .arrow span {
     		 border-left-color: <?php echo get_option('sly_trail_color'); ?>;
    		-moz-border-right-colors: <?php echo get_option('sly_trail_color'); ?>;
        }   
      .breadcrumb .crust a.crumb, .breadcrumb .crust > a {           
			background-color: <?php echo get_option('sly_trail_color'); ?>;
            line-height: <?php echo $lineheight ?>px;
            }
        .breadcrumb .crust:hover a.crumb {
            background-color: <?php echo get_option('sly_hover_color'); ?>;
        }
        
        .breadcrumb .crust:hover .arrow span, .breadcrumb .crust.homeCrumb:hover .arrow span {
            border-left-color: <?php echo get_option('sly_hover_color'); ?>;
        }
	<?php echo get_option('sly_custom_css'); 
?>
