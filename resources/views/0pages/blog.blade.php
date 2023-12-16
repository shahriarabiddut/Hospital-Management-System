<!DOCTYPE html>
<html> 
<head>
		<title> @isset($SiteOption)
			{{ $SiteOption[0]->value }}
		@endisset | Blog </title>

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
	 
	 <!-- CSS Page Style -->
  	<link rel="stylesheet" href="assets/css/blog_timeline.css">


	<!-- CSS Customization -->
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
	<div class="wrapper">
		@include('0pages.navbar')


		<!-- Image title -->

		<div style="text-align: center; margin-top: 50px; margin-bottom: 40px;">
			<h2>BLOGS</h2>
		</div>
	<!-- End title  -->

		<!--=== Content Part ===-->
		<!-- BLOG 1 -->
    <div class="container content">
      <ul class="timeline-v1">
        <li>
          <div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="assets/img/blogs/1.jpg" alt=""/>
            </div>
            <div class="timeline-body text-justify">
              <h2 class="font-light"><a href="#">How to maintain bone and joint health during winters?</a></h2>
              <p>It is usually due to restricted absorption of Vitamin D (sunlight) in your body during winter or due to decreased blood flow to bones to increase body temperature or due to restricted mobility to conserve energy which allows accumulation of inflammatory markers or toxins in joints. This leads to stiffness and pain in joints. Ignoring problems related to bones and joints which can lead to further deterioration.</p>
              <p>These are few tips to keep your joints and muscles healthy during this winter :- </p>
              <p>1) A balanced diet is key to overall healthy living. Eat a diet which comprises of fruits, vegetables, cereals, dairy products and pulses.<br/>

			2) Eat foods rich in Vitamin K, D and C.<br/>
			3) Physical activity is also important. Exercising strengthens the muscles and maintains weight. <br/>
			4) Do not over eat and reduce weight.
			</p>
            </div>
            <div class="timeline-footer">
              <ul class="list-inline news-v1-info">
				<li><span style="margin-left: 120px;">By</span> <a href="#">Dr. Ramneek Mahajan</a></li>
				<li>|</li>
				<li><i class="fa fa-clock-o"></i> December 31, 2020</li>
               </ul>
            </div>
          </div>
        </li>
        <!-- end of blog 1 -->
        <!-- Blog 2 -->
        <li class="timeline-inverted">
          <div class="timeline-badge primary"><i class="glyphicon glyphicon-record invert"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="assets/img/blogs/2.jpg" alt=""/>
            </div>
            <div class="timeline-body text-justify">
              <h2 class="font-light"><a href="#">Robot Assisted Kidney Transplant in France</a></h2>
              <p>First robot assisted kidney transplant (RAKT) was performed in France in 2002. Since then, it is gradually gaining foothold in transplant arena. Majority of work is being done in India, Europe and few centres in USA. World wide experience has established its functional outcomes comparable to open transplant. The patient has got multiple benefits :- </p>

   		<p> 1) Lesser pain – early mobility, early recovery </p> <br/>
    	<p>	2) Less chance of wound infection – no adverse effect on graft  function </p> <br/>
    	<p> 3) Less blood loss, Minimal scars, improved cosmetic effects </p><br/>
        <p> Max Super Specialty Hospital, Saket, New Delhi is amongst the few centres across the world routinely doing RAKT.</p>
          </div>
            <div class="timeline-footer">
              <ul class="list-unstyled list-inline blog-info">
                <li><span style="margin-left: 120px;">By</span> <a href="#">Dr. Anant Kumar</a></li>
				<li>|</li>
				<li><i class="fa fa-clock-o"></i> December 31, 2020</li>
              </ul>
            </div>
          </div>
        </li>
        <!-- end of blog 2 -->
        <!-- Blog 3 -->
        <li>
          <div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="assets/img/blogs/3.jpg" alt=""/>
            </div>
            <div class="timeline-body text-justify">
              <h2 class="font-light"><a href="#">Body Weight - What you must know!</a></h2>
              <p> Q: Why is body weight so important to us? </p> 
			  <p> A: Bodyweight is a vital part of our physical and mental health.</p> <br/>

				<p>Q: What is an ideal body weight? </p> 
				<p>A: There is no single defined value for an ideal weight. The ideal weight for a person depends on their height and age. </p> <br/>

				<p>Q: Why is there a weight range? </p> 
				<p>A: Your weight depends upon a number of factors. These include your age, muscle mass fat mass, gender and body shape. </p>
            </div>
            <div class="timeline-footer">
              <ul class="list-unstyled list-inline blog-info">
                    <li><span style="margin-left: 120px;">By</span> <a href="#">Dr. Vandana Soni</a></li>
				<li>|</li>
				<li><i class="fa fa-clock-o"></i> December 31, 2020</li>
              </ul>
            </div>
          </div>
        </li>
        <!-- end of blog 3 -->

        <!-- Blog 4 -->
        <li class="timeline-inverted">
          <div class="timeline-badge primary"><i class="glyphicon glyphicon-record invert"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="assets/img/blogs/4.jpg" alt=""/>
            </div>
            <div class="timeline-body text-justify">
              <h2 class="font-light"><a href="#">IMPORTANCE OF SLEEP IN BRAIN HEALTH</a></h2>
              <p>Those mood swings are for real…. Your brain regulates the hormones and the neurotrasnmitters. These chemicals are basically responsible for the way you feel. Chemical compounds like dopamine, serotonin, oxytocin help us feeling good, happy and upbeat. Sleep plays an important role in their regulation. Lack of sleep can make you irritated, impulsive and angry. The moments when you over react and have an outburst are more likely to happen when you have not slept well.</p>

   			  <p> Lack of sleep makes you slow. Sleep deprivation slows down the brain’s ability to react quickly. Tired drivers and pilots tend to have more accidents and that is a well known fact. Sleep deprivation slows down the brain akin to getting drunk. Just like you should not be driving under the influence of alcohol the same applies to sleep deprivation.</p>
             
          </div>
            <div class="timeline-footer">
              <ul class="list-unstyled list-inline blog-info">
                <li><span style="margin-left: 120px;">By</span> <a href="#">Dr. Manish Baijal</a></li>
				<li>|</li>
				<li><i class="fa fa-clock-o"></i> December 31, 2020</li>
              </ul>
            </div>
          </div>
        </li>
        <!-- end of blog 4 -->

  </ul>
</div>


<!--=== Footer ===-->
@include('0pages.footer')

			<!--=== End Footer ===-->
			</div><!--/wrapper-->


			</body>
			</html>