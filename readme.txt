=== Geo Banners ===
Contributors: mrfriendly
Tags: banners, geo, geolocation, geotargeting, advertisement
Requires at least: 5.6
Requires PHP: 5.6
Tested up to: 6.6.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display targeted banners based on user geolocation. You can use shortcodes or display them site-wide for specific countries.

== Description ==

Geo Banners plugin allows you to display custom banners based on the user's location. You can upload separate images for desktop and mobile devices, and configure the banner to only show in specific countries.

Features:
* Display desktop and mobile banners.
* Target specific countries using Geolocation services.
* Use a shortcode or enable site-wide banners.
* Includes simple admin interface for managing banners.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/geo-banners` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Since the Geo Banners plugin requires the GeoIP Detect plugin to determine the user's location based on their IP address, you can install the Geolocation IP Detection (By Yellow Tree (Benjamin Pick) plugin) from the WordPress plugin repository.
4. Configure the GeoIP plugin, based on your proxy settings or if you're using Cloudflare and pick a database of your choice.
4. Navigate to the Geo Banners menu in the WordPress admin to configure the plugin.

== Frequently Asked Questions ==

Yes, the Geo Banners plugin requires the GeoIP Detect plugin to determine the user's location based on their IP address. You can install the Geolocation IP Detection (By Yellow Tree (Benjamin Pick) plugin) from the WordPress plugin repository for full geolocation functionality. Once installed, Geo Banners will use the location data from GeoIP Detect to display banners to users in targeted countries.

You can use the shortcode `[geo_banner_custom]` to display the banner in a post or page.

= How do I add a banner to a specific post or page? =

You can use the shortcode `[geo_banner_custom]` to display the banner in a post or page.

= Can I display the banner site-wide? =

Yes, simply enable the "Site-Wide Banner Display" option in the plugin settings.

= Does this plugin require a geolocation service? =

Yes, this plugin integrates with the GeoIP Detect plugin to detect user locations.

= How do I enter custom css in the plugin? =

Hover over the custom css section titles info box to view examples on how to enter custom css.

== Screenshots ==

1. **Geo Banners Settings Page**  
   The plugin's settings page allows you to upload separate desktop and mobile images, set a link, and select the countries where the banner will be shown.

2. **Desktop Site Wide Preview**  
   This screenshot shows a preview of the banner in desktop format, allowing you to see how it will appear to users when using site-wide mode.

3. **Mobile Shortcode Preview**  
   This screenshot shows a preview of the banner in mobile format, allowing you to see how it will appear to users when using a shortcode.

== Changelog ==

= 1.0 =
* Initial release with desktop/mobile banner functionality, country targeting, and shortcode support. Ensure GeoIP Detect is installed for full functionality.

== License ==

This plugin is licensed under the GPLv2 or later. For more information, see https://www.gnu.org/licenses/gpl-2.0.html.
