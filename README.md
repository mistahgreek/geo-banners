Geo Banners Plugin - Documentation
Version: 3.0.0
Author: Peter Panagiotis Floros
Live Chat: Tawk.to Live Chat
Support Website: Isodos Technology Partners
------------------------------
Table of Contents
1. Introduction
2. Installation & Activation
3. Plugin Structure
4. Plugin Functionality
5. Shortcodes
6. Admin Settings
7. Security Measures
8. Styling and Customization
9. GeoIP Plugin Integration
10. Documentation Access
11. Contact & Support
------------------------------

1. Introduction
The Geo Banners Plugin allows administrators to display banners on their WordPress site based on a visitor's geolocation. Banners can be
shown globally (site-wide) or only on specific pages using shortcodes. This plugin integrates seamlessly with GeoIP technology to detect the
user’s location and serve country-specific content.
The plugin is highly customizable, allowing you to select specific countries for which the banners are displayed, and it offers shortcode
support, custom CSS options, and full site-wide integration.

2. Installation & Activation
Install the Plugin: Visit WordPress’s plugin dashboard and upload the .zip file.
Activate the Plugin: Once installed, click on Activate. You’ll be able to find the settings on the left menu (at the very bottom).

3. Plugin Structure
Here is an overview of the structure of the plugin and the purpose of key files:

/geo-banners
 ├── /css
 │ └── geo-banner-styles.css # Styles for frontend display of banners
 ├── /js
 │ └── geo-banner.js # JavaScript to control banner functionality and display logic
 ├── /admin
 │ └── admin.css # Styles for admin settings page
 ├── /documentation
 │ └── documentation.pdf # Full plugin documentation for the user
 ├── geo-banners.php # Core plugin file, contains main plugin logic
 └── license.txt # License file (GPL-2.0-or-later)

• geo-banners.php: This is the core plugin file that contains the main logic for banner display, country detection, shortcodes, and
integration with GeoIP.
• /css/: Contains styles that define the appearance of banners on the front-end.
• /js/: Contains JavaScript necessary for handling banner display logic (e.g., showing the banner based on user’s geolocation).
• /admin/: Contains styles related to the admin settings page.
• /documentation/: Holds a PDF file that documents how the plugin works for user reference.

5. Plugin Functionality
Geolocation-Based Banners:

The core functionality of the plugin is to display banners to users based on their geographical location. This is achieved using GeoIP
detection that identifies the visitor's country, and based on your configuration, the relevant banner is displayed.
Core Features:

• Country-Specific Banners: Select which countries should see a banner.
• AJAX Banner Loading: Banners are loaded asynchronously using AJAX, ensuring optimal page load performance.
• Shortcode Integration: You can display banners on specific posts or pages using a shortcode.
• Site-Wide Banner Option: Enable a global option to display the banner on all pages.

7. Shortcodes
The plugin provides the following shortcode for placing banners on specific pages or posts.
Shortcode:
[geo_banner_custom]

Usage:
1. To display a country-specific banner: Simply add the shortcode [geo_banner_custom] anywhere in the content editor, and the
plugin will check the user’s country and display the corresponding banner if applicable.
2. Site-Wide Banners: This option can be enabled through the admin settings. It ensures that the banner is displayed on every page
of the site at the top of each page.
6. Admin Settings

The plugin provides an intuitive settings page in the WordPress admin interface, accessible via Geo Banners in the left-hand menu.
Options Available:
1. Banner Configuration:
o Enable or disable the banner globally.
2. Site-Wide Display:
o Choose whether to show the banner across the entire website.
3. Banner Image:
o Upload or select the banner image from the WordPress media library.
4. Country Selection:
o Specify the countries where the banner should be displayed.
5. Custom CSS:
o Add custom CSS for both the banner container and the image, allowing full customization of the banner's appearance.
7. Security Measures

The plugin incorporates several security features:
• Sanitized Input: All user inputs from the admin settings page are sanitized using wp_strip_all_tags and esc_url to prevent XSS
(Cross-Site Scripting) attacks.
• Nonces for Form Submission: The plugin ensures that form submissions on the admin page are secure by using WordPress
nonces (check_admin_referer) to prevent CSRF (Cross-Site Request Forgery) attacks.
• Escaped Output: All dynamically generated content that is displayed in the front-end and admin area is escaped using esc_html()
and esc_attr() functions to avoid malicious content injection.

8. Styling and Customization
You can fully customize the appearance of the banners via the admin panel:
1. Custom CSS for Banner Image: Apply custom CSS directly to the <img> tag of the banner.
2. Custom CSS for Banner Container: Apply custom CSS to the <div> container that wraps the banner image.

Note: Custom CSS styles only apply to site-wide activation. However, Customer CSS for the Banner Image applies in both cases.
Responsive Styles: The styles defined in /css/geo-banner-styles.css ensure that the banners are responsive and mobile-friendly.

9. GeoIP Plugin Integration

For country detection, the plugin relies on the GeoIP Detection plugin. If this plugin is not installed or activated, the Geo Banners Plugin
provides the following functionalities:
1. Install GeoIP Plugin: If the plugin is not installed, a button will appear in the admin panel allowing you to install it automatically.
2. Activate GeoIP Plugin: If the plugin is installed but not active, you will see a button to activate it.

Installation URL:
When the GeoIP plugin is missing or inactive, you can click the Install/Activate button under the Geo Banners settings, and the plugin will
handle it automatically.

10. Documentation Access
You can access the detailed plugin documentation in the documentation.pdf file located inside the plugin directory:
/var/www/html/wp-content/plugins/geo-banners/documentation.pdf
This PDF contains a comprehensive overview of how to configure and use the plugin.

11. Contact & Support
For any issues, feature requests, or support queries, please contact us:
• Live Chat: Tawk.to Live Chat
• Website: Isodos Technology Partners
