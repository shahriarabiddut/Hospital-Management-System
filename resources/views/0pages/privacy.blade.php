<!DOCTYPE html>
<html> 
<head>
<title> @isset($SiteOption)
	{{ $SiteOption[0]->value }}
@endisset | Privacy </title>

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

		<!-- CSS Customization -->
		<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
	<div class="wrapper">
		@include('0pages.navbar')

	<!-- Term Header -->
	<div class="container" style="margin-top: 50px;">
	<div class="headline-center " style="margin-bottom: 60px;">
	<h2>PRIVACY POLICY</h2>
	<div class="line"></div>
	</div>	<!--/end Headline Center-->
	</div>  <!-- End Team header-->


				<!-- Terms -->
				<div class="container content">
				<div class="row-fluid privacy">
				<h4 style="margin-top: -30px;"> DESCRIPTION </h4>
				<p>UNITY Hospitals are required by law to maintain the privacy of your medical information, to provide you with this written Notice of Privacy Rights and Practices, and to abide by the terms of the Notice currently in effect. This policy shall be applicable to the information collected or displayed on our website. We assure to take the privacy seriously and to keep your privacy and confidentiality of the information provided to us.</p>
				<p> We shall not intentionally or unless required under laws share the contents of any person with any outside authorities or any third party. We do not guarantee or assure that the electronic communications received from you or contents or records may not be accessible to the third parties.</p><br/>

				<h4>COMMUNICATION</h4>
				<p>UNITY Hospitals may reach out to you via various means of communication including but not limited to phone, SMS, online messengers (including Facebook Messenger, Whatsapp etc), and emails to update you with your (or your families) appointments, medical history, doctor requests, updates at UNITY Hospitals and its other properties operated by Mandke Foundation. If you do not wish to receive such communications, you can either communicate the same to the caller, use the unsubscribe link on the bottom of the emails, or send a request to Unityhospital@gmail.com and the same will be acted upon within 2 weeks.</p> <br/>

				<h4>CHANGES IN THE PRIVACY POLICY</h4>
				<p>We reserve the right to amend our privacy / security policy and make the new provisions effective for all information we maintain from time to time. The revised policy will be posted in our facilities and offices, and will be available while obtaining the treatment from our hospital directly. Your use of our website shall comprise of acceptance of any changes of this Privacy and Security Policy.</p> <br/>

				<h4>OTHER WEBSITES</h4>
				<p>e do not extend the security and privacy policy to any other websites except for this website. We do not make any warranty or give any security to the personal information disclosed by you to the other websites, even if such websites are linked to our website or they are using our website link.</p> <br/>

				<h4>LAW AND JURISDICTION</h4>
				<p>The information provided under this website and the terms and conditions therein are governed by and to be interpreted in accordance with Laws of India. Any dispute arising out of the use of this website whether in contract or tort or otherwise, shall be submitted to the jurisdiction of the courts in Mumbai, India for its resolution.</p><br/>
				</div><!--/row-fluid-->
				</div><!--/container-->


		<!--=== Footer ===-->
		@include('0pages.footer')
		<!--=== End Footer ===-->
</div><!--/wrapper-->


</body>
</html>