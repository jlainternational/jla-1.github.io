jQuery(document).foundation();
'use strict';

var JLAApp = {
    onReady: function(){
        //Draw the GRID
        //JLAApp.drawGrid();
        //Call the introduction scene.
        //JLAApp.animatetheLogo();
        //Call the slider if on the project page
        if( jQuery(".projectImagesSlider").length > 0 ){
            var selector = "projectImagesSlider",
            SliderOptions = {
                lazyLoad: 'ondemand',
                dots: false,
                arrows: true,
                nextArrow: '<i class="slick-arrow slick-next"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                prevArrow: '<i class="slick-arrow slick-prev"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: false,
                responsive: [
                    {
                      breakpoint: 520,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            };
            JLAApp.makeSlider(SliderOptions, selector);
        }
        if( jQuery(".relatedPrjctsSlider").length > 0 ){
            var selector = "relatedPrjctsSlider",
            SliderOptions = {
                lazyLoad: 'ondemand',
                dots: false,
                arrows: true,
                nextArrow: '<i class="slick-arrow slick-next"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                prevArrow: '<i class="slick-arrow slick-prev"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                responsive: [
                    {
                      breakpoint: 520,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            };
            JLAApp.makeSlider(SliderOptions, selector);
        }
         //Call the slider for the homepage
        if( jQuery('.ourPlacesSlider').length > 0 ){
            jQuery('.ourPlacesSlider').slick({
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1,
                variableWidth: true,
                dots: true,
                nextArrow: '<i class="slick-arrow slick-next"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                prevArrow: '<i class="slick-arrow slick-prev"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                    dots: false
                  }
                }
                ]
            });
        }
    },
    openedMenuState: function(){
        jQuery(".btn-menu").addClass('btn-menu-open');
    },
    closedMenuState: function(){
        jQuery(".btn-menu").removeClass('btn-menu-open');
    },
    searchIcoClick: function(){
        jQuerysearchItem = jQuery("#searchItem");
        if(jQuerysearchItem.hasClass("yoSearch")){
            jQuerysearchItem.removeClass("yoSearch");
            jQuery("#searchInput").val("");
        }
        else{
            jQuerysearchItem.addClass("yoSearch");
            jQuery("#searchInput").focus();
        }
    },
    onSubMenuClick: function(){
        jQuery(".hasSubMenu.opened").not( jQuery(this) ).removeClass('opened');
        jQuerythis = jQuery(this);
        if( jQuerythis.hasClass( 'opened' ) ){
            jQuerythis.removeClass('opened');
        }
        else{
            jQuerythis.addClass('opened');
        }
    },
    servicesHandler: function(e){
        e.preventDefault();
        var jQuerythis = jQuery(this),
            jQuerythisTarget = jQuerythis.attr('data-target');
        jQuerythis.addClass('active').siblings().removeClass('active');
        jQuery('.sectorArtcle').removeClass('showIt');
        jQuery('[data-id='+jQuerythisTarget+']').addClass('showIt');
    },
    filterMe: function(){
        //Used in the Projects Page Listing
        jQuery(this).addClass('activeFilter').siblings().removeClass('activeFilter');
        jQuerytargetLebel = jQuery(this).attr('data-target');
        jQuery('.projectItem').hide();
        jQuery('[data-label="'+jQuerytargetLebel+'"]').show();
    },
    makeSlider: function(options, elmt){
        jQuery("."+elmt).slick(options);
    },
    showCreditsSctn: function(e){
        jQuery(this).hide();
        jQuery("#projectCreadits").addClass('showCredits');
    },
    showJobDetail: function(e){
        e.preventDefault();
        jQuerythis = jQuery(this);
        if ( jQuerythis.hasClass('triggered') ){
            //MEANS TO GO LESS
            jQuerythis.removeClass('triggered');
            jQuerythis.text( jQuerythis.attr( 'data-more-text' ) ); //Changing The Text
            jQuerythis.parent('.controllers').prev('.jobDetails').removeClass('slideMe');
        }
        else{
            jQuerythis.addClass('triggered');
            jQuerythis.text( jQuerythis.attr( 'data-less-text' ) ); //Changing The Text
            jQuerythis.parent('.controllers').prev('.jobDetails').addClass('slideMe');
        }
    }
}

//ON READY
jQuery(document).on("ready", JLAApp.onReady);

//On homepage (Service Slider)
jQuery(".sctorsLstItm").on("click", JLAApp.servicesHandler);

//Clicking on an item which has a submenu
jQuery(".hasSubMenu").on("click", JLAApp.onSubMenuClick);

/* OPEN AND CLOSE EVENTS OF THE SIDE MENU
================================================== */
jQuery(".off-canvas").on("opened.zf.offcanvas", JLAApp.openedMenuState);
jQuery(".off-canvas").on("closed.zf.offcanvas", JLAApp.closedMenuState);

//SEARCH ICON CLICK
jQuery("#searchItem .ico").on("click", JLAApp.searchIcoClick);

/* Projects List Page - Filter buttons click
================================================== */
//jQuery(".fltrBtn").on("click", JLAApp.filterMe);

jQuery(".showCrdts").on("click", JLAApp.showCreditsSctn);

/* Careers List Page - Show More Details Button
================================================== */
jQuery(".showMoreDetails").on("click", JLAApp.showJobDetail);


//SMOOTH SCROLL

jQuery('a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    var target = jQuery(this.hash);
    target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
    if (target.length) {
      jQuery('html, body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});
$("#filters .filtersContainer li .subMenu").mCustomScrollbar({
  axis: "y"
});
