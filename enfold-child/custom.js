(function($)
{
    jQuery('.click-to-call').click(function() {

        var location;
        if ( $(this).hasClass("body" ) ) {  location = "Body"; }
        else if ( $(this).hasClass("header" ) ) {  location = "Header"; }
        else if ( $(this).hasClass("widget" ) ) {  location = "Widget"; }
        else { location = "Unknown"; }

        var buttonText = $(this).text();
        gtag('event', 'Click to Call', {
            'event_category': 'Phone Call',
            'event_label': location
        })

    });


    jQuery('.contact-us').click(function() {

        gtag('event', 'Form Start', {
            'event_category': 'Contact Form Action',
            'event_label': 'Contact Us'
        })

    });

    if(jQuery('#contact-us').length > 0){

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            gtag('event', 'Form Submit', {
                'event_category': 'Contact Form Action',
                'event_label': 'Contact Us'
            })
        }, false );

    }

    if(jQuery('#start-my-project').length > 0){
        jQuery(document).ready(function(){
            gtag('event', 'Form Start', {
                'event_category': 'Contact Form Action',
                'event_label': 'Schedule Design'
            })
        });

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            gtag('event', 'Form Submit', {
                'event_category': 'Contact Form Action',
                'event_label': 'Schedule Design'
            })
        }, false );
    }

	
})(jQuery);