          <!-- FOOTER
          ================================================== -->
          <footer>
            <div id="footer" class="row column">
			 <?php wp_nav_menu( array('theme_location' => 'footer_left_menu', 'menu_class' => 'menu float-left', 'depth'=> 3, 'container'=> false)); ?>
			 <?php wp_nav_menu( array('theme_location' => 'footer_right_menu', 'menu_class' => 'menu float-right', 'depth'=> 3, 'container'=> false)); ?>

            </div>
          </footer>


        </div><!--/.off-canvas-content-->
      </div><!--/.off-canvas-wrapper-inner-->
    </div><!--/.off-canvas-wrapper-->


<canvas id="myGrid"></canvas>
<!-- SCRIPTS
================================================== -->
  <?php wp_footer(); ?>
  <?php if(is_page_template('page-templates/places-page-template.php')) :  ?>
 <script>

			jQuery(document).ready(function($) {

				var $grid=$('#projectsList').isotope({
  // options
				itemSelector: '.projectItem'
				 
				
				});
				$grid.imagesLoaded().progress( function() {
				$grid.isotope('layout');
					});
				$('.filters-button-group li').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    
    $grid.isotope({ filter: filterValue });
  });
  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
			});

			

		</script>	
<?php endif; ?>		
<?php if(is_page_template('page-templates/jobs-page-template.php')) : ?>
<div class="modal" id="ex1" style="display:none;">
<p> Application for : <span id="jobTitle"></span> <br/></p>
  <div id="apply_now">
  <form id="career_form" method="POST" action="<?php echo get_site_url(); ?>/apply-now/" enctype="multipart/form-data">
  <p><label for="full_name" id="name_label">Full Name*</label>
  <input type="text" name="full_name" id="full_name" required />
  <input type="hidden" name="job" id="job" />
      
  </p>
  <p>    
	<label for="email" id="email_label">Email*</label>
	<input type="text" name="email" id="email" required />
	
	</p>
    <p>  
	<label for="phone" id="phone_label">Phone*</label>
	<input type="text" name="phone" id="phone" />
	
	</p>
	<p>
	<label for="letter" id="letter_label">Letter*</label>
	<textarea name="letter" id="letter" required></textarea>
	
	</p>
	<p>
	<label for="cv" id="cv_label">CV</label>
	<input type="file" id="cv" name="file" value="Upload CV"/>
	</p>
	<p style="text-align:right;"><input class="career_submit button small boldFont greenBtn" name="submit" type="submit"></p>
</form>
  </div>
<?php endif; ?>
<script>
  jQuery(document).ready(function($) {
    $('.error').hide();
    $(".career_submit").click(function() {
      // validate and process form here
      
      $('.error').hide();
  	  var name = $("input#full_name").val();
  		if (name == "") {
        $("label#name_error").show();
        $("input#full_name").focus();
        return false;
      }
  		var email = $("input#email").val();
  		if (email == "") {
        $("label#email_error").show();
        $("input#email").focus();
        return false;
      }
  		var phone = $("input#phone").val();
  		if (phone == "") {
        $("label#phone_error").show();
        $("input#phone").focus();
        return false;
      }
	  var letter = $("textarea#letter").val();
  		if (letter == "") {
        $("label#letter_error").show();
        $("textarea#letter").focus();
        return false;
      }
      
    });
  });
jQuery('.applyNow').click(function() {
	var t=jQuery(this).data("job-title");
	jQuery('#jobTitle').html(t);
	jQuery('#job').val('');
	jQuery('#job').val(t);
	jQuery('#ex1').modal(
	{fadeDuration: 250}
	);

});
</script>
<!-- ==================== google analytics ============================== -->
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52438989-11', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>
