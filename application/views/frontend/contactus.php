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
                            Mon - Sat <br> 10:00 AM to 7:00 PM
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box">
                        <div class="box-inner">
                            <div class="icon flaticon-pin"></div>
                            <?= (settings()->address) ? settings()->address : ''; ?>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box">
                        <div class="box-inner">
                            <div class="icon flaticon-phone-call"></div>
                            <a href="tel:<?= (settings()->contact_no) ? settings()->contact_no : ''; ?>"><?= (settings()->contact_no) ? settings()->contact_no : ''; ?></a>
                            <a href="mailto:<?= (settings()->email) ? settings()->email : ''; ?>"><?= (settings()->email) ? settings()->email : ''; ?></a>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <ul class="social-box">
                        <span>Our Socials Links <i></i></span>
                        <li class="facebook"><a href="<?= (settings()->linkedin) ? settings()->linkedin : ''; ?>" target="_blank" class="fa fa-linkedin"></a></li>
                        <li class="instagram"><a href="<?= (settings()->instagram) ? settings()->instagram : ''; ?>" target="_blank" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="map-boxed">
            <div class="map-outer">
                <?= (settings()->company_map) ? settings()->company_map : ''; ?>
            </div>
        </div>
    </div>
</section>
<section class="contact-form-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">Don’t Hasitate To Contact With us</div>
            <h2>Now Very Easy</h2>
        </div>
        <div class="inner-container">
            <div class="contact-form">
                <div id="alert_msg"></div>
                <form action="<?php echo base_url('submit-contact'); ?>" method="POST" id="contact-form">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-user-2"></span>
                            <input type="text" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-phone-call"></span>
                            <input type="text" name="number" id="number" required pattern="^\d{10}$" title="Phone number must be 10 digits long" placeholder="Enter Phone" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-big-envelope"></span>
                            <input type="email" name="email" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <span class="icon flaticon-notepad"></span>
                            <input type="text" name="subject" id="subject" placeholder="Enter Subject" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <span class="icon flaticon-message"></span>
                            <textarea name="message" id="message" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
                            <button class="theme-btn btn-style-three" type="submit" name="submit"><span class="txt">Send</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("frontend/layout/footer.php"); ?>