jQuery(document).ready(function(){
$(".articleImages li").hover(
function(){
$(this).find(".imageCaption").animate({opacity: "show", top:"0"}, "2500");
},

function(){
$(this).find(".imageCaption").animate({opacity: "hide", top:"-100"}, "100");
});
});