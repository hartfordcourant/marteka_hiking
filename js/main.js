/***********************************************************/
/* Loading page overlay
/***********************************************************/

setTimeout(function() {
      $("#loading-page").fadeOut("slow");

}, 5000);

/***********************************************************/
/* Functions
/***********************************************************/

skrollrCheck = function() {
	// initialize skrollr
	if(!isMobile.any){
		s = skrollr.init({
	          forceHeight: false,
	          mobileDeceleration:0.04,
	          smoothScrolling:true
	      	});
		checkSize();
	}
	else{
		skrollr.init().destroy();
	}
	
}
checkSize = function(){
		// get initial height/width of viewport
		var winWidth = viewportSize.getWidth();
	    var winHeight = viewportSize.getHeight();
	    // if height is too small force it to 550
	    if(winHeight <= 550) {winHeight = 550; }
	    // set size of slides
	    $(".homeSlide").css("height",winHeight);
	    $(".homeSlideTall").css("height",winHeight*2);
		// expand height of cover image to allow for scrolling headlines
		$(".coverSlide").css("height", winHeight + 500);
		//if page isn't mobile refresh skrollr
		if(!isMobile.any){
			s.refresh();
		}
}

/***********************************************************/
/* Global Vars
/***********************************************************/

var s;
$animation = $('.animation-image');

/***********************************************************/
/* Initialize page 
/***********************************************************/

if(typeof skrollr !== typeof undefined){
  window.onload = function(){
  	skrollrCheck();
  	//$('body').removeClass('loading').addClass('loaded');
  }
  window.addEventListener('resize', checkSize);
  window.addEventListener('orientationchange', checkSize);
}

/***********************************************************/
/* Remove Alert
/***********************************************************/

$("#remove-alert").click(function(){
  $("#user-alert").hide();
});



