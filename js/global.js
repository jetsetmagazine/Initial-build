$(window).load(function () {

var featCount = $("#firstFeatCol li").size();
var headerHeight = $("#headerHeight").height();
var newOffsetHeight = featCount*150 + headerHeight;

var staticAdHeight =  

    window.onscroll = function() {
        if (window.pageYOffset >= 1175){
            $('.floatWrap').css({position: 'fixed', top: '10px'});
        }
        if (window.pageYOffset <= 1175){
            $('.floatWrap').css({position: 'relative', top: '0px'});
        }
        if (window.pageYOffset >= newOffsetHeight){
            $('.featureFloat').css({position: 'fixed', top: '10px'});
        }
        if (window.pageYOffset <= newOffsetHeight){
            $('.featureFloat').css({position: 'relative', top: '0px'});
        }
    }
    
});

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
				      	bearing: 0.0,
						tilt: 0.5,
						minZ: 0,
						maxZ: 25,
						minOpacity: 0.2,
						maxOpacity: 1.0,
						minScale: 0.4,
						maxScale: 1.0,
						duration: 600,
                        shape: "lazysusan",
						clickToFocus: true,
						reflect: true,
                        easing: "swing",
						floatComparisonThreshold: 0.001,
						autoplay: false,
						enableDrag: true,
						dropDuration: 100.0,
						dropEasing: "swing",
						dropAnimateTo: "nearest",
						dragAxis: "x",
						dragFactor: 4,
						triggerFocusEvents: false,
						triggerBlurEvents: false,
						responsive: true,
						focusBearing: 1


				});

/* End Roundabout Initialize */

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
