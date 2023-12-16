<!DOCTYPE html>
<html> 
<head>
<title> @isset($SiteOption)
    {{ $SiteOption[0]->value }}
@endisset | Home </title>

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
			<!-- Slider -->
			<div id="slide">
			<div class="slideshow-container">
			<div class="mySlides fade"> <img src="assets/img/slider/1.jpg" alt="Slider1" style="width:100%"> </div>
			<div class="mySlides fade"> <img src="assets/img/slider/2.jpg" alt="Slider2" style="width:100%"> </div>
			<div class="mySlides fade"> <img src="assets/img/slider/3.jpg" alt="Slider3" style="width:100%"> </div>
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> 
			</div>
			<br>
			<div style="text-align:center"> 
			<span class="dot" onclick="currentSlide(1)"></span> 
			<span class="dot" onclick="currentSlide(2)"></span> 
			<span class="dot" onclick="currentSlide(3)"></span>
			<span class="dot" onclick="currentSlide(4)"></span>
			</div>
			</div>

			<script>
			var slideIndex = 0;
			showSlides();
			var slides,dots;

			function showSlides() {
			var i;
			slides = document.getElementsByClassName("mySlides");
			dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex> slides.length) {slideIndex = 1}    
			for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			setTimeout(showSlides, 8000); // Change image every 8 seconds
			}

			function plusSlides(position) {
			slideIndex +=position;
			if (slideIndex> slides.length) {slideIndex = 1}
			else if(slideIndex<1){slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
			}
			for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			}

			function currentSlide(index) {
			if (index> slides.length) {index = 1}
			else if(index<1){index = slides.length}
			for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
			}
			for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[index-1].style.display = "block";  
			dots[index-1].className += " active";
			}
			</script>


			<!-- End of Slider -->

		<!--=== Welcome to Unity===-->
		<div class="container content-md welcomeSection">
		<div class="row section1">
		<div class="col-md-6" style="margin-bottom: 40px;" style="border:2px solid black background: green;">
			<h2 class="title-v2">WELCOME </h2>
		</div>
		<div class="col-md-6 overflow-h">
			<img style="border-radius: 50px; margin-left: 30px;" src="assets/img/bg/1.jpg" alt="">
		</div>
		</div>
		</div>
		<!--=== End About Us ===-->



		
		</div>



		<!--=== Footer ===-->
		@include('0pages.footer')

		<!--=== End Footer ===-->
</div><!--/wrapper-->

</body>
</html>

