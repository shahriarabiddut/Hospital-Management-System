<div class="footer-v1">
    <div class="footer">
    <div class="container">
    <div class="row">
    <!-- About -->
    <div class="col-md-4" style="margin-bottom: 40px;">
    <a href="index.html">
        @isset($SiteOption)
        <img src="{{ asset($SiteOption[1]->value) }}" alt="Logo" srcset="" id="logo-footer" class="footer-logo" width="100%">
        @endisset
        </a>
    <p>At @isset($SiteOption)
        {{ $SiteOption[0]->value }}
    @endisset, we are convinced that 'quality' and 'lowest cost' are not mutually exclusive when it comes to healthcare delivery.</p>
    <p>Our mission is to deliver high quality, affordable healthcare services to the broader population in India.</p>
    </div><!--/col-md-3-->
    <!-- End About -->

    <!-- Latest -->
    <!-- <div class="col-md-3" style="margin-bottom: 40px;">
    <div class="posts">
    <div class="headline"><h2>Latest Posts</h2></div>
    <ul class="list-unstyled latest-list">
    <li>
    <a href="blog.html">Incredible content</a>
    <small>December 16, 2020</small>
    </li>
    <li>
    <a href="gallery.html">Latest Images</a>
    <small>December 16, 2020</small>
    </li>
    <li>
    <a href="terms.html">Terms and Conditions</a>
    <small>December 16, 2020</small>
    </li>
    </ul>
    </div>
    </div>/col-md-3 -->
    <!-- End Latest -->

    <!-- Link List -->
    <div class="col-md-4" style="margin-bottom: 40px;">
    <div class="headline"><h2>Useful Links</h2></div>
    <ul class="list-unstyled link-list">
    <li><a href="about.html">About us</a><i class="fa fa-angle-right"></i></li>
    <li><a href="Contact.html">Contact us</a><i class="fa fa-angle-right"></i></li>
    <li><a href="appointment.html">Book Appointment</a><i class="fa fa-angle-right"></i></li>
    </ul>
    </div><!--/col-md-3-->
    <!-- End Link List -->

    <!-- Address -->
    <div class="col-md-4 map-img" style="margin-bottom: 40px;">
    <div class="headline"><h2>Contact Us</h2></div>
    <address class="md-margin-bottom-40">
        @isset($SiteOption)
        {{ $SiteOption[0]->value }}
    @endisset <br />
    @isset($SiteOption)
    {{ $SiteOption[5]->value }}
@endisset <br />
    Phone: @isset($SiteOption)
    {{ $SiteOption[4]->value }}
@endisset <br />
    Email: @isset($SiteOption)
    {{ $SiteOption[3]->value }}
@endisset
    </address>
    </div><!--/col-md-3-->
    <!-- End Address -->
    </div>
    </div>
    </div><!--/footer-->

    <div class="copyright">
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <p>
    2023 &copy; All Rights Reserved.
    <a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms of Service</a>
    </p>
    </div>

    <!-- Social Links -->
    <div class="col-md-6">
    <ul class="footer-socials list-inline">
    <li>
    <a href="http://www.facebook.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
    <i class="fa fa-facebook"></i>
    </a>
    </li>
    <li>
    <a href="http://www.skype.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
    <i class="fa fa-skype"></i>
    </a>
    </li>
    <li>
    <a href="http://www.googleplus.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
    <i class="fa fa-google-plus"></i>
    </a>
    </li>
    <li>
    <a href="http://www.linkedin.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
    <i class="fa fa-linkedin"></i>
    </a>
    </li>
    <li>
    <a href="http://www.Pinterest.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
    <i class="fa fa-pinterest"></i>
    </a>
    </li>
    <li>
    <a href="http://www.twitter.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
    <i class="fa fa-twitter"></i>
    </a>
    </li>
    </ul>
    </div>
    <!-- End Social Links -->
    </div>
    </div>
    </div>
    </div>
