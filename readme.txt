=== CongressLookup ===
Contributors: ConstructiveGrowth, Quick2ouch, gsnarawat, trishahdee
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3ZSYXP8PLH6AJ
Tags: congress, lookup, senator, representative, US congress, find senator, find representative
Requires at least: 3.0
Tested up to: 3.9.1
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Give your visitors the ability to lookup US Congress members for specific zip codes and addresses.

== Description ==

<p>CongressLookup is a free WordPress plugin giving your site visitor an easy way to find United States US senators and representatives.  CongressLookup makes it easier to launch a grassroots campaign for your favorite cause and will keep your visitors on your site instead of sending them to elsewhere to find their legislators.</p>
<p><strong>Where The Data Comes From</strong><br />
CongressLookup uses data provided by Google Maps GeoCoding API and Sunlight Foundation APIs.  For more information and how to obtain your API key see the FAQs.</p>
<p><em>Google Maps GeoCoding API</em><br />
By using this plugin you are bound by the <a title="Google Maps Terms of Use" href="http://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank">Google Maps terms of use</a>.  Google GeoCoding API limits use to 2,500 requests per IP address per day.  We have added a cache feature (default setting is 30 minutes) you can set to reduce the number of requests made to the API.  If you anticipate 2,500 is not enough for your site, please <a title="Contact Us" href="http://constructivegrowth.net/contact-us/">contact us</a> about a custom solution.</p>
<p><em>Sunlight Foundation APIs</em><br />
CongressLookup uses free databases provided by the <a title="Sunlight Foundation: Making government trasparent and accountable" href="http://sunlightfoundation.com/" target="_blank">Sunlight Foundation</a> through the use of an API key registered to the site it will be used on.   To obtain one for your site, <a title="Sunlight Labs Registion for API Key" href="http://services.sunlightlabs.com/accounts/register/" target="_blank">create a free account</a> and it will be emailed to you.</p>
<p>The following information can be displayed for each legislator.  You can turn any of these on/off in the Admin settings:  Birthdate, Congresspedia URL, District, Email, Fax, Gender, Picture, Phone, State, Title, Webform, and Website.</p>
<p><strong>Using CongressLookup Plugin</strong><br />
The minimum information needed to get results is a 5-digit zip code.  However, some zip codes cover more than one congressional district so the more of the address is entered the more accurate the results will be.</p>
<p>CongressLookup is implemented on your WordPress site with use of a shortcode.  See the <a href="http://wordpress.org/plugins/congresslookup/installation/">Installation</a> and <a href="http://wordpress.org/plugins/congresslookup/faq/">FAQs</a> for more information.</p>
<p><strong>Customizing The Look of the Plugin</strong><br />
There are three theme options available: No Theme, Modern and Custom Theme.</p>
<ul>
<li><strong>No Theme</strong>: Uses the core styling from your theme without adding any of it&#8217;s own.</li>
<li><strong>Custom Theme</strong>: Allow you to create your own look using CSS and comes with a demo area to preview your changes.</li>
<li><strong>Modern Theme</strong>: <img class="alignnone size-medium wp-image-81 modern_theme" title="theme_modern" src="http://constructivegrowth.net/site/wp-content/uploads/2012/07/theme_modern-300x136.jpg" alt="" width="300" height="136" /></li>
</ul>
<p><strong>Support</strong><br />
If you have any problems, please see our <a href="http://wordpress.org/plugins/congresslookup/other_notes/" target="_blank">Trouble Shooting Guide</a> before putting in a <a href="http://wordpress.org/support/plugin/congresslookup">support request</a>.
<br /><br />
Please use the CongressLookup plugin <a href="http://wordpress.org/support/plugin/congresslookup">support tab</a> here on the WordPress.org website. Keeping support questions and answers public helps everyone. However, feel free to <a href="http://constructivegrowth.net/contact-us/">contact us here</a> for any other help you may need.</p>
<p><strong>Official Website</strong><br />
http://congresslookup.com</p>

== Installation ==

1. Unzip `CongressLookup.zip` and Upload folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Or in your Plugin page "Add Plugin" search: enter "CongressLookup" then install and activate.
1. To obtain a free Sunlight Labs API key for your site, <a href="http://services.sunlightlabs.com/accounts/register/" target="_blank">create a free account</a> and a key will be emailed to you.
1. <b>IMPORTANT:</b> Click the activation link in the Sunlight Labs email.
1. Enter API key and configure in:  WP Admin > Settings > CongressLookup
1. Use the following shortcodes in a page or post: <br />
Search for Senators and Representatives: `[CongressLookup]`<br />
Search for Senators only: `[CongressLookup show="senator"]`<br />
Search for Representatives only: `[CongressLookup show="representative"]`
1. You can use the following codes in your template, placed outside the loop:<br />
    `<?php echo do_shortcode("[CongressLookup]"); ?>`<br />
    `<?php echo do_shortcode("[CongressLookup show="senator"]"); ?>`<br />
    `<?php echo do_shortcode("[CongressLookup show="representative"]"); ?>`
1. If you have any problems, please see our <a href="http://wordpress.org/plugins/congresslookup/other_notes/" target="_blank">Trouble Shooting Guide</a> before putting in a <a href="http://wordpress.org/support/plugin/congresslookup">support request</a>.

== Frequently Asked Questions ==

= Why does it take so long for CongressLookup to install on my site? =

As per the <a href="http://services.sunlightlabs.com/accounts/register/#tos" target="_blank">terms of use</a> for legislator photos from <a href="http://services.sunlightlabs.com/" target="_blank">Sunlight Labs</a>, you can not directly link (hotlink) to their site.  Therefore, you must host the images locally on your server.  We include the copy of the photos zip file with the plugin and, because of it&#8217;s size, may cause the plugin to install slower then you are used to.</p>

= Where  does the legislator information comes from =

CongressLookup uses data provided by both <a href="https://developers.google.com/maps/documentation/geocoding/" target="_blank">Google GeoCoding API</a> and <a href="http://sunlightfoundation.com/" target="_blank">Sunlight Foundation</a> APIs.</p>

= What are Google Maps API Terms of Use? =

By using this plugin you are bound by both the <a title="Google Maps Terms of Use" href="http://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank">Google Maps terms of use</a> and the <a href="https://developers.google.com/maps/documentation/geocoding/" target="_blank">Google GeoCoding</a> API terms of use. The information presented here and on <a title="CongressLookup Homepage" href="http://constructivegrowth.net/wordpress-plugins/congresslookup/">our website</a> is for informational purposes only and is not intended to be legal advise.</p>

= Why use Google Maps GeoCoding API? =

<a href="https://developers.google.com/maps/documentation/geocoding/" target="_blank">Google GeoCoding API</a> is used to obtain the longitude and latitude of a particular address.  This is the most accurate way to determine within which legislative districts an address is located.</p>

= How accurate is Google GeoCoding data? =

GeoCoding is not 100% accurate.  Sometimes an entered address will not return the correct location.  For this reason, we have included a Google Map the visitor can use to verify the location is correct.</p>

= What if the map location is different from the address entered? =

The plugin&#8217;s Google map has a movable pointer you can click and drag to more accurately target the desired location. The address in the input window (and the corresponding legislators) will automatically recalculate each time the red marker is repositioned.</p>

= How do I tell Google their information is wrong? =

You can tell Google of any inaccuracies by clicking the link in the lower right corner of the map: &#8220;Report a map error&#8221;.</p>

= Are there limits on how many addresses can be looked up with CongressLookup plugin? =

We, the developers, created CongressLookup plugin to be free and do not limit how much you can use it, however, both <a href="https://developers.google.com/maps/documentation/geocoding/" target="_blank">Google GeoCoding</a> and <a href="http://services.sunlightlabs.com/accounts/register/#tos" target="_blank">Sunlight Labs</a> have restrictions and/or limits imposed when using their APIs.  Please consult their websites for more information on the legal use of their APIs.</p>

= What are the <a href="https://developers.google.com/maps/documentation/geocoding/" target="_blank">Google GeoCoding API</a> limitations? =

<a href="https://developers.google.com/maps/documentation/geocoding/" target="_blank">Google GeoCoding API</a> limits its use to 2,500 requests per IP address per day.</p>

= How does the <strong>CongressLookup</strong> Admin cache setting help with the Google GeoCoding limit? =

We have added a cache feature you can set to reduce the number of requests made to the API.  The default setting will clear the cache every 30 minutes.  If you anticipate 2,500 requests per day will not be enough for your site, even with the caching, please <a title="Contact Us" href="http://constructivegrowth.net/contact-us/">contact us</a> about a custom solution.</p>

= What is the <a href="http://services.sunlightlabs.com/" target="_blank">Sunlight Lab API</a> used for? =

CongressLookup uses free databases provided by the <a title="Sunlight Foundation: Making government trasparent and accountable" href="http://sunlightfoundation.com/" target="_blank">Sunlight Foundation</a> whose mission is to make government more transparent and accessible.  Part of what they do is maintain free databases of information about the US government.  We make use of their legislator information and legislator photos databases in CongressLookup plugin.  <a title="Sunlight Labs APIs" href="http://services.sunlightlabs.com/" target="_blank">From Sunlight Labs website</a>:

<blockquote>Sunlight Labs takes data inside and about government and transforms it into services developers can use. We do it for free because we think that if people can see what&#8217;s going on, it makes the country better. It might not sound like the most glamorous life ever, but it&#8217;s pretty great for us, as long as you make use of it.<br /></blockquote>

= Why do I need my own Sunlight Labs API key? =

You must use your own API key because it is required by their <a title="Sunlight Labs API Terms of Service" href="http://services.sunlightlabs.com/accounts/register/#tos" target="_blank">terms of service</a>:</p>
<blockquote>Usage of Sunlight Services depends upon an API key which should only be used by the individual/organization which requested it. Sharing or distribution of API keys is not permitted.<br /></blockquote>

= How do I get a Sunlight Lab API key? =

To obtain a free API key for your site, <a title="Sunlight Labs Registion for API Key" href="http://services.sunlightlabs.com/accounts/register/" target="_blank">create a free account</a> and it will be emailed to you.</p>

= How do I use the Sunlight Lab API key? =

Simply enter and save it on the CongressLookup Admin Settings page.

= Where is the CongressLookup settings page located? =

WP Admin &gt; Settings &gt; CongressLookup
<img class="alignnone size-medium wp-image-207" style="border: 1px solid #eee;" title="congresslookup_admin_settings" src="http://constructivegrowth.net/site/wp-content/uploads/2012/07/congresslookup_admin_settings-300x225.jpg" alt="" width="300" height="225" />

= Why must I host the legislator photos on my site? =

As per the <a href="http://services.sunlightlabs.com/accounts/register/#tos" target="_blank">terms of use</a> for legislator photos from <a href="http://services.sunlightlabs.com/" target="_blank">Sunlight Labs</a>, you can not directly link (hotlink) to their site.  Therefore, you must host the images locally on your server.  We include the copy of the photos zip file with the plugin and, because of it&#8217;s size, may cause the plugin to install slower then you are used to.</p>

= Why are the pictures not showing or are the wrong pictures? =

Members of Congress change after elections and sometimes leave or are replaced midterm.  When this happens, your locally hosted zip file of their pictures needs to be updated to stay accurate.  There is a button in the plugin Admin settings to download the most recent copy of the picture zip file.  Note: when the Sunlight Labs picture folder changes, you will receive a notice in your WP Admin to update the pictures.</p>

= What legislator information can be displayed? =

The following information can be displayed for each legislator.  You can turn any of these on/off in the Admin settings:</p>
<ul style="margin: -10px 0 20px 100px;">
 <li>Title</li>
 <li>First Name</li>
 <li>Last Name</li>
 <li>Picture</li>
 <li>Chamber</li>
 <li>State Rank</li>
 <li>State Name</li>
 <li>Website</li>
 <li>Contact Form</li>
 <li>Fax</li>
 <li>Phone</li>
 <li>Party</li>
 <li>Name Suffix</li>
 <li>Middle Name</li>
 <li>Facebook ID</li>
 <li>Youtube ID</li>
 <li>Twitter ID</li>
 <li>Votesmart ID</li>
 <li>Office</li>
 <li>Term End</li>
<li>Term Start</li>
</ul>

= How much information must be entered in the address field to get results? =

Minimum information needed is a 5-digit zip code.  However, some zip codes cover more than one congressional district so the more of the address is entered, the more accurate the results will be.</p>

= Can I change the look of the plugin? =

There are three themes to choose from:</p>
<ul>
<li><strong>Modern Theme</strong>: By default.</li>
<li><strong>No Theme</strong>: Uses the core styling from your theme without adding any of it&#8217;s own.</li>
<li><strong>Custom Theme</strong>: Allows you to create your own look using CSS and comes with a demo area to preview your changes.</li>
</ul>

= How do I use CongressLookup on my site? =

Use the following shortcode in a page or post:</p>
<p>&#91;CongressLookup&#93;</p>
<p>Use the following code in your template, outside of the loop:</p>
&lt;?php echo do_shortcode("&#91;CongressLookup&#93;"); ?&gt;

= How do I contact support? =

Please use the CongressLookup plugin <a href="http://wordpress.org/support/plugin/congresslookup">Support Tab</a> above.  Keeping support questions and answers public helps everyone.  But feel free to <a href="http://constructivegrowth.net/contact-us/">contact us here</a> for any other help you may need.</p>

<p><strong>Official Website</strong><br />
http://congresslookup.com</p>


== Troubleshooting ==

If CongressLookup is not working properly, please try the following steps:
<br /><br />
1. API NOT ACTIVATED: In the Sunlight Labs email, the one they sent you with your API key, make sure you have clicked the activation link.
<br /><br />
2. PLUGIN CONFLICT: Please try deactivating all plugins except CongressLookup. If CongressLookup does then work, turn on one plugin at a time and test it again until you find the plugin it conflicts with. Please let us know what plugin this is.
<br /><br />
3. THEME CONFLICT: If there is still an issue after testing for a plugin conflict, and all other plugins are turned off, please try temporarily switching to another theme.  We recommend trying one of the default WordPress themes.
<br /><br />
4. SERVER SETTINGS: If none of the above has helped, please tell your webmaster to enable allow-url-fopen in php.ini
http://www.php.net/manual/en/filesystem.configuration.php#ini.allow-url-fopen<br />
Whe doing this, disable the cache option for testing, then when allow-url-fopen is enabled and CongressLookup works only then enable the cache again.
<br /><br />
5. If you are still having any issues, please put in a <a href="http://wordpress.org/support/plugin/congresslookup">support request</a>.

== Screenshots ==

1. CongressLookup frontend with Modern theme screenshot-1.jpg
1. WP Admin > Settings > CongressLookup screenshot-2.jpg

== Changelog ==

= 2.01 =
* Update 01 June 2014
1. Added two new shortcodes for displaying (1) US Senators only, and (2) US Representatives only.

= 2.0 =
* Update 15 May 2014
1. Replaced the use of deprecated Sunlight Labs <b>Congress API</b> with more comprehensive <b>Sunlight Congress API</b>.
1. Added more congressperson stats, now available from new API, with checkboxes in admin.
1. Added ability for admin to choose to display only Senators, only Representatives, or both (default) from a dropdown menu in admin.
1. Minor CSS changes

= 1.0 =
* Original version, 23 August 2012

== Upgrade Notice ==

= 2.1 =
Add two new shortcodes for searching US Senators only and US Representatives only.

= 2.0 =
Upgrade is necessary before the 2014 Congress inauguration (January 2015), which is when the deprecated Sunlight Foundation Congress API will stop working.

