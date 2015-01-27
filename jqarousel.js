var hwSlideSpeed = 100;
var hwTimeOut = 1000;
var hwNeedLinks = true;

//begin 1
(function ($) {
$.fn.extend({
  slideRightShow: function() {
    return this.each(function() {
        $(this).show('slide', {direction: 'right'}, 1000);
    });
  },
  slideLeftHide: function() {
    return this.each(function() {
      $(this).hide('slide', {direction: 'left'}, 1000);
    });
  },
  slideRightHide: function() {
    return this.each(function() {
      $(this).hide('slide', {direction: 'right'}, 1000);
    });
  },
  slideLeftShow: function() {
    return this.each(function() {
      $(this).show('slide', {direction: 'left'}, 1000);
    });
  }
});
})($);
// end
// begin
		// (function ($) {
		// $.fn.slideLeftHide = function(speed, callback) { 
		   // $(this).animate({ 
			// width: 'hide', 
			// paddingLeft: 'hide', 
			// paddingRight: 'hide', 
			// marginLeft: 'hide', 
			// marginRight: 'hide' 
		  // }, speed, callback);
		// }

		// $.fn.slideLeftShow = function(speed, callback) { 
		   // $(this).animate({ 
			// width: 'show', 
			// paddingLeft: 'show', 
			// paddingRight: 'show', 
			// marginLeft: 'show', 
			// marginRight: 'show' 
		  // }, speed, callback);
		// }
		// $.fn.slideRightHide = function(speed, callback) { 
		   // $(this).animate({ 
			// width: 'hide', 
			// paddingLeft: 'hide', 
			// paddingRight: 'hide', 
			// marginLeft: 'hide', 
			// marginRight: 'hide' 
		  // }, speed, callback);
		// }

		// $.fn.slideRightShow = function(speed, callback) { 
		   // $(this).animate({ 
			// width: 'show', 
			// paddingLeft: 'show', 
			// paddingRight: 'show', 
			// marginLeft: 'show', 
			// marginRight: 'show' 
		  // }, speed, callback);
		// }
		// })($);
// end
(function ($) {
var hwSlideSpeed = 100;
var hwTimeOut = 1000;
var hwNeedLinks = true;

$(document).ready(function(e) {
	$('.slide').css(
		{"position" : "absolute",
		 "top":'0', "left": '0'}).hide().eq(0).show();
	var slideNum = 0;
	var slideTime;
	slideCount = $("#slider .slide").size();
	var animSlide = function(arrow){
		clearTimeout(slideTime);
		$('.slide').eq(slideNum).slideRightHide(hwSlideSpeed);
		if(arrow == "next"){
			if(slideNum == (slideCount-1)){slideNum=0;}
			else{slideNum++}
			}
		else if(arrow == "prev")
		{
			if(slideNum == 0){slideNum=slideCount-1;}
			else{slideNum-=1}
		}
		else{
			slideNum = arrow;
			}
		$('.slide').eq(slideNum).slideLeftShow(hwSlideSpeed, rotator);
		$(".control-slide.active").removeClass("active");
		$('.control-slide').eq(slideNum).addClass('active');
		}
if(hwNeedLinks){
var $linkArrow = $('<a id="prevbutton" href="#">&lt;</a><a id="nextbutton" href="#">&gt;</a>')
	.prependTo('#slider');		
	$('#nextbutton').click(function(){
		animSlide("next");
		return false;
		})
	$('#prevbutton').click(function(){
		animSlide("prev");
		return false;
		})
}
	var $adderSpan = '';
	$('.slide').each(function(index) {
			$adderSpan += '<span class = "control-slide">' + index + '</span>';
		});
	$('<div class ="sli-links">' + $adderSpan +'</div>').appendTo('#slider-wrap');
	$(".control-slide:first").addClass("active");
	$('.control-slide').click(function(){
	var goToNum = parseFloat($(this).text());
	animSlide(goToNum);
	});
	var pause = false;
	var rotator = function(){
			if(!pause){slideTime = setTimeout(function(){animSlide('next')}, hwTimeOut);}
			}
	$('#slider-wrap').hover(	
		function(){clearTimeout(slideTime); pause = true;},
		function(){pause = false; rotator();
		});
	rotator();
});
// rotator();
})(jQuery);
