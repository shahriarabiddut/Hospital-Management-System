<!DOCTYPE html>
<html> 
<head>
	<title> @isset($SiteOption)
		{{ $SiteOption[0]->value }}
	@endisset | Doctors </title>


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


	<!-- Image title -->

	<div style="text-align: center; margin-top: 50px;">
	<h2>DOCTORS</h2>
	</div>







		<!--=== Footer ===-->
		@include('0pages.footer')

		<!--=== End Footer ===-->
</div><!--/wrapper-->


</body>
</html>
