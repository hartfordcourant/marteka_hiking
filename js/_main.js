/***********************************************************/
/* Functions
/***********************************************************/

/*
 * Turn skrollr on and off based on screen size
 */
skrollrCheck = function() {
  var winWidth = viewportSize.getWidth();
  var winHeight = viewportSize.getHeight();

  if(winWidth >= 600){
      skrollr.init({
          forceHeight: false,
          mobileDeceleration:0.04,
          smoothScrolling:true
      });
      skrollrStatus=true;
      $(".coverSlide").css("height", winHeight + 500);
      adjustWindow();
    if(winWidth > winHeight){
      skrollr.get().refresh();
    }
    else if (winWidth < winHeight){
      skrollr.get().refresh();
    }
  } 
  else if (winWidth < 1024){
    // Destroy skrollr for screens less than 1024px
    if(document.body.id === 'skrollr-body') {
      skrollr.init().destroy();
      skrollrStatus=false;

    }
  }
  else if(isHighDensity() === true || isRetina() === true){
  	skrollr.init().destroy();
    skrollrStatus=false;
    console.log("killed skrollr");
  }
  else if(isMobile.any){
    skrollr.init().destroy();
  }
  console.log(skrollrStatus);
};

/*
 * Adjust image sizes on document resize
 */
adjustWindow = function(){
	winH = viewportSize.getHeight();
    if(winH <= 550) {winH = 550;} 
    $(".homeSlide").css("height",winH);
    $(".homeSlideTall").css("height",winH*2);
};

/*
 * Initialize slideshow after they load
 */
/*initSlideshows = function(){
	$("#slider1").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
	$("#slider2").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
    $("#slider3").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
    $("#slider4").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
    $("#slider5").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
    $("#slider6").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
    $("#slider7").responsiveSlides({
      auto:false,
      nav: true,         
      prevText:"<span class='glyphicon glyphicon-chevron-left'></span>",
      nextText:"<span class='glyphicon glyphicon-chevron-right'></span>"
    });
};*/
/*
 * Add click events caption
 */
/*addCaptions = function(){
	var cutBtns = $(".cut_toggle");
	$.each(cutBtns, function(key,value){
		if(!($(this).hasClass("has_event"))){
			$(this).addClass("has_event");
			$(this).click(function(){  
			  toggle = $(this).children(":first");
			  $(this).next().slideToggle("fast",function(){
			    (toggle.attr("class") == "glyphicon glyphicon-minus") ? toggle.attr("class", "glyphicon glyphicon-plus") : toggle.attr("class", "glyphicon glyphicon-minus");
			  });
			});
		}
	});
};*/
stopLoading = function(){
	clearInterval(loadInterval);
}
isHighDensity = function(){
	return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 1.3));
}
isRetina = function(){
	return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx), only screen and (min-resolution: 75.6dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min--moz-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 2)) && /(iPad|iPhone|iPod)/g.test(navigator.userAgent);
}

/***********************************************************/
/* Global Vars
/***********************************************************/

$window = $(window);
var winH;
var sections = [
	"chapters/chapter_2.htm",
	"sequences/sequence_chp_2.htm",
	"chapters/chapter_3.htm",
	"sequences/sequence_chp_3.htm",
	"chapters/chapter_4.htm",
	"chapters/chapter_5.htm",
	"chapters/chapter_6.htm",
	"sequences/sequence_chp_6.htm",
	"chapters/chapter_7.htm"
];
var skrollrStatus=false;
$body = $('body');
$animation = $('.animation-image');

/***********************************************************/
/* Initialize page 
/***********************************************************/

//Initialize skrollr, but only if it exists.
if(typeof skrollr !== typeof undefined){
  window.onload = skrollrCheck();
  window.addEventListener('resize', skrollrCheck);
  window.addEventListener('orientationchange', skrollrCheck);
  $body.removeClass('loading').addClass('loaded');
  //addCaptions();
}
else{

}

var track_load = 0; 
var loading = false;
var total_groups = $(".lazy_load").length;
var loadInterval = setInterval(function(){ loadSections() }, 3500);

loadSections = function(){
	if(track_load == total_groups){
		adjustWindow();	
		//addCaptions();
		$animation.hide();
		track_load++;
		stopLoading();
		skrollr.get().refresh();
	}
	//check if there's more data to load
	if(track_load <= total_groups-1 && loading == false){
		//prevent anything else from loading
		loading = true;
		//showing loading animation
		$animation.show();

		var section_holder = "#load_" + track_load;
		
		$.post(sections[track_load], {'group_no': track_load}, function(data){
			$(section_holder).html(data);
			$animation.hide();
			//initSlideshows();
			//addCaptions();
      console.log("this is running");
			track_load++;
			loading = false;
			adjustWindow();

		}).done(function(){
			if(skrollrStatus == true){
				skrollr.get().refresh();
			}		
		}).fail(function(xhr,ajaxOptions,thrownError){
			$animation.hide();
			loading = false;
		});
	}
}

/***********************************************************/
/* Remove Alert
/***********************************************************/

$("#remove-alert").click(function(){
  $("#user-alert").hide();
});

