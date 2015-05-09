
$(document).ready(function() {
	
	$('body').addClass('js');

	console.log('Check it: https://github.com/laras126/notlaura.com');


	// ----
	// Toggle Menu
	// ----

	// TODO: better fallback for non-JS - adding a .js class but it causes the nav to blink
	// Look into Modernizr for that

	var $menu = $('#menu'),
	    $menulink = $('.menu-link'),
	    $menuTrigger = $('.has-subnav > a');

	$menulink.click( function(e) {
		e.preventDefault();
		$menulink.toggleClass('open');
		$menu.toggleClass('open');
		return false;
	});

	$menuTrigger.click(function(e) {
		e.preventDefault();
		var $this = $(this);
		$this.toggleClass('open').next('ul').toggleClass('open');
	});
		




	// ----
	// Submenu
	// ----

	// This jumps...will need to fix
	//  var scroll_class = 'stuck',
	// 	$nav = $('.content-nav'),
	// 	nav_ht = $nav.outerHeight(),
	// 	header_ht = $('.page-header').outerHeight() + $('.site-header').outerHeight(),
	// 	total_ht = header_ht;
  	

	// // 1. Highlight current item
	// // 2. Slide to current section on click
	// $('.content-nav a').not('.directional-icon').click( function() {

	// 	var hash = $(this).attr('href');
	// 	var $target = $(hash + ' .section-title');

	// 	// Slide to section corresponding to clicked hash
	// 	$('html,body').animate({
	// 		scrollTop: $target.offset().top - nav_ht*1.5
 //        }, 700);

	// 	return false;
	// }); // END click

	// $('.top-link a').on( 'click', function() {
	// 	var hash = $('#pageTop');
	// 	var $target = $(hash);

	// 	// Slide to section corresponding to clicked hash
	// 	$('html,body').animate({
	// 		scrollTop: $target.offset().top
 //        }, 700);

 //        return false;

	// });




	// // Highlight the current item according to position on the screen
	// // http://stackoverflow.com/questions/9979827/change-active-menu-item-on-page-scroll
	// // (continued below)
	
	// // Cache selectors
	// var topMenu = $(".content-nav"),
 //    topMenuHeight = topMenu.outerHeight()+40,
    
 //    // All list items
 //    menuItems = topMenu.find("a"),
    
 //    // Anchors corresponding to menu items
 //    scrollItems = menuItems.map(function(){
	// 	var item = $($(this).attr("href"));
 //      	if (item.length) { return item; }
 //    });



	// $(window).scroll( function() {

	// 	// Add the class to make the nav stick
	// 	if( $(this).scrollTop() > total_ht ) {

	// 		$nav.addClass(scroll_class);
	// 		$('.section-header').addClass('nav-stuck');
	// 		$('.top-link-bottom').fadeIn(300);
	// 		$('.content-nav-arrow').fadeOut(300);

	// 		$('.top-link-top').css({
	// 			'width': '50px',
	// 			'opacity': '1'
	// 		});
			
	// 	} else if( $(this).scrollTop() < total_ht ) {

	// 		$nav.removeClass(scroll_class);
	// 		$('.section-header').removeClass('nav-stuck');
	// 		$('.top-link-bottom').fadeOut(300);
	// 		$('.content-nav-arrow').fadeIn(300);
			
	// 		$('.top-link-top').css({
	// 			'width': '0',
	// 			'opacity': '0'
	// 		});
	// 	}


	// 	// Highlight the current item according to position on the screen
	// 	// http://stackoverflow.com/questions/9979827/change-active-menu-item-on-page-scroll
	
	// 	// Get container scroll position
   		
 //   		var fromTop = $(this).scrollTop()+topMenuHeight;

 //   		// Get id of current scroll item
 //   		var cur = scrollItems.map(function(){
 //     		if ($(this).offset().top < fromTop)
 //       			return this;
 //   		});
   
 //   		// Get the id of the current element
 //   		cur = cur[cur.length-1];
 //   		var id = cur && cur.length ? cur[0].id : "";
   		
 //   		// Set/remove active class
 //   		menuItems
 //     		.parent().removeClass("content-nav-active")
 //     		.end().filter("[href=#"+id+"]").parent().addClass("content-nav-active");
	
	// }); // END scroll






	// ----
	// Misc
	// ----

	// Hack to keep out widows
	// http://css-tricks.com/preventing-widows-in-post-titles/
   
	$('.item-title, .section-title, .main p, .lead').each( function() {
		var wordArray = $(this).text().split(" ");
		if (wordArray.length > 3) {
			wordArray[wordArray.length-2] += "&nbsp;" + wordArray[wordArray.length-1];
			wordArray.pop();
	    	$(this).html(wordArray.join(" "));
	  	}
	});


});


console.log('hi');