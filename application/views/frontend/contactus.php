<?php $this->load->view("frontend/layout/header.php"); ?>

<section class="page-title" style="background-image: url(<?= base_url('assets/images/background/pattern-16.png'); ?>)">
    <div class="pattern-layer-one" style="background-image: url(<?= base_url('assets/images/main-slider/pattern-1.png'); ?>)"></div>
    <div class="pattern-layer-two" style="background-image: url(<?= base_url('assets/images/background/pattern-17.png'); ?>)"></div>
    <div class="pattern-layer-three" style="background-image: url(<?= base_url('assets/images/background/pattern-18.png'); ?>)"></div>
    <div class="pattern-layer-four" style="background-image: url(<?= base_url('assets/images/icons/cross-icon.png'); ?>)"></div>
    <div class="auto-container">
        <h2>Contact Us</h2>
        <ul class="page-breadcrumb">
            <li><a href="<?= base_url('home'); ?>">home</a></li>
            <li>Contact Us</li>
        </ul>
    </div>
</section>
<section class="contact-info-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">Follow Our Info</div>
            <h2>Contact information</h2>
            <div class="text">Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. <br> We will be happy to answer your questions.</div>
        </div>
        <div class="inner-container">
            <div class="row clearfix">
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box">
                        <div class="box-inner">
                            <div class="icon flaticon-clock"></div>
                            Mon - Sat 10:00 AM to 7:00 PM
                            <!-- <br> Sunday Closed -->
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box">
                        <div class="box-inner">
                            <div class="icon flaticon-pin"></div>
                            13005 Greenville Avenue <br> California, TX 70240
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box">
                        <div class="box-inner">
                            <div class="icon flaticon-phone-call"></div>
                            <a href="tel:+91-000999-0099">+91 000999 0099</a>
                            <a href="mailto:info@aksharwebtech.com">info@aksharwebtech.com</a>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <ul class="social-box">
                        <span>Our Socials Links <i></i></span>
                        <li class="facebook"><a class="fa fa-facebook-f" href="#"></a></li>
                        <li class="twitter"><a class="fa fa-twitter" href="#"></a></li>
                        <li class="linkedin"><a href="#" class="fa fa-google-plus"></a></li>
                        <li class="pinterest"><a href="#" class="fa fa-pinterest-p"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="map-boxed">
            <div class="map-outer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118147.80351149273!2d70.82129635!3d22.27348695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1764588336216!5m2!1sen!2sin" width="100%" height="560px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>
<section class="contact-form-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">Don’t Hasitate To Contact With us</div>
            <h2>Now Very Easy</h2>
            <div class="text">Our approach to SEO is uniquely built around what we know works…and what we know <br> doesn’t work. With over 200 verified factors in play.</div>
        </div>
        <div class="inner-container">
            <div class="contact-form">
                <form method="post" action="#" id="contact-form">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-user-2"></span>
                            <input type="text" name="username" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-phone-call"></span>
                            <input type="text" name="phone" placeholder="Your Phone" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-big-envelope"></span>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-notepad"></span>
                            <input type="text" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <span class="icon flaticon-message"></span>
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
                            <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Submit Now</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("frontend/layout/footer.php"); ?>