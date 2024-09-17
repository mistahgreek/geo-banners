jQuery(document).ready(function($) {
    geoip_detect.get_info().then(function(record) {
        var countryCode = record.get('country.iso_code');
        console.log('Detected Country Code:', countryCode);

        if (countryCode === 'US' || countryCode === 'GR') {
            $('#geo-banner').show();  // Show the banner for U.S. and Greece
        } else {
            $('#geo-banner').hide();  // Hide the banner for other countries (default is hidden)
        }
    }).catch(function(err) {
        console.error('Error fetching geolocation info:', err);
    });
});
