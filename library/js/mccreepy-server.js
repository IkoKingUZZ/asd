jQuery(document).ready(function($){




	$.post(ajaxurl, {

		action: 'mccreepy_refresh_server'


	}, function( response ) {

		console.log( 'AJAX complete' );

	});


});