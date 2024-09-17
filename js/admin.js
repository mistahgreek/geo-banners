jQuery(document).ready(function ($) {
    var custom_uploader;

    // Media uploader for selecting the banner image
    $('#upload_image_button').click(function (e) {
        e.preventDefault();

        // If the uploader already exists, open it
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        // Create a new media uploader
        custom_uploader = wp.media({
            title: 'Select Banner',
            button: {
                text: 'Select Banner'
            },
            multiple: false // Only allow one image to be selected
        });

        // When an image is selected, set the input field value and preview the image
        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#geo_banners_image').val(attachment.url);
            $('#geo_banners_image_preview').attr('src', attachment.url).show();
        });

        // Open the media uploader
        custom_uploader.open();
    });
});
