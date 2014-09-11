jQuery(document).ready(function($) {
  'use strict';
/*mediaelement*/
        $('audio,video').mediaelementplayer();

	//gallery
	if ($("#Grid").length > 0){
	     $('#Grid').mixitup({
                targetSelector: '.mix',
                targetDisplayGrid: 'inline-block',
                animateGridList: false
            });
	}  

	/* sections */
	$( "h2.toggle" ).click(function(e) {
		if($(this).hasClass('closed')){
			$(this).removeClass('closed');
			$(this).addClass('opened');
			$(this).next().slideDown('fast', function() {
				//e.preventDefault();     
				goToByScroll($(this).parent().attr("id"));
			});

			if($(this).parent().attr('id') == 'resume'){
				set_skill_percent()
			}
			if($(this).parent().attr('id') == 'contact'){
				google.maps.event.trigger(map, 'resize');
                map.setCenter(myLatlng);
			}
		} 
		else{
			$(this).removeClass('opened');
			$(this).addClass('closed');	
			$(this).next('.item-cont').slideUp(800);
		}
                $('li.active').click();
	});
	
	/* settings */
	$('#settings-icon').click(function(){
		if($('#settings').hasClass('active')){
		   $('#settings').animate({"left":"-210px"}, "slow").removeClass('active');
		} else {
		   $('#settings').animate({"left":"0"}, "slow").addClass('active');
		}
	});
	
	/* profile */
	$("#profile .col500").animate({'margin-left':"0%"},600);
    $("#profile .col260").animate({'margin-right':"0%"},600);
	
	var isMobile = window.is_mobile;
	if(isMobile){
		//gallery items hover
		if($(window).width() > 979 ){ gallery_hover(50, 55); } 
		else if($(window).width() > 767 && $(window).width() <= 979) { gallery_hover(35, 35); } //(min-width: 768px) and (max-width: 979px)
		else if($(window).width() > 480 && $(window).width() <= 767) { gallery_hover(90, 75); } //(max-width: 767px)
		else if($(window).width() <= 480) { gallery_hover(50, 55); } //(max-width: 480px)
		
		$(window).bind('resize', function () { 
			$('.ptf-item').unbind('mouseenter').unbind('mouseleave');
			if($(window).width() > 979 ){ gallery_hover(50, 55); } 
		else if($(window).width() > 767 && $(window).width() <= 979) { gallery_hover(35, 35); } //(min-width: 768px) and (max-width: 979px)
		else if($(window).width() > 480 && $(window).width() <= 767) { gallery_hover(90, 75); } //(max-width: 767px)
		else if($(window).width() <= 480) { gallery_hover(50, 55); } //(max-width: 480px)
		});
	}
	else {
		//gallery items hover
		if($(window).width() > 979 ){ gallery_hover(50, 55); } 
		else if($(window).width() > 767 && $(window).width() <= 979) { gallery_hover(35, 35); } //(min-width: 768px) and (max-width: 979px)
		else if($(window).width() > 480 && $(window).width() <= 767) { gallery_hover(90, 75); } //(max-width: 767px)
		else if($(window).width() <= 480) { gallery_hover(50, 55); } //(max-width: 480px)
		
		$(window).bind('resize', function () { 
			$('.ptf-item').unbind('mouseenter').unbind('mouseleave');
			if($(window).width() > 979 ){ gallery_hover(50, 55); } 
			else if($(window).width() > 767 && $(window).width() <= 979) { gallery_hover(35, 35); } //(min-width: 768px) and (max-width: 979px)
			else if($(window).width() > 480 && $(window).width() <= 767) { gallery_hover(90, 75); } //(max-width: 767px)
			else if($(window).width() <= 480) { gallery_hover(50, 55); } //(max-width: 480px)
		});
	}
	
	//fancybox
	if ($(".fancybox").length > 0){
		$(".fancybox").fancybox({ padding: 0, fsBtn:false, autoSize: true, });
	}
	
	$("#fancyboxvideo").click(function() {
		$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'			: 640,
			'height'		: 385,
			'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
			'type'			: 'swf'
		});
		return false;
	});
	
	//page scroll up
	$("#up").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
	
	//set #up position for pc screens
	position_up();
	
	$(window).resize(function() {
		position_up();
	});

	$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).attr('data-rel')).removeAttr('data-rel');
	});
	
	$('audio[data-width]').each(function() {
		$(this).attr('width', $(this).attr('data-width')).removeAttr('data-width');
	});
	$('audio[data-type]').each(function() {
		$(this).attr('type', $(this).attr('data-type')).removeAttr('data-type');
	});
		
// contact form
/*
jQuery('#submit').click(function(){
	jQuery('.alert_message').empty();
	jQuery('.alert_message').remove();
	jQuery.post(
		MyAjax.ajaxurl,
		{
			action : 'send_email',
			contact_name: jQuery('#contact_name').val(),
			email: jQuery('#email').val(),
			msg: jQuery('#comment').val()
		},
		function(response){		
			var errors = response.errors;
			if(errors){
				var message = "<div class='alert_message error'>Please check if you've filled all the fields with valid information. Thank you.</div>";
				jQuery(message).insertBefore(jQuery('#contact_form'));;
			}else{
				var message = "<div class='alert_message success'>Thank you for using my contact form! Your email was successfully sent!</div>";
				jQuery(message).insertBefore(jQuery('#contact_form'));;
			}
			clear_errors();
			for(var i = 0; i < errors.length; ++i){
				jQuery('#' + errors[i]).addClass('error');
				console.log(jQuery('#' + errors[i]).addClass('error'));
			}
		},
		"json"
	);
	return false;
});

function clear_errors(){
	jQuery('#contact_name').removeClass('error');
	jQuery('#email').removeClass('error');
	jQuery('#comment').removeClass('error');
}*/


	
});//end document ready


/* set skill percent
=========================================== */
function set_skill_percent(){
    $('.skill-percent-line').each(function() {
        var width = $(this).data( "width" );
        $( this ).animate({width: width+'%'}, 1000 );

    });	
}

/* scroll to section by id
=========================================== */
function goToByScroll(id){
    id = id.replace("link", "");
    $('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

/* set #up position
=========================================== */
function position_up(){
  if ($(window).width() < 1024) {
	$('#up').css({right:'20px', bottom:'20px'});
  } else {
	 $('#up').removeAttr('style');
  }
}

/* gallery hover
=========================================== */
function gallery_hover(pos_text, pos_btn){
	$('.ptf-item').bind({
		mouseenter : function(e) {
			$(this).find('.ptf-cover').stop().animate({"opacity":"1"},500); 
			$(this).find('.ptf-button').stop().animate({ bottom: '+='+pos_btn+'px', 'opacity':1 }, 300, 'easeOutSine', function () {});
			$(this).find('.ptf-details').stop().animate({ top: '+='+pos_text+'px', 'opacity':1 }, 300, 'easeOutSine', function () {});
		},
		mouseleave: function(e) {
			$(this).find('.ptf-cover').stop().animate({"opacity":"0"},500); 
			$(this).find('.ptf-button').stop().animate({ bottom: '0px', 'opacity':0 }, 300, 'easeOutSine', function () {});
			$(this).find('.ptf-details').stop().animate({ top: '0px', 'opacity':0 }, 300, 'easeOutSine', function () {});
		}
	});
}

function gallery_hover_mobile(pos_btn, pos_text){
	$('.ptf-item').bind({
		touchstart : function(e) {
			$(this).find('.ptf-cover').stop().animate({"opacity":"1"},500); 
			$(this).find('.ptf-button').stop().animate({ bottom: '+='+pos_btn+'px', 'opacity':1 }, 300, 'easeOutSine', function () {});
			$(this).find('.ptf-details').stop().animate({ top: '+='+pos_text+'px', 'opacity':1 }, 300, 'easeOutSine', function () {});
		},
		touchend: function(e) {
			$(this).find('.ptf-cover').stop().animate({"opacity":"0"},500); 
			$(this).find('.ptf-button').stop().animate({ bottom: '0px', 'opacity':0 }, 300, 'easeOutSine', function () {});
			$(this).find('.ptf-details').stop().animate({ top: '0px', 'opacity':0 }, 300, 'easeOutSine', function () {});
		}
	});
}



function init_validation(target) {
	function validate(target) {
		var valid = true;
		jQuery(target).find('.req').each(function() {
			if(jQuery(this).val() == '') {
				valid = false;
				jQuery(this).parent().addClass('errored');
			}
			else {
				jQuery(this).parent().removeClass('errored');
			}
		});
		return valid;
	}
	
	jQuery('form.w_validation').live('submit', function(e) {
		var valid = validate(this);
		if(!valid) e.preventDefault();
	});
	
	if(target) {return validate(target);}
}