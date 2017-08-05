(function ($, root, undefined) {
    $(function () {
        'use strict';

        // DOM ready, take it away
        var offset = 220;
        var duration = 500;
        $(window).scroll(function () {
            if ($(this).scrollTop() > offset) {
                $('#back-to-top').fadeIn(duration);
            } else {
                $('#back-to-top').fadeOut(duration);
            }
        });

        $('#back-to-top').click(function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })
    });
    $('dl').removeClass('wp-caption');
    $( "<i class='fa fa-caret-down'></i>" ).appendTo( "button" );
    //$( "<i class='fa fa-caret-down'></i>" ).appendTo( "ul li a.page_item_has_children focus" );
    $("#site-navigation").find(".nav-menu").find('.menu-item-has-children > a, .page_item_has_children > a').append($( "<i class='fa fa-caret-down'></i>" ));
   
    
    var nav, button, menu;
    
	nav = $( '#site-navigation' );
	button = nav.find( '.menu-toggle' );
	menu = nav.find( '.nav-menu' );
	/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		if ( ! nav || ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		button.on( 'click', function() {
			nav.toggleClass( 'toggled-on' );
			if ( nav.hasClass( 'toggled-on' ) ) {
				$( this ).attr( 'aria-expanded', 'true' );
				menu.attr( 'aria-expanded', 'true' );
			} else {
				$( this ).attr( 'aria-expanded', 'false' );
				menu.attr( 'aria-expanded', 'false' );
			}
		} );

		// Fix sub-menus for touch devices.
		if ( 'ontouchstart' in window ) {
			menu.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart', function( e ) {
				var el = $( this ).parent( 'li' );

				if ( ! el.hasClass( 'focus' ) ) {
					e.preventDefault();
					el.toggleClass( 'focus' );
					el.siblings( '.focus' ).removeClass( 'focus' );
				}
			} );
		}

		// Better focus for hidden submenu items for accessibility.
		menu.find( 'a' ).on( 'focus blur', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		} );
	} )();


})(jQuery, this);

