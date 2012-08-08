=== CongressLookup ===
Contributors: ConstructiveGrowth, Quick2ouch, trishahdee
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3ZSYXP8PLH6AJ
Tags: congress, lookup, senator, representative, US congress, find senator, find representative
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Give your visitors the ability to lookup US Congress members for specific zip codes and addresses.

== Description ==

<p>CongressLookup is a free WordPress plugin giving your site visitor an easy way to find United States congressional representatives.  CongressLookup makes it easier to launch a grassroots campaign for your favorite cause and will keep your visitors on your site instead of sending them to elsewhere to find their legislators.</p>
<p><strong>Where The Data Comes From</strong><br />
CongressLookup uses data provided by Google Maps GeoCoding API and Sunlight Foundation APIs.  For more information and how to obtain your API key see the FAQs.</p>
<p><em>Google Maps GeoCoding API</em><br />
By using this plugin you are bound by the <a title="Google Maps Terms of Use" href="http://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank">Google Maps terms of use</a>.  Google GeoCoding API limits use to 2,500 requests per IP address per day.  We have added a cache feature (default setting is 30 minutes) you can set to reduce the number of requests made to the API.  If you anticipate 2,500 is not enough for your site, please <a title="Contact Us" href="http://constructivegrowth.net/contact-us/">contact us</a> about a custom solution.</p>
<p><em>Sunlight Foundation APIs</em><br />
CongressLookup uses free databases provided by the <a title="Sunlight Foundation: Making government trasparent and accountable" href="http://sunlightfoundation.com/" target="_blank">Sunlight Foundation</a> through the use of an API key registered to the site it will be used on.   To obtain one for your site, <a title="Sunlight Labs Registion for API Key" href="http://services.sunlightlabs.com/accounts/register/" target="_blank">create a free account</a> and it will be emailed to you.</p>
<p>The following information can be displayed for each legislator.  You can turn any of these on/off in the Admin settings:  Birthdate, Congresspedia URL, District, Email, Fax, Gender, Picture, Phone, State, Title, Webform, and Website.</p>
<p><strong>Using CongressLookup Plugin</strong><br />
The minimum information needed to get results is a 5-digit zip code.  However, some zip codes cover more than one congressional district so the more of the address is entered the more accurate the results will be.</p>
<p>CongressLookup is implemented on your WordPress site with use of a shortcode.  See the <a href="http://constructivegrowth.net/wordpress-plugins/congresslookup/congresslookup-faqs/#quick">Quick Start Guide</a> and <a href="http://constructivegrowth.net/wordpress-plugins/congresslookup/congresslookup-faqs/#faq">FAQs</a> for more information.</p>
<p><strong>Customizing The Look of the Plugin</strong><br />
There are three theme options available: No Theme, Modern and Custom Theme.</p>
<ul>
<li><strong>No Theme</strong>: Uses the core styling from your theme without adding any of it&#8217;s own.</li>
<li><strong>Custom Theme</strong>: Allow you to create your own look using CSS and comes with a demo area to preview your changes.</li>
<li><strong>Modern Theme</strong>: <img class="alignnone size-medium wp-image-81 modern_theme" title="theme_modern" src="http://constructivegrowth.net/site/wp-content/uploads/2012/07/theme_modern-300x136.jpg" alt="" width="300" height="136" /></li>
</ul>
<p><strong>Support</strong><br />
Please use the CongressLookup plugin support tab on the WordPress.org website. Keeping support questions and answers public helps everyone. But feel free to <a href="http://constructivegrowth.net/contact-us/">contact us here</a> for any other help you may need.</p>
<p><strong>Official Website</strong><br />
http://congresslookup.com</p>
== Installation ==

1. Unzip `CongressLookup.zip` and Upload folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure in:  Settings > CongressLookup
1. Use shortcode [CongressLookup] in posts and pages, or place `<?php echo do_shortcode("[CongressLookup]"); ?>` in your templates.

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

CongressLookup uses free databases provided by the <a title="Sunlight Foundation: Making government trasparent and accountable" href="http://sunlightfoundation.com/" target="_blank">Sunlight Foundation</a> whose mission is to make government more transparent and accessible.  Part of what they do is maintain free databases of information about the US government.  We make use of their legislator information and legislator photos databases in CongressLookup plugin.  <a title="Sunlight Labs APIs" href="http://services.sunlightlabs.com/" target="_blank">From Sunlight Labs website</a>:</p>

<blockquote>Sunlight Labs takes data inside and about government and transforms it into services developers can use. We do it for free because we think that if people can see what&#8217;s going on, it makes the country better. It might not sound like the most glamourous life ever, but it&#8217;s pretty great for us, as long as you make use of it.<br /></blockquote>

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
<li>Birthdate,</li>
<li>Congresspedia URL,</li>
<li>District,</li>
<li>Email (not usually publicized any longer),</li>
<li>Fax,</li>
<li>Gender,</li>
<li>Picture,</li>
<li>Phone,</li>
<li>State,</li>
<li>Title,</li>
<li>Webform (web-based contact form), and</li>
<li>Website.</li>
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

Please use the CongressLookup plugin support tab on the WordPress.org website.  Keeping support questions and answers public helps everyone.  But feel free to <a href="http://constructivegrowth.net/contact-us/">contact us here</a> for any other help you may need.</p>

<p><strong>Official Website</strong><br />
http://congresslookup.com</p>

== Screenshots ==

1. CongressLookup frontend with Modern theme screenshot-1.jpg
1. Settings > CongressLookup screenshot-2.jpg

== Changelog ==

= 1.0 =
* Original version

== Upgrade Notice ==

= 1.0 =
No upgrade necessary

