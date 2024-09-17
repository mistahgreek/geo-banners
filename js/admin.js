jQuery(document).ready(function ($) {
    var desktop_uploader, mobile_uploader;

    // Media uploader for selecting the desktop banner image
    $('#upload_image_button').click(function (e) {
        e.preventDefault();

        // If the uploader already exists, open it
        if (desktop_uploader) {
            desktop_uploader.open();
            return;
        }

        // Create a new media uploader for desktop
        desktop_uploader = wp.media({
            title: 'Select Desktop Banner',
            button: { text: 'Select Desktop Banner' },
            multiple: false // Only allow one image to be selected
        });

        // When a desktop image is selected, set the input field value and preview the image
        desktop_uploader.on('select', function () {
            var attachment = desktop_uploader.state().get('selection').first().toJSON();
            $('#geo_banners_image').val(attachment.url);  // Set the value of the hidden input
            $('#geo_banners_image_preview').attr('src', attachment.url).show();  // Set the image preview
        });

        desktop_uploader.open();
    });

    // Media uploader for selecting the mobile banner image
    $('#upload_mobile_image_button').click(function (e) {
        e.preventDefault();

        // If the uploader already exists, open it
        if (mobile_uploader) {
            mobile_uploader.open();
            return;
        }

        // Create a new media uploader for mobile
        mobile_uploader = wp.media({
            title: 'Select Mobile Banner',
            button: { text: 'Select Mobile Banner' },
            multiple: false // Only allow one image to be selected
        });

        // When a mobile image is selected, set the input field value and preview the image
        mobile_uploader.on('select', function () {
            var attachment = mobile_uploader.state().get('selection').first().toJSON();
            $('#geo_banners_mobile_image').val(attachment.url);  // Set the value of the hidden input
            $('#geo_banners_mobile_image_preview').attr('src', attachment.url).show();  // Set the image preview
        });

        mobile_uploader.open();
    });
});
