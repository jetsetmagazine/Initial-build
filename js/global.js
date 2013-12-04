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
    
/* Category Navigation Function */



$(".catContain").on('mouseenter',function(){

  $(this).find('.activecat').animate({opacity: "hide", background:"#d5d5d5", width:"75px"}, "fast");
  $(this).addClass('activecat');
  $(this).find('.activecat').animate({opacity: "show", background:"#d5d5d5", width:"75px"}, "fast");
  
  $(this).find('.catImg').animate({opacity: "hide", top:"0", width:"0px", height:"0px"}, "fast");
  $(this).find('.catImg').animate({opacity: "show", top:"100", width:"75px", height:"75px", }, "fast");


});


$(".catContain").on('mouseleave',function(){
  $(this).find('.catImg').animate({opacity: "hide", top:"0", width:"0px", height:"0px"}, "fast");
  $(this).find('.catContain').css({background: "#d5d5d5"}, "fast");
  $(this).find('.catContain').animate({opacity: "hide", background:"none"}, "fast");
  $(this).find('.activecat').animate({opacity: "hide", background:"#000", width:"69px"}, "fast");
  $(this).delay(250).removeClass('activecat');


});




/*  END Category Navigation Function */


});


$(".articleImages li").hover(
function(){
$(this).find(".imageCaption").animate({opacity: "hide", bottom:"3", cursor:"pointer"}, "fast");
$(this).find(".imageCaption").animate({opacity: "show", bottom:"3"}, "fast");
},

function(){
$(this).find(".imageCaption").animate({opacity: "hide", bottom:"3"}, "10");

$(".articleImages li").hover(
function(){ return false;});

});



$(".articleImages li").hover(
function(){
$(this).find(".featureCaption").animate({opacity: "show", bottom:"0"}, "1500");
},

function(){
$(this).find(".featureCaption").animate({opacity: "hide", bottom:"-100"}, "100");
});



$( "#category" ).click(function() {
  $( ".catNav" ).fadeToggle( "fast");  
  $( ".catNavFade" ).delay(250).fadeToggle(1000);
  $(".catImg").hide(); 
});

if(window.location.hash === '#categories'){ 
  $( ".catNav" ).fadeToggle( "fast");  
  $( ".catNavFade" ).delay(250).fadeToggle(1000);
  $(".catImg").hide(); 
}; 

/* Banner Slider */
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
