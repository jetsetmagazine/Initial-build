jQuery(document).ready(function(){



$(".articleImages li").hover(
function(){
$(this).find(".imageCaption").animate({opacity: "show", top:"0"}, "1500");
},

function(){
$(this).find(".imageCaption").animate({opacity: "hide", top:"-100"}, "100");

$(".articleImages li").hover(
function(){ return false;});

});



$(".articleImages li").hover(
function(){
$(this).find(".featureCaption").animate({opacity: "show", bottom:"0"}, "2500");
},

function(){
$(this).find(".featureCaption").animate({opacity: "hide", bottom:"-100"}, "100");
});



$( "#category" ).click(function() {
  $( ".catNav" ).fadeToggle( "fast");  
  $( ".catNavFade" ).delay(250).fadeToggle(1000);
  $(".catImg").hide(); 
});


/* Category Navigation Function */


/*  END Category Navigation Function */

/* Roundabout Initialize */

				$('.issueRnd').roundabout({
				      	bearing: 2.0,
						tilt: 20.5,
						minZ: 20,
						maxZ: 280,
						minOpacity: 0.0,
						maxOpacity: 1.0,
						minScale: 0.4,
						maxScale: 1.0,
						duration: 350,
						clickToFocus: true,
						reflect: true,
						floatComparisonThreshold: 1.021,
						autoplay: false,
						enableDrag: true,
						enableDrop: true,
						dropDuration: 100.0,
						dropEasing: "linear",
						dropAnimateTo: "nearest",
						dragAxis: "x",
						dragFactor: 4,
						triggerFocusEvents: false,
						triggerBlurEvents: false,
						responsive: true,
						focusBearing: 1


				});

/* End Roundabout Initialize */

});

  jQuery(document).ready(function ($) {$('#slider1_container').jssorSlider({
    $AutoPlay: true,
    $AutoPlaySteps: 1,
    $AutoPlayInterval: 4000,
    $PauseOnHover: false,
    $ArrowKeyNavigation: true,
    $SlideDuration: 5,
    $MinDragOffsetToSlide: 5,
    $SlideSpacing: 5,
    $DisplayPieces: 1,
    $ParkingPosition: 0,
    $UISearchMode: 1,
    $PlayOrientation: 1,
    $DragOrientation: 3,
    $ThumbnailNavigatorOptions: {
    $Class: $JssorThumbnailNavigator$,
    $ChanceToShow: 2,
    $AutoCenter: 3,
    $Lanes: 1,
    $SpacingX: 4,
    $SpacingY: 4,
    $DisplayPieces: 4,
    $ParkingPosition: 0,
    $Orientation: 1,
    $DisableDrag: false
    }
    });
    });
