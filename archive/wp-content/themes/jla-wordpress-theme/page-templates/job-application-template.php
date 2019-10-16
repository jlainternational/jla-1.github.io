<?php /* Template Name: Job Application Template*/ ?>
<?php
$error='';
$jobs_email_sent=false;
if(isset($_POST['submit'])) : 
if(isset($_POST['full_name']) and $_POST['full_name']!='') {
$name=$_POST['full_name'];	
	
}
else {
	$error.='Full Name is Required<br/>';
}
if(isset($_POST['email']) and $_POST['email']!='' and filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
	$email=$_POST['email'];
}
else {
	$error.='Please Enter Valid Email<br/>';
}
if(isset($_POST['phone']) and $_POST['phone']!='') {
	$phone=$_POST['phone'];
}
else {
	$error.='Please Enter Phone Number<br/>';
}

if(isset($_POST['letter']) and $_POST['letter']!='') {
	$letter=$_POST['letter'];
}
else {
	$error.='Please Enter Cover Letter<br/>';
}
if($error=='') {
	$job=$_POST['job'];
	$subject="Job Application For : $job";
				$headers = "From: JLA <$email>" . PHP_EOL;
			$headers .= "Reply-To: $email" . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
				$attachments='';
			if ($_FILES) {
			if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
$uploadedfile = $_FILES['file'];
$upload_overrides = array( 'test_form' => false );
$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
    if ( $movefile ) {
    $attachments=$movefile['file'];   
       
    }
	
					}
	$body="<p>Hello,<br/>Someone applied for the position of : $job at JLA Website. </p><p>Here are the Details : <br/>
	Name : $name <br/>
	Email : $email <br/>
	Phone : $phone <br/>
	Cover Letter : $letter </p>
	<p>Thank You,<br/>
	JLA.
	";
	
	$receiver=get_field('admin_email','option');
	if (wp_mail($receiver, $subject, $body, $headers, $attachments)) {

    $jobs_email_sent = true;

} else {
    $error.='Unable to Send Email<br/>';
}

}

endif;  
 get_header(); ?>
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

  <!-- Lead Text (Intro Text)
          ================================================== -->
          <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle currentColor"><?php echo get_the_title(); ?></h1>
            <article class="row column">
              <p class="leadText lightFont">
                <?php  
				if(isset($_POST['submit'])) {
					if($error!='') {
						echo "<div class='error'>$error</div>'";
						
					}
					if($jobs_email_sent==true) {
						echo "<div class='success'>Your Application has been Sent Successfully. We will get back to you shortly.</div>'";
					}
					
				}
				?>
              </p>
            </article>
          </section>
          <section id="contactSection" class="sectionSpace last">
            <div class="row">
              <div class="medium-12 columns contacatForm">
                 <div class="modal">
									<p> Application for : <span id="jobTitle"><?php echo $_POST['job']; ?></span> <br/></p>
									  <div id="apply_now">
									  <form id="career_form" action="" enctype="multipart/form-data" method="POST">
									  <p><label for="full_name" id="name_label">Full Name*</label>
									  <input type="text" name="full_name" id="full_name" required />
									  <input type="hidden" name="job" id="job" value="<?php echo $_POST['job']; ?>"	/>
										  
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
              </div>
             
            </div>
          </section>
          
<?php get_footer(); ?>