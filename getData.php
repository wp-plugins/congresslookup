<?php

	if(isset($_GET['lat']) && isset($_GET['lon']))
	{
		

		require_once('../../../wp-load.php');
		$url = plugin_dir_url(__FILE__);
		
		$api_call = "http://services.sunlightlabs.com/api/legislators.allForLatLong.json?apikey=".get_option('congress_key')."&latitude=".$_GET['lat']."&longitude=".$_GET['lon'];
		
		if(get_option("congress_cache"))
		{
			require 'API_cache.php';
			$cache_file = 'cache/'.md5($api_call).'.json';
			$cache_for = get_option("congress_cache_time"); // cache time in minutes

			$api_cache = new API_cache ($api_call, $cache_for, $cache_file);
			$congress = $api_cache->get_api_cache();
		}
		else
			$congress = @file_get_contents($api_call);
		
		if($congress )
		{
			$congress = json_decode($congress);
			
			if(get_option("congress_options"))
				$a = get_option("congress_options");
			else
				$a = array();
			
			echo '<div class="legislators_list">';
			
			foreach ($congress->response->legislators as $c) {
				$pic_name = "pics/".$c->legislator->bioguide_id.".jpg";


			
				if(is_array($a) &&count($a) > 0)
				{
					echo "<h3 class='legislator'>".$c->legislator->firstname." ".$c->legislator->lastname." <small>(".$c->legislator->state." ".$c->legislator->district.")</small></h3>";
				
					if(in_array("picture", $a))
					{
						if(file_exists($pic_name)) echo "<img class='legislator-pic' src='".$url.$pic_name."' width='40' height='50' alt='' />";
						else echo "<img class='legislator-pic' src='".$url."pics/unknown.jpg' width='40' height='50' alt='' />";
					}
					
					echo "<ul class='legislator-contact'>";

					foreach($c->legislator AS $key=>$value)
					{					
						if(in_array($key, $a))
						{
							if(empty($value)) $value = "Not Available";
							if(strpos($value, "http:") !== false) $value = '<a href="'.$value.'" target="_blank" rel="nofollow">'.$value.'</a>';
							echo "<li>$key:  $value</li>";
						}
					}

					echo "</ul>";
				}
				
				else
				{
					echo "<h3 class='legislator'>".$c->legislator->firstname." ".$c->legislator->lastname." <small>(".$c->legislator->state." ".$c->legislator->district.")</small></h3>";
				}
				
			} 
			
			echo '<div style="clear:both"></div></div>';
			
		}
		else echo "Error1";
	}
	else echo "Error2";
?>