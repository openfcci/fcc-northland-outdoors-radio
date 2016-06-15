jQuery(document).ready(function($) {
	$('.station-filter').click( function(event) {
		$('.station_all').removeClass("highlighted");
		$('.station-filter').removeClass("highlighted");
		$(this).addClass( "highlighted" );
		// Get tag slug from title attirbute
		var selected_taxonomy = $(this).attr('title');
		selected_taxonomy = selected_taxonomy.toUpperCase();
			$('.section-stations ol li').fadeOut();
			$('.section-stations ol li').promise().done(function(){
			$('.section-stations ol li').each(function(){
    if( $(this).find(".station_state").text() == selected_taxonomy )
		{

			$(this).fadeIn();
		}
		});
		});

	});


	$('.station_all').click( function(event) {
		$('.station-filter').removeClass("highlighted");
		$(this).addClass( "highlighted" );

			$('.section-stations ol li').fadeOut();
			$('.section-stations ol li').promise().done(function(){
			$('.section-stations ol li').fadeIn();

		});

	});


});
