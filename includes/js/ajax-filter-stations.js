jQuery(document).ready(function($) {


var boundaryND = $( ".section-stations ol li:contains('ND:')" ).first();
     $(".section-stations <ol>").insertAfter(boundaryND.parent())
              .append(boundaryND.nextAll().andSelf());
$( ".section-stations ol li:contains('ND:')" ).first().parent().before( "<h3 class='ND'>North Dakota</h3>" );

var boundaryMN = $( ".section-stations ol li:contains('MN:')" ).first();
	 $(".section-stations <ol>").insertAfter(boundaryMN.parent())
						.append(boundaryMN.nextAll().andSelf());
$( ".section-stations ol li:contains('MN:')" ).first().parent().before( "<h3 class='MN'>Minnesota</h3>" );

var boundaryWI = $( ".section-stations ol li:contains('WI:')" ).first();
	 $(".section-stations <ol>").insertAfter(boundaryWI.parent())
						.append(boundaryWI.nextAll().andSelf());
$( ".section-stations ol li:contains('WI:')" ).first().parent().before( "<h3 class='WI'>Wisconsin</h3>" );

var boundaryIA = $( ".section-stations ol li:contains('IA:')" ).first();
	 $(".section-stations <ol>").insertAfter(boundaryIA.parent())
						.append(boundaryIA.nextAll().andSelf());
$( ".section-stations ol li:contains('IA:')" ).first().parent().before( "<h3 class='IA'>Iowa</h3>" );

var boundaryMB = $( ".section-stations ol li:contains('MB:')" ).first();
	 $(".section-stations <ol>").insertAfter(boundaryMB.parent())
						.append(boundaryMB.nextAll().andSelf());
$( ".section-stations ol li:contains('MB:')" ).first().parent().before( "<h3 class='MB'>Manitoba</h3>" );

var boundaryMT = $( ".section-stations ol li:contains('MT:')" ).first();
	 $(".section-stations <ol>").insertAfter(boundaryMT.parent())
						.append(boundaryMT.nextAll().andSelf());
$( ".section-stations ol li:contains('MT:')" ).first().parent().before( "<h3 class='MT'>Montana</h3>" );

var boundarySD = $( ".section-stations ol li:contains('SD:')" ).first();
	 $(".section-stations <ol>").insertAfter(boundarySD.parent())
						.append(boundarySD.nextAll().andSelf());
$( ".section-stations ol li:contains('SD:')" ).first().parent().before( "<h3 class='SD'>South Dakota</h3>" );

	$('.station-filter').click( function(event) {
		$('.station_all').removeClass("highlighted");
		$('.station-filter').removeClass("highlighted");
		$(this).addClass( "highlighted" );
		// Get tag slug from title attribute
		var selected_taxonomy = $(this).attr('title');
		selected_taxonomy = selected_taxonomy.toUpperCase();
		$('.section-stations h3').fadeOut();
			$('.section-stations ol li').fadeOut();
			$('.section-stations ol li').promise().done(function(){
			$('.section-stations ol li').each(function(){
    if( $(this).find(".station_state").text() == selected_taxonomy )
		{

			$(this).fadeIn();
			$('.section-stations h3.'+ selected_taxonomy + '').fadeIn();
		}
		});
		});

	});


	$('.station_all').click( function(event) {
		$('.station-filter').removeClass("highlighted");
		$(this).addClass( "highlighted" );

			$('.section-stations ol li').fadeOut();
			$('.section-stations h3').fadeOut();
			$('.section-stations h3').promise().done(function(){
			$('.section-stations h3').fadeIn();
		});
			$('.section-stations ol li').promise().done(function(){
			$('.section-stations ol li').fadeIn();
		});

	});


});
