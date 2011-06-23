
	
	// Zoom effect
    $(document).ready(function(){
								   	
		$('.list_blocks li').hover(function(){
			$(this).find('div').css({
				visibility: 'visible',
				display: 'none'
			}).fadeIn('1000');
		},
		function(){
			$(this).find('div').css({
				visibility: 'hidden'
			}).fadeIn('1000');
		});
     });
	
	
	// Hover State  Flickr image
	$(document).ready(function(){
		$(".flickr_gallery a").hover(
			function() {
			$(this).find('img').animate({marginTop:'-10px'},{queue:false, duration:300, easing: 'easeOutBounce'});
			},
			function() {
			$(this).find('img').animate({marginTop:'0px'},{queue:false, duration:300, easing: 'easeOutBounce'});
		});
	 
	});

	// Sidebar links animation
	$(document).ready(function(){
		$(".list_cols a").hover(function(){
			$(this).find('span').stop().animate({marginLeft:'10px'},{queue:false, duration:300, easing: 'easeOutBounce'})
		},function(){
			$(this).find('span').stop().animate({marginLeft:'0px'},{queue:false, duration:300, easing: 'easeOutBounce'})
		});
		
		$(".list_nocols a").hover(function(){
			$(this).find('span').stop().animate({marginLeft:'10px'},{queue:false, duration:300, easing: 'easeOutBounce'})
		},function(){
			$(this).find('span').stop().animate({marginLeft:'0px'},{queue:false, duration:300, easing: 'easeOutBounce'})
		});
	 
	});

	
	// Fade loading images
	$(document).ready(function(){
		$(".fade").css("opacity","0").delay(250).fadeTo(1, 0);
	});
	
	$(window).load(function(){
		$(".fade").fadeTo("slow", 1);
	});

	// TWITTER DISPLAY // 
    getTwitters('deadTweets', {
        id: 'Devilcantburn', 
        prefix: '',  // If you want display your avatar and name <img height="16" width="16" src="%profile_image_url%" /><a href="http://twitter.com/%screen_name%">%name%</a> said:<br/>
        clearContents: false, // leave the original message in place
        count: 1, 
        withFriends: true,
        ignoreReplies: false,
        newwindow: true
    });