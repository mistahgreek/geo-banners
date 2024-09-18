<?php
/*
Plugin Name: Geo Banners
Description: Display banners based on user geolocation using AJAX and shortcode or site-wide option.
Version: 1.0.0
Author: Peter Panagiotis Floros
Author URI: https://tawk.to/isodos
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

define('GEO_BANNERS_VERSION', '1.0.0');

// List of countries
function geo_banners_get_countries() {
    return array(
        'AF' => 'Afghanistan',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia (Plurinational State of)',
        'BQ' => 'Bonaire, Sint Eustatius and Saba',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'CV' => 'Cabo Verde',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic of the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Côte d\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CW' => 'Curaçao',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'SZ' => 'Eswatini',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDonald Islands',
        'VA' => 'Holy See',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran (Islamic Republic of)',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea (Democratic People\'s Republic of)',
        'KR' => 'Korea, Republic of',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia (Federated States of)',
        'MD' => 'Moldova, Republic of',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MK' => 'North Macedonia',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestine, State of',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Réunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthélemy',
        'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin (French part)',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SX' => 'Sint Maarten (Dutch part)',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'SS' => 'South Sudan',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard and Jan Mayen',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan, Province of China',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania, United Republic of',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Minor Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela (Bolivarian Republic of)',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands (British)',
        'VI' => 'Virgin Islands (U.S.)',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    );
}

// Function to display the banner container based on country
function geo_banners_shortcode_custom() {
    // Check if the banner functionality is active
    if (get_option('geo_banners_active') != '1') {
        return ''; // Do not display anything if the banner is not active
    }

    // Get stored options for desktop image, mobile image, and link URL
    $banner_image = get_option('geo_banners_image');
    $banner_mobile_image = get_option('geo_banners_mobile_image');
    $banner_link = get_option('geo_banners_image_link');
    $allowed_countries = get_option('geo_banners_allowed_countries', array());

    // Get the user's country code using the GeoIP plugin
    if (function_exists('geoip_detect2_get_info_from_current_ip')) {
        $location = geoip_detect2_get_info_from_current_ip();
        $user_country = isset($location->raw['country']['iso_code']) ? $location->raw['country']['iso_code'] : '';
    } else {
        $user_country = ''; // Default country code if GeoIP is not available
    }

    // Check if the user's country is in the allowed countries list
    if (in_array($user_country, $allowed_countries)) {
        // Append a timestamp to bust cache for both desktop and mobile images
        $banner_image .= $banner_image ? '?v=' . time() : '';
        $banner_mobile_image .= $banner_mobile_image ? '?v=' . time() : '';

        // Start building the HTML output
        $output = '<div id="geo-banner" class="geo-banner" style="display:none;">';

        // If a link is provided, wrap the images in an anchor tag
        if ($banner_link) {
            $output .= '<a href="' . esc_url($banner_link) . '" target="_blank">';
        }

        // Display desktop image if available
        if ($banner_image) {
            $output .= '<div class="geo-banner-desktop"><img src="' . esc_url($banner_image) . '" alt="Geo Banner"></div>';
        }

        // Display mobile image if available
        if ($banner_mobile_image) {
            $output .= '<div class="geo-banner-mobile"><img src="' . esc_url($banner_mobile_image) . '" alt="Mobile Geo Banner"></div>';
        }

        // Close the anchor tag if a link is provided
        if ($banner_link) {
            $output .= '</a>';
        }

        $output .= '</div>';

        return $output; // Return the banner HTML
    }

    return ''; // Return nothing if the user's country is not allowed
}
add_shortcode('geo_banner', 'geo_banners_shortcode_custom');

// Function to display the banner site-wide if enabled
function geo_banners_site_wide_display_custom() {
    // Check if site-wide display is enabled and add the shortcode content at the top of the page
    if (get_option('geo_banners_site_wide') == '1') {
        echo do_shortcode('[geo_banner]');
    }
}
add_action('wp_head', 'geo_banners_site_wide_display_custom');

// Enqueue front-end CSS and JS files
function geo_banners_enqueue_styles_scripts() {
    global $post;

    // Ensure we are in a proper page context to check content
    if (is_a($post, 'WP_Post')) {
        // Check if the post has the shortcode [geo_banner] in its content
        $has_shortcode = has_shortcode($post->post_content, 'geo_banner');
    } else {
        $has_shortcode = false;
    }

    // Load CSS and JS only when the banner is active, site-wide display is enabled, or the shortcode is present
    if (get_option('geo_banners_active') == '1' || get_option('geo_banners_site_wide') == '1' || $has_shortcode) {
        // Enqueue the CSS file if it's needed
        $css_version = filemtime(plugin_dir_path(__FILE__) . 'css/geo-banner-styles.css');
        wp_enqueue_style('geo-banner-styles', plugins_url('/css/geo-banner-styles.css', __FILE__), array(), $css_version);

        // Enqueue the JS file if it's needed
        $js_version = filemtime(plugin_dir_path(__FILE__) . 'js/geo-banner.js');
        wp_enqueue_script('geo-banner-scripts', plugins_url('/js/geo-banner.js', __FILE__), array('jquery'), $js_version, true);

        // Ensure the JavaScript loads asynchronously to avoid blocking
        add_filter('script_loader_tag', 'add_defer_and_async_attributes', 10, 2);
    }
}
add_action('wp_enqueue_scripts', 'geo_banners_enqueue_styles_scripts');

// Add async and defer attributes to the geo-banner.js script
function add_defer_and_async_attributes($tag, $handle) {
    if ('geo-banner-scripts' === $handle) {
        return str_replace('src', 'async="async" defer="defer" src', $tag);
    }
    return $tag;
}



// Admin page for managing the banner settings
function geo_banners_menu_custom() {
    add_menu_page('Geo Banners', 'Geo Banners', 'manage_options', 'geo-banners', 'geo_banners_page_custom', 'dashicons-flag', 100);
}
add_action('admin_menu', 'geo_banners_menu_custom');

// Admin page content
function geo_banners_page_custom() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Check if the form has been submitted and handle the updates
    if (isset($_POST['submit'])) {
        check_admin_referer('geo_banners_nonce');

        // Sanitize and update options
        if (isset($_POST['geo_banners_active'])) {
            update_option('geo_banners_active', '1');
        } else {
            update_option('geo_banners_active', '0');
        }

        if (isset($_POST['geo_banners_site_wide'])) {
            update_option('geo_banners_site_wide', '1');
        } else {
            update_option('geo_banners_site_wide', '0');
        }

        if (isset($_POST['geo_banners_image'])) {
            $geo_banners_image = sanitize_text_field(wp_unslash($_POST['geo_banners_image']));
            update_option('geo_banners_image', esc_url($geo_banners_image));
        }

        if (isset($_POST['geo_banners_mobile_image'])) {
            $geo_banners_mobile_image = sanitize_text_field(wp_unslash($_POST['geo_banners_mobile_image']));
            update_option('geo_banners_mobile_image', esc_url($geo_banners_mobile_image));
        }

        if (isset($_POST['geo_banners_image_link'])) {
            $geo_banners_image_link = sanitize_text_field(wp_unslash($_POST['geo_banners_image_link']));
            update_option('geo_banners_image_link', esc_url($geo_banners_image_link));
        }

        if (isset($_POST['geo_banners_allowed_countries'])) {
            $geo_banners_allowed_countries = array_map('sanitize_text_field', wp_unslash($_POST['geo_banners_allowed_countries']));
            update_option('geo_banners_allowed_countries', $geo_banners_allowed_countries);
        }

        if (isset($_POST['geo_banners_custom_css'])) {
            $geo_banners_custom_css = sanitize_text_field(wp_unslash($_POST['geo_banners_custom_css']));
            update_option('geo_banners_custom_css', $geo_banners_custom_css);
        }

        if (isset($_POST['geo_banners_container_css'])) {
            $geo_banners_container_css = sanitize_text_field(wp_unslash($_POST['geo_banners_container_css']));
            update_option('geo_banners_container_css', $geo_banners_container_css);
        }

        echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
    }

    // Fetch stored options to display in the form
    $banner_active = get_option('geo_banners_active', '0');
    $banner_site_wide = get_option('geo_banners_site_wide', '0');
    $banner_image = get_option('geo_banners_image', '');
    $banner_mobile_image = get_option('geo_banners_mobile_image', '');
    $banner_link = get_option('geo_banners_image_link', '');
    $allowed_countries = get_option('geo_banners_allowed_countries', array());
    $custom_css_img = get_option('geo_banners_custom_css', '');
    $custom_css_container = get_option('geo_banners_container_css', '');

    // Output the admin page HTML
    ?>
    <div class="wrap geo-banners-settings">
        <h1>🌍 Geo Banners Settings</h1>
        <div class="geo-banners-container">
            <div class="geo-banners-left">
                <form method="post" action="">
                    <?php wp_nonce_field('geo_banners_nonce'); ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Enable Geo Banner</th>
                            <td>
                                <input type="checkbox" name="geo_banners_active" value="1" <?php checked($banner_active, '1'); ?> />
                                <label for="geo_banners_active">Enable banner functionality</label>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Site-wide Banner</th>
                            <td>
                                <input type="checkbox" name="geo_banners_site_wide" value="1" <?php checked($banner_site_wide, '1'); ?> />
                                <label for="geo_banners_site_wide">Display banner on all pages site-wide</label>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Desktop Banner Image</th>
                            <td>
                                <input type="hidden" id="geo_banners_image" name="geo_banners_image" value="<?php echo esc_url($banner_image); ?>" />
                                <button class="button button-primary" id="upload_image_button">Select Desktop Image</button>
                                <p><img id="geo_banners_image_preview" src="<?php echo esc_url($banner_image); ?>" style="max-width: 300px; display: <?php echo $banner_image ? 'block' : 'none'; ?>;" /></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Mobile Banner Image</th>
                            <td>
                                <input type="hidden" id="geo_banners_mobile_image" name="geo_banners_mobile_image" value="<?php echo esc_url($banner_mobile_image); ?>" />
                                <button class="button button-primary" id="upload_mobile_image_button">Select Mobile Image</button>
                                <p><img id="geo_banners_mobile_image_preview" src="<?php echo esc_url($banner_mobile_image); ?>" style="max-width: 300px; display: <?php echo $banner_mobile_image ? 'block' : 'none'; ?>;" /></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Banner Link URL</th>
                            <td>
                                <input type="url" name="geo_banners_image_link" value="<?php echo esc_url($banner_link); ?>" style="width: 100%;" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Countries to Display Banner</th>
                            <td>
                                <select name="geo_banners_allowed_countries[]" multiple="multiple" style="width: 100%; height: 150px;">
                                    <?php
                                    $countries = geo_banners_get_countries();
                                    foreach ($countries as $country_code => $country_name) {
                                        echo '<option value="' . esc_attr($country_code) . '" ' . (in_array($country_code, $allowed_countries) ? 'selected="selected"' : '') . '>' . esc_html($country_name) . '</option>';
                                    }
                                    ?>
                                </select>
                                <p>Hold Shift or Ctrl to select multiple countries.</p>
                            </td>
                        </tr>
                    </table>
                    
                    <?php submit_button('Save Changes'); ?>
                </form>
            </div>

            <div class="geo-banners-right">
                <!-- Instructions Box -->
                <div class="geo-instructions-box" style="border: 1px solid #ddd; padding: 15px; border-radius: 10px; background-color: #f9f9f9;">
                    <h2>How to Use</h2>
                    <p>To use this plugin, enable the banner by checking the "Enable the banner" option.</p>
                    <p>To display the banner site-wide, check the "Show banner site-wide" option.</p>
                    <p>If you want to use the banner only on specific pages or posts, use the following shortcode:</p>
                    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-top: 20px;">
                        <!-- Shortcode box for copying the shortcode -->
                        <div id="shortcode-box" style="display: inline-block; background-color: #d1d2f5; padding: 10px; border-radius: 8px; cursor: pointer;" onclick="copyShortcode()">
                            <code id="shortcode-text">[geo_banner]</code>
                        </div>
                        <p id="copy-message" style="color: green; display: none; margin-top: 10px;">✔️ Shortcode has been copied to clipboard</p>
                    </div>
                </div>

                <!-- IP and Location Box -->
                <div class="geo-location-box" style="margin-top: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 10px; background-color: #f9f9f9;">
                    <h2>Your IP and Location</h2>
                    <?php
                    $geoip_plugin_slug = 'geoip-detect/geoip-detect.php';
                    $geoip_plugin_url = 'https://downloads.wordpress.org/plugin/geoip-detect.latest-stable.zip';

                    if (is_plugin_active($geoip_plugin_slug)) :
                        $location = geoip_detect2_get_info_from_current_ip();
                        ?>
                        <p>The IP address <strong><?php echo esc_html($location->raw['traits']['ip_address']); ?></strong> has been resolved to <strong><?php echo esc_html($location->raw['country']['names']['en']); ?>.</strong></p>

                        <div style="margin-top: 15px;">
                            <p>Not your IP & Country? If you are behind a proxy or your website is using Cloudflare, you'll need to configure the settings of Geo IP.</p>
                            <a href="<?php echo esc_url('/wp-admin/options-general.php?page=geoip-detect%2Fgeoip-detect.php'); ?> " class="button" style="display: inline-block; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px;">
                                Configure
                            </a>
                        </div>
                    <?php elseif (file_exists(WP_PLUGIN_DIR . '/' . $geoip_plugin_slug)) : ?>
                        <div style="margin-top: 15px;">
                            <p>The GeoIP plugin is installed but not activated.</p>
                        </div>
                    <?php else : ?>
                        <p>GeoIP plugin is not installed.</p>
                        <a href="<?php echo esc_url($geoip_plugin_url); ?>" class="button" style="display: inline-block; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px;">
                            Install
                        </a>
                    <?php endif; ?>
                </div>
                <!-- Advise Box -->
                <div class="geo-suggestion-box" style="margin-top: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 10px; background-color: #f9f9f9;">
                    <h2>Have a Suggestion for Improvement?</h2>
                    <p>If you have any suggestions or feedback regarding the Geo Banners plugin, I would like to hear from you.</p>

                    <div style="margin-top: 15px;">
                        <a href="mailto:peter@isodos.ca?subject=Geo%20Banners%20Suggestion&body=Hi,%20I%20have%20the%20following%20suggestion%20for%20the%20plugin:%20"
                           class="button" 
                           style="display: inline-block; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px;">
                           Email a Suggestion
                        </a>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <?php
}

// Function to add Tawk.to Live Chat script only on the Geo Banners admin page
function geo_banners_add_tawkto_script() {
    ?>
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e3a11ea298c395d1ce63df2/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <?php
}

// Enqueue Admin CSS and JS only for the Geo Banners admin page
function geo_banners_admin_enqueue_scripts($hook) {
    if ($hook !== 'toplevel_page_geo-banners') {
        return;
    }

    wp_enqueue_style('geo-banners-admin-css', plugins_url('/css/admin.css', __FILE__), array(), filemtime(plugin_dir_path(__FILE__) . 'css/admin.css'));
    wp_enqueue_script('geo-banners-admin-js', plugins_url('/js/admin.js', __FILE__), array('jquery'), filemtime(plugin_dir_path(__FILE__) . 'js/admin.js'), true);
    wp_enqueue_media();

    geo_banners_add_tawkto_script();
}
add_action('admin_enqueue_scripts', 'geo_banners_admin_enqueue_scripts');
