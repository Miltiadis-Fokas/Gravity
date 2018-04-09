$(document).ready(function() {
	$(".expand-collapse-content").hide();
	$(".expanded").next().show();
	$(".expand-collapse").each(function () {
		$(this).click(function () {
        	if ($(this).hasClass("expanded")) {
            	$(this).next().hide("fast");
                $(this).removeClass("expanded");
            } else {
                $(".expanded").each(function () {
                	$(this).next().hide("fast");
                    $(this).removeClass("expanded");
                });
                $(this).next().show("fast", function() {
                    var el = $(this);
                    scrollToDiv(el);
                });
                $(this).addClass("expanded");
            }
            return false;
         });
     });
 
     function scrollToDiv(element){
         var offset = element.offset();
         var offsetTop = offset.top - 40;
         console.log(offsetTop);
         $('body,html').animate({
         	scrollTop: offsetTop
         }, 500);
     }  
});