 /*
 * CPMobile 1.0 -The cpmobile Admin Javascript File
 * Last Updated: January 25th, 2012
 */ 
var cpmobileSpinnerCount = 1;
var wpQuery = jQuery;

function cpmobileSpinnerDone() {
	cpmobileSpinnerCount = cpmobileSpinnerCount - 1;
	if ( cpmobileSpinnerCount == 0 ) {
		jQuery('img.ajax-load').fadeOut( 1000 );
	}	
}

jQuery( document ).ready( function() {
	// Toni + 2.0: Cleaning up assets
	setTimeout(function() { jQuery( '#cpmobileupdated' ).fadeOut(330); }, 3000);
	
	jQuery('#header-text-color, #header-background-color, #header-border-color, #link-color').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) { jQuery(el).val(hex); jQuery(el).ColorPickerHide(); },
		onBeforeShow: function () { jQuery(this).ColorPickerSetColor( jQuery(this).attr('value') ); }
	});

	jQuery("a.fancylink").fancybox({
		'padding':	10, 'zoomSpeedIn': 250, 'zoomSpeedOut': 250, 'zoomOpacity': true, 'overlayShow': false, 'frameHeight': 320, 'frameWidth': 450, 'hideOnContentClick': true
	});
	
	cpmobileAjaxTimeout = 5000;
	
	// uncomment below to simulate a failure
	// cpmobileBlogUrl = 'http://somefakeurlasdf.com';
	jQuery.ajax( {
		'url': cpmobileBlogUrl + '?cpmobile-ajax=news',
		'success': function(data) { 
			jQuery( '#cpmobile-news-content' ).hide().html( data ).fadeIn(); 
			cpmobileSpinnerDone();
		},
		'timeout': cpmobileAjaxTimeout,
		'error': function() {
			jQuery( '#cpmobile-news-content' ).hide().html( '<ul><li class="ajax-error">Unable to load the news feed</li></ul>' ).fadeIn();
			cpmobileSpinnerDone();
		},
		'dataType': 'html'
	});
	
	jQuery(function(){
		var tabindex = 1;
		jQuery('input,select').each(function() {
			if (this.type != "hidden") {
				var $input = jQuery(this);
				$input.attr("tabindex", tabindex);
				tabindex++;
			}
		});
	});
	
	wpQuery( document ).ready( function() {
		if ( wpQuery( '#advertising-options' ).length ) {
			cpmobileHandleAdvertising();
			
			wpQuery( '#ad_service' ).change( function() { cpmobileHandleAdvertising() } );
		}
	});
});

function cpmobileHandleAdvertising() {
	var selectValue = wpQuery( '#ad_service' ).attr( 'value' );
	if ( selectValue == 'none' ) {
		wpQuery( '#google-adsense' ).hide();
		wpQuery( '#appstores' ).hide();
	} else if ( selectValue == 'adsense' ) {
		wpQuery( '#appstores' ).hide();
		wpQuery( '#google-adsense' ).fadeIn( 250 );
	} else if ( selectValue == 'appstores' ) {
		wpQuery( '#google-adsense' ).hide();
		wpQuery( '#appstores' ).fadeIn( 250 );
	}
}
