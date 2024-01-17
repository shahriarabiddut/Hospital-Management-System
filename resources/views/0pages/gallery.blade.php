<!DOCTYPE html>
<html> 
<head>
<title> @isset($SiteOption)
	{{ $SiteOption[0]->value }}
@endisset | Gallery </title>

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
		<link rel="stylesheet" href="assets/plugins/cube-portfolio/css/cubeportfolio.min.css">
		<link rel="stylesheet" href="assets/plugins/cube-portfolio/custom/custom-cubeportfolio.css">

		<!-- CSS Customization -->
		<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
		<div class="wrapper">
			@include('0pages.navbar')


				<!-- Image title -->

				<div style="text-align: center; margin-top: 50px;">
				<h2>GALLERY</h2>
				</div>
				<!-- End title  -->

				<!--=== Cube-Portfdlio ===-->
				<div class="cube-portfolio container" style="margin-top: 100px; margin-bottom: 60px;">


				<div id="grid-container" class="cbp-l-grid-agency">

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/room1.jpg" class="cbp-lightbox" data-title="Rooms for patients"><img src="assets/img/gallery/room1.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">Rooms for patients</div>
				</div>
				</div>
				<!-- end image-->

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/opd.jpg" class="cbp-lightbox" data-title="OPD Area"><img src="assets/img/gallery/opd.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">OPD Area</div>
				</div>
				</div>
				<!-- end image-->

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/opd2.jpg" class="cbp-lightbox" data-title="OPD Area 2"><img src="assets/img/gallery/opd2.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">Opd area</div>
				</div>
				</div>
				<!-- end image-->

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/parking.jpg" class="cbp-lightbox" data-title="Parking Area"><img src="assets/img/gallery/parking.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">Parking area</div>
				</div>
				</div>
				<!-- end image-->


				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/reception.jpg" class="cbp-lightbox" data-title="Reception"><img src="assets/img/gallery/reception.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">Reception</div>
				</div>
				</div>
				<!-- end image-->

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/cath_lab.jpg" class="cbp-lightbox" data-title="Cath laboratory"><img src="assets/img/gallery/cath_lab.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">cath laboratory</div>
				</div>
				</div>
				<!-- end image-->

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/platinum_wing.jpg" class="cbp-lightbox" data-title="Platinum Wing"><img src="assets/img/gallery/platinum_wing.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">platinum wing</div>
				</div>
				</div>
				<!-- end image-->

				<!-- Image -->
				<div class="cbp-item graphic">
				<div class="cbp-caption " style="margin-bottom: 20px;">
				<div class="cbp-caption-defaultWrap">
				<a href="assets/img/gallery/Hospital.jpg" class="cbp-lightbox" data-title="Hospital"><img src="assets/img/gallery/Hospital.jpg" alt="" ></a>
				</div>
				</div>
				<div class="cbp-title-dark">
				<div class="cbp-l-grid-agency-title">Hospital</div>
				</div>
				</div>
				<!-- end image-->

				</div><!--/end Grid Container-->
				</div>
				<!--=== End Cube-Portfdlio ===-->

		<!--=== Footer ===-->
		@include('0pages.footer')

		<!--=== End Footer ===-->
</div><!--/wrapper-->	


	<!-- Scripts and JS -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>

	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/cube-portfolio/js/jquery.cubeportfolio.min.js"></script>

	<script type="text/javascript" src="assets/plugins/cube-portfolio/js/cube-portfolio-3.js"></script>
	<!-- end scripts and js -->

</body>
</html>
