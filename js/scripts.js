// for Single Instructor Module Page
// this code reads each section as its own URL and will show that section, while hiding the rest

window.onload = function() {
    var hash = window.location.hash;
    if(hash != "") {
        var id = hash.substr(1); // get rid of #
		
		document.querySelector('.targetDiv').style.display = 'none';
		
        document.getElementById(id).style.display = 'block';
    }
};

// jQuery codes

var $j = jQuery.noConflict();

$j(document).ready(function (){
	
    // Smooth Scroll to anchor element
	var smoothScroll = function(e) {
		e.preventDefault();
		var target = this.hash,
		$target = $j(target);

		$j('html, body').animate({
			scrollTop: $target.offset().top
		}, 900, 'swing', function () {
			window.location.hash = target;
		});
        
        return false;
	}
    
    $j('a[href^="#"]').click(smoothScroll);
	$j('a[href^="#"]').keypress(function(event) {
		event.preventDefault();
		if (event.which == 13) smoothScroll();
	});

	// show/hide div (for Single Instructor Module pages)
	var moduleMenu = function() {
		$j('.targetDiv').hide();
        $j('#' + $j(this).attr('target')).show();
		$j(document.querySelectorAll('#menu-')).hide();
        $j('#menu' + '-' + $j(this).attr('target')).show();
	}
	
	$j('.showSingle').click(moduleMenu);
	$j('.showSingle').keypress(function(event) {
		if (event.which == 13) moduleMenu();
	});
	
	// toggle hamburger menu for smaller screen sizes
	var hamburgerMenu = function() {
		$j('.nav-icon3').toggleClass('open');
        $j('.header-menu-class').slideToggle(600, 'swing');
	}
	
	$j('.nav-hamburger').click(hamburgerMenu);
	$j('.nav-hamburger').keypress(function(event) {
		if (event.which == 13) hamburgerMenu();
	});
	
});