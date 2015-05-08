(function($) {
	function responsiveMobileMenu() {	
		$('.rmm').each(function() {
			$(this).children('ul').addClass('rmm-main-list');	// mark main menu list
		
			var $width = 0;
			$(this).children('ul').children('li').each(function() {
				$width += $(this).outerWidth();
			});
			
			$(this).attr('data-width', $width+'px');	
	 	});
	}
	function getMobileMenu() {
	
		/* 	build toggled dropdown menu list */
		$('.rmm').each(function() {	
			var menutitle = $(this).attr("data-menu-title");
			if ( menutitle == "" ) {
				menutitle = "Menu";
			}
			else if ( menutitle == undefined ) {
				menutitle = "Menu";
			}
			var $menulist = $(this).children('.rmm-main-list').html();
			var $menucontrols ="<div class='rmm-toggled-controls'><div class='rmm-toggled-title'>" + menutitle + "</div><div class='rmm-button'><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div></div>";
			$(this).prepend("<div class='rmm-toggled rmm-closed'>"+$menucontrols+"<ul>"+$menulist+"</ul></div>");
	
		});
	}
	
	function adaptMenu() {	
		/* 	toggle menu on resize */
		$('.rmm').each(function() {
			var $width = $(this).attr('data-width');
			$width = $width.replace('px', ''); 
			if ( $(this).parent().width() < $width*1.01 ) {
				$(this).children('.rmm-main-list').hide(0);
				$(this).children('.rmm-toggled').show(0);
			}
			else {
				$(this).children('.rmm-main-list').show(0);
				$(this).children('.rmm-toggled').hide(0);
			}
		});		
	}
	
	jQuery(function() {
		 responsiveMobileMenu();
		 getMobileMenu();
		 adaptMenu();

		 /* slide down mobile menu on click */	 
		 $('.rmm-toggled, .rmm-toggled .rmm-button').click(function(){
		 	if ( $(this).is(".rmm-closed")) {
			 	 $(this).find('ul').stop().show(300);
			 	 $(this).removeClass("rmm-closed");
		 	}
		 	else {
				$(this).find('ul').stop().hide(300);
				$(this).addClass("rmm-closed");
		 	}		
		});	
	});
	
	/* 	hide mobile menu on resize */
	jQuery(window).resize(function() {
	 	adaptMenu();
	});
	
	$(document).ready(function() {
		$('.current-menu-item').each(function() {
			$(this).parents("li").last().addClass('current-parent-item');
		});
	});
	
})( jQuery );