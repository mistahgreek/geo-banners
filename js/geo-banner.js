jQuery(document).ready(function($) {
    geoip_detect.get_info().then(function(record) {
        var countryCode = record.get('country.iso_code');
        console.log('Detected Country Code:', countryCode);

        // Fetch the allowed countries from the localized PHP variable
        var allowedCountries = geo_banner_data.allowed_countries.split(',');

        // Check if the detected country is in the allowed countries list
        if (allowedCountries.includes(countryCode)) {
            $('#geo-banner').show();  // Show the banner if country is allowed
        } else {
            $('#geo-banner').hide();  // Hide the banner for other countries
        }

        // Set the image link dynamically from PHP
        var link = geo_banner_data.banner_link;
        if (link) {
            $('#geo-banner img').wrap('<a href="' + link + '" target="_blank"></a>');
        }
    }).catch(function(err) {
        console.error('Error fetching geolocation info:', err);
    });
});
