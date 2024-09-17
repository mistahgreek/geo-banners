jQuery(document).ready(function ($) {
    var custom_uploader;

    // Media uploader for selecting the desktop banner image
    $('#upload_image_button').click(function (e) {
        e.preventDefault();

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        custom_uploader = wp.media({
            title: 'Select Desktop Banner',
            button: {
                text: 'Select Banner'
            },
            multiple: false
        });

        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#geo_banners_image').val(attachment.url);
            $('#geo_banners_image_preview').attr('src', attachment.url).show();
        });

        custom_uploader.open();
    });

    // Media uploader for selecting the mobile banner image
    $('#upload_mobile_image_button').click(function (e) {
        e.preventDefault();

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        custom_uploader = wp.media({
            title: 'Select Mobile Banner',
            button: {
                text: 'Select Mobile Banner'
            },
            multiple: false
        });

        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#geo_banners_mobile_image').val(attachment.url);
            $('#geo_banners_mobile_image_preview').attr('src', attachment.url).show();
        });

        custom_uploader.open();
    });

    // Enable linking the banner images
    $('#enable_link_button').click(function (e) {
        e.preventDefault();
        var link = prompt('Enter the URL for the image link:');
        $('#geo_banners_image_link').val(link);
    });
});
