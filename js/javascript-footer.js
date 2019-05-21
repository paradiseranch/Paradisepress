///////////////////////////////
// DOES THIS JAVASCRIPT WORK?
/////////////////////////////

//document.write("Hello");
//window.alert("thisworks");
//console.log("footer JS works");


// CENTER MENU
/////////////////////////////

// inserts empty row after footer menu

//jQuery('ul#menu-footer-menue').append('<li class="empty-row"></li>');


// DROPDOWN MENU
/////////////////////////////

// add arrow to every dropdown-element
jQuery('.menu-item-has-children a').not('ul.sub-menu li a').addClass('this-is-dropdown');

// on click
jQuery('.menu-item-has-children').click(function(dropdownEvent){

  // prevent bubbling up the DOM, so that clicking anywhere will not close the dropdown in this particular case
  dropdownEvent.stopPropagation();

  // close other opened dropdowns
  var thisSubMenu= jQuery(this).children('ul.sub-menu'),
      thisSubLink= jQuery(this).children('a');

  jQuery('ul.sub-menu').not(thisSubMenu).toggleClass('show', false);
  jQuery('.menu-item-has-children a').not(thisSubLink).toggleClass('open-dropdown', false);

  // toggle dropdown
  jQuery(this).children('ul.sub-menu').toggleClass('show');
  jQuery(this).children('a').toggleClass('open-dropdown');

});

// close opened dropdown when clicking anywhere on the website
jQuery(document).click( function(){
  jQuery('ul.sub-menu').toggleClass('show', false);
  jQuery('.menu-item-has-children').toggleClass('open-dropdown', false);
});


// MENU UNDERLINE ANIMATION
/////////////////////////////

// add underline dashes to all parent menu elements
jQuery('.menu-main-menu-container ul li').not('ul.sub-menu li').append('<span class="underline-dash"></span>');


// BURGER MENU TOGGLE & ANIMATION
/////////////////////////////////////

// burger menu actions
jQuery('#burger-menu-wrapper').click(function(){

  // expand menu bar to full site menu background
  jQuery('#topmenu').toggleClass('expand');

  // activate
  if (jQuery('#desktop-menu').hasClass('activate')) {

    // DEACTIVATE desktop menu (via display: none/block) with delay, so it can fade out (opacity) first
    setTimeout( function(){ jQuery('#desktop-menu').removeClass('activate'); }, 200);

    // blend OUT desktop menu (via opacity) with minimal delay, so it will activate first
    jQuery('#desktop-menu').toggleClass('show');

  } else {

    // ACTIVATE desktop menu
    jQuery('#desktop-menu').addClass('activate');

    // blend IN desktop menu (via opacity) with minimal delay, so it will activate first
    setTimeout( function(){ jQuery('#desktop-menu').toggleClass('show'); }, 1);

  }

  // animate burger symbol
  jQuery('#burger-menu').toggleClass('cross');

  // deactivate body scroll
  jQuery('body').toggleClass('no-scroll');

});

// animate burger menu X when clicking menu link
jQuery('#desktop-menu ul li').click(function(){

  // if clicking a sub-menu
  if (jQuery('#desktop-menu ul li ul').hasClass('sub-menu')){
    //animate burger menu x when clicking sub-menu link
    jQuery('#desktop-menu ul li ul li').click(function() {
      // animate cross back to burger symbol
      jQuery('#burger-menu').removeClass('cross');
    })
  }

  // if NOT clicking sub-menu
  else {
    // animate cross back to burger symbol
    jQuery('#burger-menu').removeClass('cross');
  }


});


// NAVBAR DISAPPEARS ON SCROLL DOWN
/////////////////////////////////////

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;

  // if scroll position is smaller than X or scrolling upwards, show menu bar
  if (currentScrollPos < 60 || prevScrollpos >= currentScrollPos) {
    document.getElementById("menu-container").style.top = "0";

  // if menu is expanded, do nothing
  } else if (jQuery('#desktop-menu').hasClass('show')) {
    return;

  // if window is smaller than 991px (burger menu breakpoint) scroll down will hide menu bar
} else /*if (jQuery( window ).width() <= 991) */ {
    // document.getElementById("menu-container").style.top = "-70px";                           // Enable for Ver.2 (desktop-menu AND burger-menu)
    document.getElementById("menu-container").style.top = "-90px";                           // Enable for Ver.1 (burger-menu ONLY)
  }
  prevScrollpos = currentScrollPos;
}

// FOOTER DIVIDERS
/////////////////////////////

// inserts dividers between footer-menus

jQuery('ul#menu-footer-menue li').not('ul#menu-footer-menue li:last-child').after('<li class="divider">|</li>')
