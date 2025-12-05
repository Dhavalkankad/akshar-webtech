<footer class="main-footer">
    <div class="pattern-layer" style="background-image: url(<?= base_url('assets/images/background/pattern-3.png'); ?>)"></div>
    <div class="pattern-layer-two" style="background-image: url(<?= base_url('assets/images/background/pattern-4.png'); ?>)"></div>
    <div class="pattern-layer-three" style="background-image: url(<?= base_url('assets/images/background/pattern-5.png'); ?>)"></div>
    <div class="auto-container">
        <div class="widgets-section">
            <div class="row clearfix">
                <div class="big-column col-lg-12 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/logo.png'); ?>" alt="" /></a>
                                </div>
                                <div class="text">Akshar Webtech delivers modern and reliable web design, development, and digital solutions for growing businesses.</div>
                                <ul class="social-box">
                                    <li class="facebook"><a href="<?= (settings()->linkedin) ? settings()->linkedin : ''; ?>" target="_blank" class="fa fa-linkedin"></a></li>
                                    <li class="instagram"><a href="<?= (settings()->instagram) ? settings()->instagram : ''; ?>" target="_blank" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>Menu</h4>
                                <ul class="list-link">
                                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                                    <li><a href="<?= base_url('about-us'); ?>">About Us</a></li>
                                    <li><a href="<?= base_url('services'); ?>">Services</a></li>
                                    <li><a href="<?= base_url('contact-us'); ?>">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>Contact info</h4>
                                <ul class="list-style-two">
                                    <li><span class="icon flaticon-wall-clock"></span>Mon - Sat <br> 10:00 AM to 7:00 PM</li>
                                    <li><span class="icon flaticon-phone-call"></span><a href="tel:<?= (settings()->contact_no) ? settings()->contact_no : ''; ?>"><?= (settings()->contact_no) ? settings()->contact_no : ''; ?></a></li>
                                    <li><span class="icon flaticon-email"></span><a href="mailto:<?= (settings()->email) ? settings()->email : ''; ?>"><?= (settings()->email) ? settings()->email : ''; ?></a></li>
                                    <li><span class="icon flaticon-maps-and-flags"></span><?= (settings()->address) ? settings()->address : ''; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">Copyright © <?= date('Y'); ?> Akshar Webtech. All Rights Reserved.</div>
        </div>
    </div>
</footer>
</div>
<a href="https://wa.me/<?= (settings()->whatsapp_no) ? settings()->whatsapp_no : ''; ?>" class="whatsapp-float" target="_blank">
    <img src="<?= base_url('assets/images/WhatsApp.svg'); ?>" alt="WhatsApp" />
</a>
<div class="back-to-top scroll-to-target" data-target="html">
    <i class="arrow-up"></i>
</div>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1JCGGCPC3N"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-1JCGGCPC3N');
</script>
<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.fancybox.js'); ?>"></script>
<script src="<?= base_url('assets/js/appear.js'); ?>"></script>
<script src="<?= base_url('assets/js/parallax.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/tilt.jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.paroller.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/owl.js'); ?>"></script>
<script src="<?= base_url('assets/js/wow.js'); ?>"></script>
<script src="<?= base_url('assets/js/nav-tool.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
<script src="<?= base_url('assets/js/script.js'); ?>"></script>
<script src="<?= base_url('assets/js/color-settings.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/ajax-contact.js'); ?>"></script>
</body>

</html>