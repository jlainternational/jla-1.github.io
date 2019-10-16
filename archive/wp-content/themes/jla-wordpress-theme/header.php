<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <title>JLA | <?php echo get_the_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory(); ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory(); ?>/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory(); ?>/favicon-32x32.png">
     <link rel="shortcut icon" href="<?php echo get_template_directory(); ?>/favicon.ico">
    <?php wp_head(); ?>
	<style>
	.modal,.modal p {
		font-weight:100;
	}
	#career_form {
		margin-top:20px;
	}
	#career_form label {
		font-weight:100;
	}
	.error {
		color:red;
		font-weight:bold;
		text-align:center;
		border:solid red 1px;
		padding:7px;
	}
	.success {
		color:green;
		font-weight:bold;
		text-align:center;
		border:solid green 1px;
		padding:7px;
		
	}
	</style>
	</head>
	<!-- SVGs
================================================== -->
<svg style="display:none;">
  <symbol id="searchIcon" viewBox="0 0 78.24 80.17">
      <path d="M87.53,80L62.94,55.44a27.68,27.68,0,0,0,5.31-16.3,5.53,5.53,0,0,0-.09-0.91,5.58,5.58,0,0,0,.09-0.92A27.89,27.89,0,0,0,40.4,9.46a5.69,5.69,0,0, 0-.8.08,5.72,5.72,0,0,0-.8-0.08A27.89,27.89,0,0,0,10.94,37.31a5.45,5.45,0,0,0,.09.91,5.47,5.47,0,0,0-.09.92A27.89,27.89,0,0,0,38.8,67a5.59,5.59,0,0,0,.8-0.08,5.52,5.52,0,0,0,.8.08,27.64,27.64,0,0,0,14.24-4L79.58,88A5.62,5.62,0,1,0,87.53,80ZM39.6,55.84a5.57,5.57,0,0,0-.8-0.08A16.63,16.63,0,0,1,22.19,39.14a5.43,5.43,0,0,0-.09-0.91,5.48,5.48,0,0,0,.09-0.92A16.63,16.63,0,0,1,38.8,20.7a5.74,5.74,0,0,0,.8-0.08,5.68,5.68,0,0,0,.8.08A16.63,16.63,0,0,1,57,37.31a5.56,5.56,0,0,0,.09.91,5.57,5.57,0,0,0-.09.92A16.63,16.63,0,0,1,40.4,55.76,5.5,5.5,0,0,0,39.6,55.84Z" transform="translate(-10.94 -9.46)"/>
  </symbol>
  <symbol id="closeIcon" viewBox="0 0 212.982 212.982">
      <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
        c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
        l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
        c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
  </symbol>
  <!-- SOCIALS -->
  <symbol id="gplus" viewBox="0 0 30 30">
          <path d="M9.4,26.4c-3.2,0-5.5-2-5.5-4.4c0-2.4,2.8-4.3,6-4.3c0.7,0,1.4,0.1,2.1,0.3c1.7,1.2,3,1.9,3.3,3.2c0.1,0.3,0.1,0.6,0.1,0.9C15.5,24.5,13.9,26.4,9.4,26.4 M10.3,12.2C8.2,12.2,6.1,9.8,5.8,7C5.4,4.2,6.8,2.1,9,2.2c2.1,0.1,4.2,2.3,4.5,5.1C13.8,10.1,12.4,12.3,10.3,12.2 M14.7,16.4c-.7-.5-2.2-1.8-2.2-2.6c0-.9,.3-1.3,1.6-2.4c1.4-1.1,2.3-2.6,2.3-4.3c0-2.1-.9-4.1-2.7-4.8h2.6L18.3,1H10C6.3,1,2.8,3.8,2.8,7.1c0,3.3,2.5,6,6.3,6c0.3,0,0.5,0,0.8,0c-0.2,0.5-0.4,1-0.4,1.5c0,0.9,0.5,1.7,1.1,2.3c-0.5,0-0.9,0-1.4,0c-4.6,0-8.1,2.9-8.1,6c0,3,3.9,4.9,8.5,4.9c5.2,0,8.1-3,8.1-6C17.6,19.3,16.9,17.9,14.7,16.4 M26.7,12.5h-3.2V9.2h-2.6v3.2h-3.2v2.6h3.2v3.2h2.6v-3.2h3.2V12.5z"/>
  </symbol>
  <symbol id="twitter" viewBox="0 0 27 22">
          <path d="M26.7,2.6c-1,0.4-2,0.7-3.2,0.9c1.1-0.7,2-1.8,2.4-3c-1.1,0.6-2.2,1.1-3.5,1.3c-1-1.1-2.4-1.7-4-1.7c-3,0-5.5,2.5-5.5,5.5c0,0.4,0,0.8,.1,1.2C8.6,6.5,4.6,4.3,1.9,1C1.4,1.8,1.1,2.8,1.1,3.8c0,1.9,1,3.6,2.4,4.6c-0.9,0-1.7-0.3-2.5-0.7v0.1c0,2.7,1.9,4.9,4.4,5.4C5,13.2,4.5,13.3,4,13.3c-0.4,0-0.7,0-1-0.1C3.7,15.4,5.7,17,8.1,17c-1.9,1.5-4.2,2.3-6.8,2.3c-0.4,0-0.9,0-1.3-0.1c2.4,1.6,5.3,2.5,8.4,2.5C18.5,21.7,24,13.4,24,6.1c0-0.2,0-0.5,0-0.7C25.1,4.6,26,3.7,26.7,2.6"/>
  </symbol>
  <symbol id="fbook" viewBox="0 0 14.1 26.9">
          <path d="M1,8.8h2.8V6.1c0-1.2,0-3,0.9-4.1c0.9-1.2,2.1-2,4.3-2c3.5,0,4.9,0.5,4.9,0.5l-0.7,4.1           c0,0-1.2-0.3-2.2-0.3c-1.1,0-2,0.4-2,1.5v3.1h4.4l-0.3,4H8.9v13.9H3.8V12.8H1V8.8z"/>
  </symbol>
  <symbol id="wiki" viewBox="0 0 90.001 90.001">
    <path d="M89.938,13.691c0,0-13.965,0-18.606,0L70,13.92v1.788c0,0.21,0.635,0.386,0.811,0.517
      c0.168,0.142,0.623,0.219,0.811,0.219l1.686,0.084c1.912,0.09,2.494,0.505,3.239,1.205c0.731,0.725,0.851,1.955,0.281,3.684
      L60.383,64.346l-0.628-0.188L49.309,40.661c0.151-0.353,0.242-0.551,0.242-0.551l8.553-17.578c0.994-1.854,1.957-3.511,2.446-4.283
      c0.894-1.408,1.328-1.674,3.763-1.797c0.498,0,0.688-0.244,0.688-0.738v-1.778l-0.125-0.191c0,0-10.224-0.035-14.879,0L50,13.928
      v1.779c0,0.217-0.12,0.39,0.045,0.521c0.176,0.142,0.25,0.215,0.439,0.215l0.697,0.089c1.902,0.09,2.754,0.636,3.012,0.979
      c0.455,0.615,0.668,1.271-0.434,3.911l-6.585,14.42l-5.951-13.376c-1.951-4.274-2.434-5.597,0.508-5.844l0.79-0.183
      c0.566,0,0.478-0.224,0.478-0.649v-1.87l-0.059-0.153c0,0-10.9,0-15.873,0.003L27,13.953v1.875c0,0.421,0.415,0.529,1.185,0.645
      c2.755,0.396,2.707,0.713,5.429,6.646c0.407,0.889,1.609,3.57,1.609,3.57l6.204,13.391c0,0,0.704,1.72,1.805,4.39l-9.016,19.763
      l-0.515-0.146c0,0-13.991-32.418-18.037-43.266c-0.426-1.117-0.611-1.953-0.611-2.468c0-1.102,0.904-1.699,2.712-1.779l2.751-0.099
      c0.563,0,1.484-0.236,1.484-0.727V13.97l-0.829-0.184c0,0-17.14-0.021-20.602,0L0,13.97v1.872c0,0.336,0.448,0.545,1.227,0.634
      c2.129,0.129,3.559,0.499,4.229,1.123c0.668,0.628,1.393,2.215,2.333,4.688c5.087,13.424,15.902,37.38,21.166,51.026
      c1.513,3.723,3.424,4.303,5.733-0.117c2.379-4.848,7.178-15.608,10.679-23.552c3.275,7.924,7.734,18.645,9.885,23.501
      c1.712,3.887,3.665,4.271,5.646,0.116c5.183-12.654,20.319-50.736,20.319-50.736c0.654-1.869,1.568-3.309,2.746-4.355
      c1.169-1.033,2.909-1.617,5.349-1.731c0.494,0,0.688-0.249,0.688-0.731V13.92L89.938,13.691z"/>
  </symbol>
  <symbol id="arrow" viewBox="0 0 227.096 227.096">
    <polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723
      146.933,181.902 152.835,187.811 227.096,113.55"/>
  </symbol>
</svg>
<!-- JLA - BODY CONTENT
Home page must have the introArea ID
================================================== -->
<?php 
if(is_search()) : 
$pageId='listingTemplate';
$pageClass='innerPage';
elseif(is_singular('news')) : 
$pageId='singleArticleTemplate';
$pageClass='innerPage';
else :  
$pageId='';
$page_class='';
$pageId=get_field('page_id'); 
 $pageClass = get_field('page_class'); 
endif; 
?>
<?php
if($pageId=='') $pageId='servicePage';
if($pageClass=='') $pageClass='innerPage';
?>

  <body id="<?php echo $pageId; ?>" class="<?php echo $pageClass; ?>">
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!-- OFF-CANVAS-Right-Menu -->
        <div class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right">
          <div class="searchFormContainer">
            <form role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>/">
              <p class="formItem seamLess withIcon" id="searchItem">
                <i class="ico">
                  <svg>
                    <use class="openStep" xlink:href="#searchIcon" />
                    <use class="closeStep" xlink:href="#closeIcon" />
                  </svg>
                </i>
                <input  name="s" class="inFormItem" id="searchInput" type="search" placeholder="Search..." />
              </p>
            </form>
          </div><!--./searchFormContainer-->
         <?php wp_nav_menu( array('theme_location' => 'main_menu', 'menu_class' => 'vertical menu mainMenu', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
		  <?php wp_nav_menu( array('theme_location' => 'secondary_menu', 'menu_class' => 'vertical menu secondaryMenu', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
          <!--./secondaryMenu-->
          <ul class="socialMenu menu simple">
		  <?php if(get_field('google_plus','option') and get_field('google_plus','option')!=''): ?>
            <li><a href="<?php echo get_field('google_plus','option'); ?>">
                <svg>
                  <use xlink:href="#gplus" />
                </svg>
              </a></li>
			  <?php endif; ?>
			   <?php if(get_field('wikipedia_icon','option') and get_field('wikipedia_icon','option')!=''): ?>
            <li><a href="<?php echo get_field('wikipedia_icon','option'); ?>">
                <svg>
                  <use xlink:href="#wiki" />
                </svg>
              </a></li>
			  <?php endif; ?>
			   <?php if(get_field('facebook_icon','option') and get_field('facebook_icon','option')!=''): ?>
            <li><a href="<?php echo get_field('facebook_icon','option'); ?>">
                <svg>
                  <use xlink:href="#fbook" />
                </svg>
              </a></li>
			  <?php endif; ?>
			   <?php if(get_field('twiiter_icon','option') and get_field('twiiter_icon','option')!=''): ?>
            <li><a href="<?php echo get_field('twiiter_icon','option'); ?>">
                <svg>
                  <use xlink:href="#twitter" />
                </svg>
              </a></li>
			  <?php endif; ?>
                    </ul><!--./socialMenu-->
        </div><!--./off-canvas-->
        <!-- OFF-CANVAS-CONTENT -->
        <div class="off-canvas-content" data-off-canvas-content>
          <!-- CANVAS - THE GRID
          ================================================== -->
          <canvas id="myGrid"></canvas>

          <!-- HEADER and LOGO
          ================================================== -->
          <header>
            <div class="row" id="topHeader">
              <!-- Logo -->
              <div class="small-2 medium-4 columns">
                <div class="logo">
                  <a href="<?php echo get_site_url(); ?>">
                    <h1>
                      <svg id="jlaLogo" viewBox="0 0 150.91 152.25">
                        <title>JLA Logo</title>
                        <path id="theJ" d="M28.29,22.56c0,7.9-5.67,13.46-14.2,13.46C6,36,1.06,31.18,0,24.19l8.41-1.61c0.37,3.58,2.32,5.79,5.67,5.79a5.35,5.35,0,0,0,5.51-5.8V0h8.67V22.56h0Z" style="transform: translate(5px, 0px);"></path>
                        <path id="theL" d="M8.54,118.91V145.3H25.49v6.95h-25V118.91H8.54Z" style="transform: translate(10px, -18px);"></path>
                        <path id="theA" d="M132.18,132.39l4.91,9.94h-10Zm-18.69,19.86h9.35l1.84-4.08h15l1.9,4.08h9.35l-18.69-34.44Z" style="transform: translate(-9px, -18px);"></path>
                      </svg>
                    </h1>
                  </a>
                </div><!--/.logo-->
              </div>
              <!-- Tagline -->
              <div class="small-10 medium-7 end text-right columns currentColor tagLine">
                Creating Places
              </div>
              <div class="menuController">
                <a class="btn-menu" href="#" data-toggle="offCanvas"><span>MENU</span></a>
              </div>
            </div>
          </header>


			 
        
  