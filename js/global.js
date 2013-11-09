jQuery(document).ready(function(){
$(".articleImages li").hover(
function(){
$(this).find(".imageCaption").animate({opacity: "show", bottom:"0"}, "2500");
},

function(){
$(this).find(".imageCaption").animate({opacity: "hide", bottom:"-100"}, "100");
});

$(".articleImages li").hover(
function(){
$(this).find(".featureCaption").animate({opacity: "show", top:"0"}, "2500");
},

function(){
$(this).find(".featureCaption").animate({opacity: "hide", top:"-100"}, "100");
});

});