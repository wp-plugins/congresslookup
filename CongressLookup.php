<?php
/*
Plugin Name: CongressLookup
Plugin URI: http://CongressLookup.com/
Description: CongressLookup is powered by data APIs from the Sunlight Foundation's <a href="http://services.sunlightlabs.com/accounts/register/" targer="_blank" >Sunlight Labs</a> and <a href="http://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank">Google Maps</a>. To configure plugin, go to: Settings > CongressLookup.   <a href="constructivegrowth.net/wordpress-plugins/congresslookup/congresslookup-faqs/" target="_blank">Quick Start Guide and FAQs</a>.  Suggestion for improvements are always welcome.
Version: 2.0
Author: Constructive Growth LLC
Author URI: http://constructivegrowth.net/
License: GNU General Public License v2 or later
*/

if ( !defined('ABSPATH') ) exit();

define('LEGISLATORS_PATH', plugin_dir_url(__FILE__));
define('LEGISLATORS_PATH_BASE', plugin_dir_path(__FILE__));

register_activation_hook( __FILE__, 'CongressLookup_install' );

function CongressLookup_install()
{
	//update_option('congress_key', '' );

	update_option('congress_cache', 1);
	update_option('congress_cache_time', 30);
	update_option('congress_themes', 'modern');
	//update_option('congress_select_choice' , 'all');
	update_option('congress_photos_last_modified', '1307992245');
	update_option('congress_options', array(0=>'title', 1=>'first_name', 2=>'last_name', 3=>'picture', 4=>'chamber', 5=>'state_rank', 6=> 'state_name', 7=> 'website', 8=> 'contact_form'));
}


add_action('wp_head', 'legislators_head');
add_shortcode('CongressLookup', 'legislators_start');
// fix
if (!is_admin()) add_filter('widget_text', 'do_shortcode', 11);


add_action('admin_notices', 'showAdminMessages');     


if ( is_admin() ){ // admin actions
	add_action('admin_menu', 'qkCongressLookupMenu');
	add_action( 'admin_init', 'qkCongressLookup_registerSettings' );
} 

function qkCongressLookupMenu(){ add_options_page('CongressLookup', 'CongressLookup', 'administrator', 'mt-cglu', 'qkCongressLookupSettings'); }

function legislators_start($atts)
{	
    
    extract( shortcode_atts( array(
          'show' => 'all',
        ), $atts, 'CongressLookup' ) );
    
    //$show = $show;
	
	$html = '';

	if(get_option('congress_key')):
        
         $schoice = $show;
	                                 
         if($schoice == 'representative'){
         	$htext = 'Locate your Representatives';
         } 
         elseif($schoice == 'senator'){
         	$htext = 'Locate Your Senators';
         }
         else{
            $htext = 'Locate your Senators and Representative';
        }
		$html .='<form action="#" class="legislators" onsubmit="return getCongressFromAddress(this);"> 
		
			<p class="le_head">'.$htext.'</p>
					
			<fieldset id="user-details">	
				
				<label for="congress_address">Address:</label>
				<input type="hidden" name="showon" value="'.$show.'" id="congress_showon"/>
				<input type="text" name="congress_address" id="congress_address" value="" />
				<input type="submit" value="Find" name="submit" class="submit" />
				<img src="'.LEGISLATORS_PATH.'loader.gif" id="jloader" alt="loading" title="Loading" />
				<p class="congress_example"><i>ex: 1600 Pennsylvania Ave, Washington, DC 20500 </i></p>
			</fieldset>
			
			<div id="map_canvas" style="width:80%; height:190px;margin:0 auto;border:1px solid #EDEDED"></div>
			
			<div id="congress_holder"></div>
			</form>
			';
		
	else:
		 $html .='<form action="#" class="legislators"> 
			<p class="le_head">API Key missing, please update it</p>
			</form>';
	endif; 
	
	
	return $html;
}

function legislators_head()
{
?>
	<link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />
	<link href='<?php  echo LEGISLATORS_PATH; ?>style.css' rel='stylesheet' type='text/css' />
	<?php if(get_option('congress_themes') && get_option('congress_themes') == 'modern'): ?><link href='<?php  echo LEGISLATORS_PATH; ?>light.css' rel='stylesheet' type='text/css' /> <?php endif; ?>
	<?php if(get_option('congress_themes') && get_option('congress_themes') == 'custom'): ?>
		<?php if(get_option('congress_themes_css')): ?>
			<style type="text/css">
				<!--
				<?php echo get_option('congress_themes_css'); ?>
				-->
			</style>
		<?php endif; ?>
	<?php endif; ?>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		var geo_json = "<?php  echo LEGISLATORS_PATH; ?>getData.php";
	</script>
	<script type="text/javascript" src="<?php  echo LEGISLATORS_PATH; ?>geocode.js"></script>
<?php
}


function qkCongressCheckOptions($t)
{
	$opt = get_option('congress_options');

	if(is_array($opt))
	{
		foreach($opt AS $key=>$value){
			if($value == $t) return 'checked="checked"';
		}
	}
	
	return('');
}

function GetRemoteLastModified( $uri )
{
    // default
    $unixtime = 0;
    
    $fp = fopen( $uri, "r" );
    if( !$fp ) {return;}
    
    $MetaData = stream_get_meta_data( $fp );
        
    foreach( $MetaData['wrapper_data'] as $response )
    {
        // case: redirection
        if( substr( strtolower($response), 0, 10 ) == 'location: ' )
        {
            $newUri = substr( $response, 10 );
            fclose( $fp );
            return GetRemoteLastModified( $newUri );
        }
        // case: last-modified
        elseif( substr( strtolower($response), 0, 15 ) == 'last-modified: ' )
        {
            $unixtime = strtotime( substr($response, 15) );
            break;
        }
    }
    fclose( $fp );
    return $unixtime;
}


function congress_move_folder($source, $destination)
{
	// Get array of all source files
	$files = scandir($source);
	// Cycle through all source files
	foreach ($files as $file) {
	  if (in_array($file, array(".",".."))) continue;
	  // If we copied this successfully, mark it for deletion
	  if (copy($source.$file, $destination.$file)) {
		$delete[] = $source.$file;
	  }
	}
	// Delete all successfully-copied files
	foreach ($delete as $file) {
	  unlink($file);
	}
}

function congress_updatePhotos()
{
	// Download zip file
	$zip = @file_get_contents("http://assets.sunlightfoundation.com/moc/40x50.zip");
	
	if($zip)
	{
		$pics_file = LEGISLATORS_PATH_BASE."pics.zip";
		
		file_put_contents($pics_file, $zip);
		
		$zip = new ZipArchive;
		$res = $zip->open($pics_file);
		if ($res === TRUE) 
		{
			$zip->extractTo(LEGISLATORS_PATH_BASE.'downloads/');
			$zip->close();
			
			// move new images
			congress_move_folder(LEGISLATORS_PATH_BASE.'downloads/40x50/', LEGISLATORS_PATH_BASE.'pics/');
			
			update_option('congress_photos_last_modified', GetRemoteLastModified('http://assets.sunlightfoundation.com/moc/40x50.zip'));
			
			echo '<script>window.location = "options-general.php?page=mt-cglu&photos-updated=true&r=1"; </script>';
			exit;
		} 
		else{
			echo '<script>window.location = "options-general.php?page=mt-cglu&photos-updated=true&r=0"; </script>';
			exit;
		}
	}
	
	return false;
}


function qkCongressLookup_registerSettings() { // whitelist options
	register_setting( 'qkCongressLookup-group', 'congress_key' );
	register_setting( 'qkCongressLookup-group', 'congress_cache' );
	register_setting( 'qkCongressLookup-group', 'congress_cache_time' );
	register_setting( 'qkCongressLookup-group', 'congress_options' );
	register_setting( 'qkCongressLookup-group', 'congress_themes' );
	register_setting( 'qkCongressLookup-group', 'congress_themes_css' );
	//register_setting( 'qkCongressLookup-group', 'congress_select_choice' );
}

function showAdminMessages()
{
	$res = GetRemoteLastModified('http://assets.sunlightfoundation.com/moc/40x50.zip');
	$op = get_option('congress_photos_last_modified');
	
	if(($op && $res) && ($op != $res))
			echo '<div id="message" class="error fade"><p><strong>You need to update your congress photos. <a href="options-general.php?page=mt-cglu&photos-updated=true">Click Here to update it</a></strong></p></div>'; 
}

 /* For settings of Congress Lookup */
function qkCongressLookupSettings() {
	if( get_option('congress_themes') == 'custom' && !get_option('congress_themes_css'))
	{
		update_option('congress_themes_css', @file_get_contents(LEGISLATORS_PATH_BASE.'custom.css'));
	}
?>
	<div class="wrap">
	<div class="icon32" id="icon-options-general"><br></div>
	<h2>CongressLookup  Settings</h2>
	
	<?php if ($_REQUEST['updated']=='true') { ?>
	<div id="message" class="updated fade"><p><strong>Settings Updated</strong></p></div>
	<?php  } ?>
	
	<?php if ($_REQUEST['photos-updated']=='true') { 
		if(!isset( $_REQUEST['r'] )) congress_updatePhotos();
		if(isset( $_REQUEST['r'] ) && $_REQUEST['r'] == 1) echo '<div id="message" class="updated fade"><p><strong>Photos Updated</strong></p></div>'; 
		else echo '<div id="message" class="error fade"><p><strong>An error occured while updating the Photos</strong></p></div>'; 
		}
	?>

	<div id="qk_settings-form" style="position:relative">
	<form name="addnew" method="post" action="options.php">
	<?php settings_fields('qkCongressLookup-group');?>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="congress_key">Sunlight API Key:</label></th>
					<td colspan="2">
						<input name="congress_key" type="text" size="45" value="<?php echo get_option('congress_key'); ?>" >
						<p>Get your API Key at the <a href="http://services.sunlightlabs.com/accounts/register/" target="_blank">Sunlight Foundation</a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label>What to display?:</label></th>
					<td colspan="2">
						<table>
							<tbody>
								<tr>								 
									<td>
										<input name="congress_options[]" type="checkbox" id="title" value="title" <?php echo qkCongressCheckOptions("title"); ?>>&nbsp;<label for="title">Title</label> <br />
										<input name="congress_options[]" type="checkbox" id="first_name" value="first_name" <?php echo qkCongressCheckOptions("first_name"); ?>>&nbsp;<label for="first_name">First&nbsp;Name</label> <br />
										<input name="congress_options[]" type="checkbox" id="last_name" value="last_name" <?php echo qkCongressCheckOptions("last_name"); ?>>&nbsp;<label for="last_name">Last&nbsp;Name</label> <br />
										<input name="congress_options[]" type="checkbox" id="picture" value="picture" <?php echo qkCongressCheckOptions("picture"); ?>>&nbsp;<label for="picture">Picture</label> <br />
										<input name="congress_options[]" type="checkbox" id="chamber" value="chamber" <?php echo qkCongressCheckOptions("chamber"); ?>>&nbsp;<label for="chamber">Chamber</label> <br />
										<input name="congress_options[]" type="checkbox" id="state_rank" value="state_rank" <?php echo qkCongressCheckOptions("state_rank"); ?>>&nbsp;<label for="state_rank">State&nbsp;Rank</label> <br />
										<input name="congress_options[]" type="checkbox" id="state_name" value="state_name" <?php echo qkCongressCheckOptions("state_name"); ?>>&nbsp;<label for="state_name">State&nbsp;Name</label>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<input name="congress_options[]" type="checkbox" id="website" value="website" <?php echo qkCongressCheckOptions("website"); ?>>&nbsp;<label for="website">Website</label> <br />
										<input name="congress_options[]" type="checkbox" id="contact_form" value="contact_form" <?php echo qkCongressCheckOptions("contact_form"); ?>>&nbsp;<label for="contact_form">Contact&nbsp;Form</label> <br />
										<input name="congress_options[]" type="checkbox" id="fax" value="fax" <?php echo qkCongressCheckOptions("fax"); ?>>&nbsp;<label for="fax">Fax</label> <br />
										<input name="congress_options[]" type="checkbox" id="phone" value="phone" <?php echo qkCongressCheckOptions("phone"); ?>>&nbsp;<label for="phone">Phone</label> <br />
										<input name="congress_options[]" type="checkbox" id="party" value="party" <?php echo qkCongressCheckOptions("party"); ?>>&nbsp;<label for="party">Party</label> <br />
										<input name="congress_options[]" type="checkbox" id="name_suffix" value="name_suffix" <?php echo qkCongressCheckOptions("name_suffix"); ?>>&nbsp;<label for="name_suffix">Name&nbsp;Suffix</label> <br />
										<input name="congress_options[]" type="checkbox" id="middle_name" value="middle_name" <?php echo qkCongressCheckOptions("middle_name"); ?>>&nbsp;<label for="middle_name">Middle&nbsp;Name</label>

									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<input name="congress_options[]" type="checkbox" id="facebook_id" value="facebook_id" <?php echo qkCongressCheckOptions("facebook_id"); ?>>&nbsp;<label for="facebook_id">Facebook&nbsp;ID</label> <br />
										<input name="congress_options[]" type="checkbox" id="youtube_id" value="youtube_id" <?php echo qkCongressCheckOptions("youtube_id"); ?>>&nbsp;<label for="youtube_id">Youtube&nbsp;ID</label><br />
										<input name="congress_options[]" type="checkbox" id="twitter_id" value="twitter_id" <?php echo qkCongressCheckOptions("twitter_id"); ?>>&nbsp;<label for="twitter_id">Twitter&nbsp;ID</label> <br />
										<input name="congress_options[]" type="checkbox" id="votesmart_id" value="votesmart_id" <?php echo qkCongressCheckOptions("votesmart_id"); ?>>&nbsp;<label for="votesmart_id">Votesmart&nbsp;ID</label> <br />
										<input name="congress_options[]" type="checkbox" id="office" value="office" <?php echo qkCongressCheckOptions("office"); ?>>&nbsp;<label for="office">Office</label> <br />
										<input name="congress_options[]" type="checkbox" id="term_end" value="term_end" <?php echo qkCongressCheckOptions("term_end"); ?>>&nbsp;<label for="term_end">Term&nbsp;End</label> <br />
										<input name="congress_options[]" type="checkbox" id="term_start" value="term_start" <?php echo qkCongressCheckOptions("term_start"); ?>>&nbsp;<label for="term_start">Term&nbsp;Start</label>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label>Cache:</label></th>
					<td>
						<p>Enable this to cache the data returned by the API, to reduce the number of requests, and for fast loading. Select for how many minutes you would like the data to be cached &amp; saved</p>
						<input name="congress_cache" id="congress_cache" type="checkbox" value="1" <?php echo checked(get_option('congress_cache'),1); ?>>&nbsp;<label for="congress_cache">Enable&nbsp;cache?</label>
						<p>
							<label for="congress_cache_time">Cache time:</label>
							<input name="congress_cache_time" id="congress_cache_time" type="text" size="5" style="width:40px" value="<?php echo get_option('congress_cache_time'); ?>"> <small><i>minutes</i></small>
						</p>
						
						<?php
							$cache_folder = LEGISLATORS_PATH_BASE.'cache/';
							if(!is_writable($cache_folder))
							{
						?>
						<p style="color:red">You need to give 777 permission to: <?php echo $cache_folder; ?></p>
						<?php
							}
						?>
					</td>
                    <td valign="top" rowspan="2">
		<div style="background-color: #FFFFE0;border: 1px solid #E8E7AE;padding: 10px;position: relative;text-align: center;top: 10px;width: 200px;">
			<p>CongressLookup is free to use.  Please consider donating to help support the continued development of this plugin.  Thanks!</p>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="text-align:center;">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="3ZSYXP8PLH6AJ">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
                    </td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="congress_themes">Theme:</label></th>
					<td>
						<select name="congress_themes" id="congress_themes">
							<option value="" <?php echo selected(get_option('congress_themes'),''); ?>>No Theme</option>
							<option value="modern" <?php echo selected(get_option('congress_themes'),'modern'); ?>>Modern</option>
							<option value="custom" <?php echo selected(get_option('congress_themes'),'custom'); ?>>Custom</option>
						</select>

						<div <?php if(get_option('congress_themes') != 'custom'): echo ' style="display:none" '; endif; ?>id="custom_css_div">
						<p><label for="congress_themes_css">Custom Css Code:</label></p>
						<p>
							<textarea name="congress_themes_css" id="congress_themes_css" rows="1" cols="1" style="width:80%;height:150px;">
<?php if(get_option('congress_themes_css')):  echo get_option('congress_themes_css'); else: echo @file_get_contents(LEGISLATORS_PATH_BASE.'custom.css'); endif; ?>
							</textarea>
						</p>
						<p><b>Demo :</b></p>
						<p>
							<iframe src="<?php echo LEGISLATORS_PATH; ?>iframe.html?<?php echo time(); ?>" id="form_demo" style="width:85%;height:200px;border:0"></iframe>
						</p>
						</div>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label>Photos of Members of Congress</label></th>
					<td colspan="2">
						<a class="button" href="options-general.php?page=mt-cglu&photos-updated=true" onclick="if(confirm('Are you sure?')){ return true; } else{ return false; }">Update The Photos</a><br /> &nbsp;We suggest you update when you first install CongressLookup to make sure your photos are up-to-date. &nbsp;<i>Note: May take some time to download from Sunlight Labs.  Please be patient.</i>
						<?php
							$downloads_folder = LEGISLATORS_PATH_BASE.'downloads/';
							if(!is_writable($downloads_folder))
							{
						?>
						<p style="color:red">You need to give 777 permission to: <?php echo $downloads_folder; ?></p>
						<?php
							}
						?>
					</td>
				</tr>				
				<tr valign="top">
					<th scope="row"><label>Short Codes:</label></th>
					<td colspan="2">
					  <table>
                                             <tr> <th> For Searching All: </th> <td>[CongressLookup]</td> </tr>
                                             <tr> <th> For Searching Senators only: </th> <td>[CongressLookup show="senator"]</td> </tr>
                                             <tr> <th> For Searching Representatives only: </th> <td>[CongressLookup show="representative"]</td> </tr>
                                          </table>
					</td>
				</tr>
			</tbody>
		</table>
		<?php submit_button(); ?>
	
		
	</form>

	</div>
	</div>

<script type="text/javascript">


function iframeLoaded() {
    var $frame = jQuery("#form_demo");
	var	contents = $frame.contents(),
	styleTag = jQuery('<style></style>').appendTo(contents.find('head'));
	
	styleTag.text(jQuery('#congress_themes_css').val());
	
	jQuery('#congress_themes_css').keyup(function() {
		styleTag.text(jQuery(this).val());
	});
			
}

jQuery(document).ready(function($){

	if($('#congress_themes_css').length > 0)
	{
	
		$("#congress_themes").change(function(){
			if($(this).val() == "custom")
				$('#custom_css_div').show();
			else
				$('#custom_css_div').hide();
		});
		
	}
});
</script>	
	
	
<?php }


?>