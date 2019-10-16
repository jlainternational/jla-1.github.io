$(document).foundation();


var JLAApp = {
    onReady: function(){
        //Draw the GRID
        //JLAApp.drawGrid();
        //Call the introduction scene.
        if( $("#introArea").length > 0 ){
            //JLAApp.introScene();
        }
        //Call the slider if on the project page
        if( $(".projectImagesSlider").length > 0){
            var selector = "projectImagesSlider", 
            SliderOptions = {
                lazyLoad: 'ondemand',
                dots: false,
                arrows: true,
                nextArrow: '<i class="slick-arrow slick-next"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                prevArrow: '<i class="slick-arrow slick-prev"><svg viewBox="0 0 227.096 227.096"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"/></svg></i>',
                slidesToShow: 3,
                slidesToScroll: 3,
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
        if( $(".relatedPrjctsSlider").length > 0 ){
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
    },
    drawGrid: function(){
        /* GRID CANVAS - Larger then mobile screens 680px
        ================================================== */

        //grid width and height
        var bw = window.innerWidth;
        var bh = window.innerHeight;
        if(bw >= 681){
            $("#myGrid").show();
            //padding around grid
            var p = 0;
            //size of canvas
            var cw = bw - 9;
            var ch = bh - 9;

            var canvas = $('#myGrid').attr({width: cw, height: ch}).appendTo('body');
            var context = canvas.get(0).getContext("2d");

            function drawIt(){
                for (var x = 0; x <= bw; x += 50) {
                    context.moveTo(0.5 + x + p, p);
                    context.lineTo(0.5 + x + p, bh + p);
                }
                for (var x = 0; x <= bh; x += 50) {
                    context.moveTo(p, 0.5 + x + p);
                    context.lineTo(bw + p, 0.5 + x + p);
                }
                context.strokeStyle = "#151515";
                context.stroke();
            }
            drawIt();
        }
        else
            $("#myGrid").hide();
    },
    introScene: function(){
        /* INTRODUCATION ANIMATION
        ================================================== */
        var hpIntroTL  = new TimelineMax(),
                svgLogo = $("#jlaLogo"),
                Jpath   = $("#theJ"),
                Lpath   = $("#theL"),
                Apath   = $("#theA"),
                offCanvasMenu = $(".off-canvas"),
                menuIcon = $(".menu-icon"),
                //Introduction Box
                introBox = $("#about"),
                quickIntroBtn = $(".quickIntro");
                hintBox = $(".hint");
                //hpIntroTL.to(Jpath, 0.1, {x:"+=10",yoyo:true,repeat:5}, '+=2');
                hpIntroTL.to(Lpath, 0.4, {x:110, y: -116, ease:Elastic.easeNone}, '+=0.5');
                hpIntroTL.to(Apath, 0.4, {x: -111, y: -18, ease:Elastic.easeNone}, '+=0.2');
                hpIntroTL.to(Lpath, 0.3, {x: 60, y: -70, ease:Elastic.easeNone}, '+=0.2');
                hpIntroTL.to(Apath, 0.3, {x: -9, y:-18, ease:Elastic.easeNone}, '+=0.2');
                hpIntroTL.to(Lpath, 0.75, {x: 10, y: -18, ease:Elastic.easeNone}, '+=0.5');
                //hpIntroTL.to(svgLogo, 0.1, {scale:"+=0.1", yoyo:true, repeat:5}, '+=0.2');


                // // Introduction Box
                hpIntroTL.from(introBox, 1, {opacity:0, ease:Elastic.easeNone}, '+=0.2');
                hpIntroTL.from(quickIntroBtn, 1, {x: 500, opacity:0, ease:Elastic.easeOut}, '+=0.1');
                hpIntroTL.from(offCanvasMenu, 0.6, {x:50, ease:Elastic.easeNone}, '+=0.4');
                hpIntroTL.from(menuIcon, 0.4, {y:-20,opacity:0, ease:Elastic.easeNone}, '+=0.2');
                
                hpIntroTL.from(hintBox, 0.75, {y:5, opacity:0, ease:Ease.easeNone}, '+=0.5');
                hpIntroTL.to(hintBox, 0.1, {x:"+=15", yoyo:true, repeat:5}, '+=5');
    },
    animateCoreSection: function(e){
        e.preventDefault();
        /* CORE-SECTION ANIMATION _INTRO
        ================================================== */
        var coreTL = new TimelineMax(),
            aboutSection = $("#about"),
            coreSection = $("#core"),
            logo = $(".logo"),
            svgLOGO = $("#jlaLogo"),
            coreBox = $(".coreBox"),
            bgNumber   = Math.ceil( ( Math.random() * 5 ) ),
            bgURL      = "imgs/bg-"+bgNumber+".jpg",
            nxtArrow = $("#core .nxtSectionArrow");
        coreSection.removeClass('hide');
        aboutSection.addClass('hide');
        //coreSection.css('background', 'url("../imgs/bg-' + bgURL + '").jpg');
        coreTL.to(aboutSection, 1, {x: -100, opacity: 0}, '+=0.2');
        coreTL.to(coreSection, 1.1, {x: 0, backgroundImage: 'url("../imgs/bg-' + bgURL + '").jpg'}, '-=0.9');
        coreTL.fromTo(logo, 0.3, {scale:0},{scale:1, zIndex: 99}, '+=0.2');
        coreTL.from(coreBox, 0.4, {opacity: 0}, '+=0.1');
        coreTL.from(nxtArrow, 0.2, {x: 10, opacity:0}, '+=0.1');
        nxtArrow.on("click", JLAApp.animateNumbersSection);
        //coreSection.css('background-image', 'url("imgs/bg-' + bgURL + '").jpg');
        $('#core').css('background-image','url('+bgURL+')');
    },

    animateNumbersSection: function(e){
        e.preventDefault();
        //Just add a darkIt class to the menu
        $("#offCanvas .menu").addClass("darkIt");
        /* NUMBERS-SECTION ANIMATION _INTRO
        ================================================== */
        var numbersTL = new TimelineMax(),
            coreSection = $("#core"),
            numbersSection = $("#numbers"),
            offCanvasMenu = $(".off-canvas"),
            logo = $(".logo"),
            numbersBoxTxt = $(".numbersBox"),
            factBoxes = $(".factBox"),
            nxtArrow = $("#numbers .nxtEvnt");
        numbersSection.removeClass('hide');
        coreSection.addClass('hide');
        numbersTL.to(coreSection, 1, {x: -100, opacity: 0}, '+=0.1');
        numbersTL.to(numbersSection, 1, {x: 0}, '-=0.9');
        numbersTL.to(offCanvasMenu, 0.4, {backgroundColor: '#fde100', ease:Power3.easeOut}, '-=0.6');
        numbersTL.fromTo(logo, 0.4, {scale:0},{scale:1, zIndex: 99});
        numbersTL.from(numbersBoxTxt, 0.3, {opacity: 0, x: -100}, '+=0.1');
        numbersTL.staggerFrom(factBoxes, 0.5, {autoAlpha: 0}, 0.2);
        numbersTL.from(nxtArrow, 0.2, {x: 10, opacity:0}, '+=0.1');
        nxtArrow.on("click", JLAApp.animateProjectsSection);
    },
    animateProjectsSection: function(e){
        e.preventDefault();
        $("#offCanvas .menu").removeClass("darkIt");
        var projectsTL = new TimelineMax(),
            numbersSection = $("#numbers"),
            projectsSection = $("#comingSoon"),
            offCanvasMenu = $(".off-canvas"),
            logo = $(".logo"),
            svgLOGO = $("#jlaLogo"),
            intro = $("#projects .intro"),
            projectItem = $(".projectItem");
        projectsSection.removeClass('hide');
        numbersSection.addClass('hide');
        projectsTL.to(numbersSection, 1.2, {x: -100, opacity: 0}, '+=0.1');
        projectsTL.to(projectsSection, 0.4, {x: 0}, '-=0.9');
        projectsTL.to(offCanvasMenu, 0.1, {backgroundColor: '#34cad2', ease:Power3.easeOut}, '-=0.5');
        projectsTL.fromTo(logo, 0.4, {scale:0},{scale:1, zIndex: 99999});
        projectsTL.fromTo('#comingSoon .introBox', 0.4, {x: 400, opacity:0}, {x:0, opacity:1});
        //projectsTL.to(svgLOGO, 0.2, {fill: '#000', color: '#000'}, '-=0.8');
        //projectsTL.fromTo(intro, 0.2, {opacity:0, y:50},{opacity: 1, y: 0});
        //projectsTL.staggerFrom(projectItem, 0.5, {autoAlpha: 0}, 0.2);

    },
    openedMenuState: function(){
        $(".openCloseMenu").addClass('opened');
        $("#introArea").addClass('noY');
        var inMenuTL = new TimelineMax(),
            searchIco = $("#searchItem"),
            menus = $("#offCanvas .menu");
        inMenuTL.staggerFromTo(menus, 0.4, {x: 100, opacity: 0},{x: 0, opacity:1}, 0.3);
        inMenuTL.fromTo(searchIco, 0.45, {opacity: 0}, {opacity: 1}, '+=0.2');
    },
    closedMenuState: function(){
        $("#introArea").removeClass('noY');
        $(".openCloseMenu").removeClass('opened');
    },
    searchIcoClick: function(){
        $searchItem = $("#searchItem");
        if($searchItem.hasClass("yoSearch")){
            $searchItem.removeClass("yoSearch");
            $("#searchInput").val("");
        }
        else{
            $searchItem.addClass("yoSearch");
            $("#searchInput").focus();
        } 
    },
    onSubMenuClick: function(){
        $(".hasSubMenu.opened").not( $(this) ).removeClass('opened');
        $this = $(this);
        if( $this.hasClass( 'opened' ) ){
            $this.removeClass('opened');
        }
        else{
            $this.addClass('opened');
        }
    },
    filterMe: function(){
        //Used in the Projects Page Listing
        $(this).addClass('activeFilter').siblings().removeClass('activeFilter');
        $targetLebel = $(this).attr('data-target');
        $('.projectItem').hide();
        $('[data-label="'+$targetLebel+'"]').show();
    },
    makeSlider: function(options, elmt){
        $("."+elmt).slick(options);
    },
    showCreditsSctn: function(e){
        $(this).hide();
        $("#projectCreadits").addClass('showCredits');
    },
    showJobDetail: function(e){
        e.preventDefault();
        $this = $(this);
        if ( $this.hasClass('triggered') ){
            //MEANS TO GO LESS
            $this.removeClass('triggered');
            $this.text( $this.attr( 'data-more-text' ) ); //Changing The Text
            $this.parent('.controllers').prev('.jobDetails').removeClass('slideMe');
        }
        else{
            $this.addClass('triggered');
            $this.text( $this.attr( 'data-less-text' ) ); //Changing The Text
            $this.parent('.controllers').prev('.jobDetails').addClass('slideMe');
        }
    }

}

//ON READY
$(document).on("ready", JLAApp.onReady);
// Quick Intro Button Click - Show Core Section
$(".quickIntroBtn").on("click", JLAApp.animateCoreSection);
//On Changing the viewport width
var listenTitme;
$(window).on("resize", function(){
    clearTimeout(listenTitme);
    //listenTitme = setTimeout(JLAApp.drawGrid, 250);
});
//Clicking on an item which has a submenu
$(".hasSubMenu").on("click", JLAApp.onSubMenuClick);
/* OPEN AND CLOSE EVENTS OF THE SIDE MENU
================================================== */
$(".off-canvas").on("opened.zf.offcanvas", JLAApp.openedMenuState);
$(".off-canvas").on("closed.zf.offcanvas", JLAApp.closedMenuState);

//SEARCH ICON CLICK
$("#searchItem .ico").on("click", JLAApp.searchIcoClick);

/* Projects List Page - Filter buttons click
================================================== */
$(".fltrBtn").on("click", JLAApp.filterMe);

$(".showCrdts").on("click", JLAApp.showCreditsSctn);

/* Careers List Page - Show More Details Button
================================================== */
$(".showMoreDetails").on("click", JLAApp.showJobDetail);


//SMOOTH SCROLL
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


