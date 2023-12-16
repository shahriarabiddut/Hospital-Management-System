<!DOCTYPE html>
<html> 
<head>
	<title> @isset($SiteOption)
		{{ $SiteOption[0]->value }}
	@endisset | Contact Us </title>

		<!-- Web Fonts -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

		<!-- CSS Global Compulsory -->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- CSS Header and Footer -->
		<link rel="stylesheet" href="assets/css/header.css">
		<link rel="stylesheet" href="assets/css/footer.css">

		<!-- CSS Implementing Plugins -->
		<link rel="stylesheet" href="assets/plugins/line-icons-pro/styles.css">
		<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
		<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

		<!-- CSS Customization -->
		<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
	<div class="wrapper">
	<!--=== Header v1 ===-->
	@include('0pages.navbar')


					<!--=== Content Part ===-->
					<div class="container content">
					<div class="row " style="margin-bottom: 30px;">
					<div class="col-md-9" style="margin-bottom: 30px;">
					<div class="headline"><h2>Contact Form</h2></div>


					<form onsubmit="showMsg(0);return false;" method="post" class="sky-form sky-changes-3">
					<fieldset>
					<div class="row">
					<section class="col col-6">
					<label class="label">Name</label>
					<label class="input">
					<i class="icon-append fa fa-user"></i>
					<input type="text" name="name" id="name">
					</label>
					</section>
					<section class="col col-6">
					<label class="label">E-mail</label>
					<label class="input">
					<i class="icon-append fa fa-envelope-o"></i>
					<input type="email" name="email" id="email">
					</label>
					</section>
					</div>

					<section>
					<label class="label">Subject</label>
					<label class="input">
					<i class="icon-append fa fa-tag"></i>
					<input type="text" name="subject" id="subject">
					</label>
					</section>

					<section>
					<label class="label">Mobile Number</label>
					<label class="input">
					<i class="icon-append fa fa-phone"></i>
					<input type="text" name="number" id="number">
					</label>
					</section> 

					<section>
					<label class="label">Message</label>
					<label class="textarea">
					<i class="icon-append fa fa-comment"></i>
					<textarea rows="4" name="message" id="message"></textarea>
					</label>
					</section>

					</fieldset>
						<div class="alert alert-success successBox" style="width: 90%; margin-left: 30px;">
				<button type="button" class="close" onclick="showMsg(1);">×</button>
				<strong style="font-size: 16px;">Congratulations!</strong><span class="alert-link"> Your Message Has been sent!</span>
				</div>

					<footer>
					<button type="submit" class="btn-u">Send message</button>
					</footer>

					
					</form>
					</div><!--/col-md-9-->

					<div class="col-md-3" style="margin-top: 56px;">
					
					</div><!--/col-md-3-->
					</div><!--/row-->
					</div><!--/container-->



<!--=== Footer ===-->
@include('0pages.footer')
			<!--=== End Footer ===-->
</div><!--/wrapper-->

	<!-- Java scripts -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
	function showMsg(flag){
	if(flag==0){
	$('.successBox').css('display', 'block');
	}else{
	$('.successBox').css('display', 'none');
	}
	}
	</script>

</body>
</html>
