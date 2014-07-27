<?php
/*
Plugin Name: T&P Gallery Slider
Version: 1.2
Description: Display and change post gallery images by mouse onclick/hover the post thumbnails.
Author: Peyman Shadpour & Tzachi Raz
Author URI:http://www.bytech.co.il/
Plugin URI: http://wordpress.org/extend/plugins/tp-gallery-slider/
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.2
*/

/*------------------------------------------------------------- Settings Page -------------------------------------------------------------*/


if( !function_exists('tp_gallery_settings') )
{
	function tp_gallery_settings()
	{
		//add_menu_page(page_title, menu_title, capability, handle, [function], [icon_url]);
		add_menu_page("T&P Gallery Slider Setting", "T&P Setting", 8, basename(__FILE__), "tp_gallery_opt");
	}
}

if ( !function_exists('tp_gallery_opt') )
{
	function tp_gallery_opt()
	{
	?>
	<div class="wrap">
	<div id="icon-themes" class="icon32"></div><!-- icon32 -->
	<h2><strong>T&P Gallery Slider Settings</strong></h2>
	
	<?php
	if(isset($_POST['tp_gallery_form_submit']))
	{
		echo '<div style="color:green;font-weight:bold;background:#FFC;padding:4px;margin:2px 0;">T&P Gallery Slider Settings was saved successfully!</div>';
	}
	?>
	
	<form name="wp_compo_option_form" method="post">
	
	<?php	
	$tp_width = get_option("tp_width");
	$tp_height = get_option("tp_height");
	$tp_select_change = get_option( 'tp_select_change' );
	$tp_display_alt = get_option("tp_display_alt");
	$tp_description_position = get_option("tp_description_position");
	if(!$tp_description_position){
		$tp_description_position = "bottom";
		}
		
		
		if ( function_exists('plugin_url') )
		$plugin_url = plugin_url();
	else
		$plugin_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
    	/*echo '<script type="text/javascript" src="'.$plugin_url.'/jquery.min.js"></script>';*/
	?>
	
	<?php //echo $url;  ?>
    
    <style type="text/css">
		.wrap{
			direction: ltr;
			padding: 15px;
			text-align: left;
			}
		.icon32{
			float:left;
			margin-left: 0;
    		margin-right: 8px;
			}
		.tp_change{
			width:100%;
			height:auto;
			padding:15px 0;
			margin:0 0 0 0;
			float:left;
			}
		.tp_change input[type=checkbox]{
			margin: 0 10px 0 0;
			}
		.wrap h1 {
			border-bottom: 1px groove #FFFFFF;
			color: #333333;
			font-size: 37px;
			font-style: italic;
			font-weight: normal;
			margin: 0;
			padding: 25px 0 22px;
		}
		.tp_change h2 {
			color: #333333;
			font-size: 20px;
			margin: 0;
			padding: 0 0 10px;
		}
		#image_size{
			background:url(<?php echo $plugin_url; ?>/icons/cut.png) no-repeat left top;
			padding:0 0 10px 35px;
			}
		#image_hover{
			background:url(<?php echo $plugin_url; ?>/icons/pic.png) no-repeat left top;
			padding:0 0 15px 40px;
			}
		.wrap form {
			background: none repeat scroll 0 0 #E8E8FE;
			border: 6px solid #FFFFFF;
			box-shadow: 0 0 11px #AFAFAF;
			float: left;
			margin: 5% 2% 2% 5%;
			padding: 20px 50px 41px;
			width: 500px;
		}
		.tp_preview{
			background: none repeat scroll 0 0 #E8E8FE;
			border: 6px solid #FFFFFF;
			box-shadow: 0 0 11px #AFAFAF;
			float: left;
			margin: 5% 0;
			min-height: 480px;
			padding: 20px 50px 41px;
			width: 540px;
			}
		#tp_thumbs{ 
			padding-top: 10px; 
			overflow: hidden; 
			}
		#largeImage{ 
			width:100%;
			height:auto;
			}
		#tp_thumbs img{ 
			float: left; 
			margin-right:5px; 
			margin-bottom:5px;
			width:100px; 
			height:80px; 
			}
		#description{ 
			background: none repeat scroll 0 0 black;
			<?php echo $tp_description_position; ?>: 0;
			color: white;
			margin: 0;
			padding: 10px 20px;
			position: absolute;
			width: 93.5%; 
			opacity: 0.8;
			filter:Alpha(opacity=50); /* IE8 and earlier */
			}
		#tp_panel{ 
			position: relative; 
			width:<?php echo $tp_width; ?>;
			height:<?php echo $tp_height; ?>;
			overflow:hidden;
			padding:15px 0 0;
			}
		.tp_gallery_slider{
			width:100%;
			height:auto;


			padding:15px 0;
			margin:0 0 0 0;
			float:right;
			}
    </style>
	
	<h1>T&amp;P Gallery Slider Settings</h1>
    <div class="tp_change">
        <h2 id="image_size">Image Size</h2>
        <!--<div class="description"><strong>Image Size:</strong></div>--><!-- description -->
       <label id="tp_width">Width:</label>
        <input maxlength="6" size="3" type="text" name="tp_width" id="tp_width" value="<?php echo $tp_width; ?>">&nbsp;&nbsp;
        <label id="tp_height">Height:</label>
        <input maxlength="6" size="3" type="text" name="tp_height" id="tp_height" value="<?php echo $tp_height; ?>">
    </div><!-- tp_change -->
    
    <div class="tp_change">
        <h2 id="image_hover">Change Images by (hover/click)</h2>
        <select name="tp_select_change" value="<?php echo $tp_select_change; ?>" />
            <option value="hover" <?php if ( $tp_select_change == 'hover' ) echo " selected='selected'";?>>hover</option>
            <option value="click" <?php if ( $tp_select_change == 'click' ) echo " selected='selected'";?>>click</option>
        </select>
    </div><!-- tp_change -->
    
    <div class="tp_change">
    	
        <div style="width:50%; float:left;">
        <h2>Display Image Description</h2>
    	<label><input type="checkbox" name="tp_display_alt" value="yes" <?php if ( $tp_display_alt == 'yes' ) echo " checked='yes'";?>>Check to display.</label>
        </div>
        
        <div style="width:37%; float:right;">
        <h2>Description Position</h2>
        <select name="tp_description_position" value="<?php echo $tp_description_position; ?>" />
            <option value="top" <?php if ( $tp_description_position == 'top' ) echo " selected='selected'";?>>top</option>
            <option value="bottom" <?php if ( $tp_description_position == 'bottom' || $tp_description_position == NULL ) echo " selected='selected'";?>>bottom</option>
        </select>
        </div>
        
    </div><!-- tp_change -->

	<br />
	<div class="description">Finally, save it and enjoy.</div><!-- description -->
	<br />
	<div class="description">
    	<p>* to active the T&P Gallery Slider add : [tp_gallery] shortcode to post content , or add :  &lt;?php echo do_shortcode('[tp_gallery]'); ?&gt; in your theme.</p>
        <p>* to active the T&P Gallery Slider from specific post/page add: [tp_gallery post_id="id"] shortcode to post content , or add :  &lt;?php echo do_shortcode('[tp_gallery post_id="id"]'); ?&gt; in your theme (change id to post/page id).
        </p>
    </div><!-- description -->
	<br />

	<input type="submit" value="Save Settings" class="button-primary">
	<input type="hidden" name="tp_gallery_form_submit" value="true" />
	</form>
	
    <div class="tp_preview">
		
        <?php
			$tp_select_change = get_option("tp_select_change");
			if($tp_select_change == 'click'){
				$flag = 'click';
				}else{
					$flag = 'hover';
					}
		?>
        
    	<h1>T&amp;P Gallery Slider Preview</h1>
        
        <div id="tp_panel">
		<img id="largeImage" src="<?php echo $plugin_url; ?>/images/image_01_large.jpg" />
        <?php
			if($tp_display_alt == 'yes'){
				echo '<div id="description">1st image description</div>';
				}
		?>
		
	</div><!-- panel -->

	<div id="tp_thumbs">
        <img src="<?php echo $plugin_url; ?>/images/image_01_thumb.jpg" alt="1st image description" />
        <img src="<?php echo $plugin_url; ?>/images/image_02_thumb.jpg" alt="2nd image description" />
        <img src="<?php echo $plugin_url; ?>/images/image_03_thumb.jpg" alt="3rd image description" />
        <img src="<?php echo $plugin_url; ?>/images/image_04_thumb.jpg" alt="4th image description" />
        <img src="<?php echo $plugin_url; ?>/images/image_05_thumb.jpg" alt="5th image description" />
	</div><!-- thumbs -->
    
    <script>
		jQuery('#tp_thumbs').delegate('img','<?php echo $flag; ?>', function(){
			jQuery('#largeImage').attr('src',jQuery(this).attr('src').replace('thumb','large'));
			jQuery('#description').html(jQuery(this).attr('alt'));
		});
	</script>
        
    </div><!-- tp_preview -->
    	
	</div><!-- wrap -->

	<br />
	
	<?php
	}
}

if( !function_exists('tp_gallery_update') )
{
	function tp_gallery_update()
	{
		if(isset($_POST['tp_gallery_form_submit']))
		{
			update_option("tp_width", $_POST['tp_width']);
			update_option("tp_height", $_POST['tp_height']);
			update_option("tp_select_change", $_POST['tp_select_change']);
			update_option("tp_display_alt", $_POST['tp_display_alt']);
			update_option("tp_description_position", $_POST['tp_description_position']);
		}
	}
}


add_action('admin_menu', 'tp_gallery_settings');
add_action('init', 'tp_gallery_update');


/*--------------------------------------------------------- End Settings Page -------------------------------------------------------------*/


if (!is_admin()) {
	load_plugin_textdomain('tp_gallery_slider', NULL, dirname(plugin_basename(__FILE__)));
	add_shortcode('tp_gallery', 'tp_gallery_slider');
	//add_action('wp_head', 'tp_enqueue_scripts');
	add_action('wp_footer', 'tp_gallery_slider_footer');
	add_action('init', 'tp_enqueue_scripts');
}

    /**
     * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
     */
    add_action( 'wp_head', 'tp_stylesheet' );

    /**
     * Enqueue plugin style-file
     */
    function tp_stylesheet() {
		$tp_width = get_option("tp_width");
		$tp_height = get_option("tp_height");
		$tp_description_position = get_option("tp_description_position");
		if(!$tp_description_position){
			$tp_description_position = "bottom";
		}
     ?>
    
    <style type="text/css">
    #tp_thumbs{ 
        padding-top: 10px; 
        overflow: hidden; 
        }
    #largeImage{ 
        width:100%;
        height:auto;
        }
    #tp_thumbs img{ 
        float: left; 
        margin-right:5px; 
		margin-bottom:5px;
        width:100px; 
        height:80px; 
        }
    #description{ 
		background: none repeat scroll 0 0 black;
		<?php echo $tp_description_position; ?>: 0;
		color: white;
		margin: 0;
		padding: 10px 20px;
		position: absolute;
		width: 95%; 
		opacity: 0.7;
		filter:Alpha(opacity=50); /* IE8 and earlier */
        }
    #tp_panel{ 
        position: relative; 
		width:<?php echo $tp_width; ?>;
		height:<?php echo $tp_height; ?>;
		overflow:hidden;
        }
    .tp_gallery_slider{
        width:100%;
        height:auto;
        padding:15px 0;
        margin:0 0 0 0;
        float:right;
        }
    </style>

<?php 
    }//tp_stylesheet()


function tp_enqueue_scripts() {
	wp_enqueue_script("jquery");
}


function tp_gallery_slider_footer() {
	if ( function_exists('plugin_url') )
		$plugin_url = plugin_url();
	else
		$plugin_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));

	/**
	* Initialize
	*/
	$tp_select_change = get_option("tp_select_change");
	if($tp_select_change == 'click'){
		$flag = 'click';
		}else{
			$flag = 'hover';
			}
	
	echo '<script type="text/javascript">
				jQuery("#tp_thumbs").delegate("img","'.$flag.'", function(){
				jQuery("#largeImage").attr("src",jQuery(this).attr("src").replace("thumb","large"));
				if(jQuery(this).attr("caption")==""){
					jQuery("#description").attr("style", "display: none;");
				}
				else{
					jQuery("#description").html(jQuery(this).attr("caption"));
					jQuery("#description").attr("style", "display: block;");
				}
			});
		  </script>';
}

function tp_gallery_slider($atts) {

	/**
	* Grab attachments
	*/
	global $post;
	
	extract(shortcode_atts(array(
      'post_id' => 1,
   ), $atts));
	
	if(!$atts){
		$post_id = $post->ID;
		}
	
$attachments = get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	
	$first_value = reset($attachments);
	
	$big_image_src = wp_get_attachment_image_src(key($attachments),"full");
	$tp_display_alt = get_option("tp_display_alt");
		
	if ( empty($attachments) )
		return '';
		
	
	$output = '<div class="tp_gallery_slider">';
		
		$output .= '<div id="tp_panel">';
			
			$output .= '<img id="largeImage" alt="'.$first_value->post_title.'" caption="'.$first_value->post_excerpt.'" src="'.$big_image_src[0].'" width="'.$big_image_src[1].'" height="'.$big_image_src[2].'" />';
			if($tp_display_alt == 'yes'){
				$dispStyle = 'block';
				if($first_value->post_excerpt == ''){
					$dispStyle = 'none';
				}
				$output .= '<div id="description" style="display: '.$dispStyle.';">';
					$output .= $first_value->post_excerpt;
				$output .= '</div>';//description
			}//$tp_display_alt == 'yes'

		$output .= '</div>';//tp_panel
		
		$output .= '<div id="tp_thumbs">';
			
			foreach ( $attachments as $id => $attachment ){
				$big_image = wp_get_attachment_image_src($id, 'full'); // url of big image
				$caption_arr = array('caption' => $attachment->post_excerpt);
				$output .= wp_get_attachment_image($id,"full", false, $caption_arr);
				}
			
		$output .= '</div>';//tp_thumbs
		
	$output .= '</div>';//tp_gallery_slider
	
	return $output;

}

?>