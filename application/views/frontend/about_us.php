<?php $this->load->view("frontend/layout/header.php"); ?>
<main id="main-content">
    <div class="inner-header" data-aos="fade-in">
        <div class="container">
            <h1 data-aos="fade-up" data-aos-delay="100">About Us</h1>
            <div class="breadcrums" data-aos="fade-up" data-aos-delay="200">
                <ul>
                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li><a href="javascript:void(0);" class="active">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="abt-2-section">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3 abt-img-2" data-aos="fade-up">
                    <img src="<?= base_url(isset($aboutus_details['aboutus']['image']) ? $aboutus_details['aboutus']['image'] : ''); ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="heading" data-aos="fade-in" data-aos-delay="">
                        <div class="sub-title">About Company</div>
                        <h2><?php echo isset($aboutus_details['aboutus']['title']) ? $aboutus_details['aboutus']['title'] : ''; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                    <?php echo isset($aboutus_details['aboutus']['description']) ? $aboutus_details['aboutus']['description'] : ''; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section vis-mis-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 mb-3">
                    <div class="vis-mis-inr">
                        <h3>Our Vision</h3>
                        <?php echo isset($aboutus_details['our_vision']['description']) ? $aboutus_details['our_vision']['description'] : ''; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mb-3">
                    <div class="vis-mis-inr">
                        <h3>Our Mission</h3>
                        <?php echo isset($aboutus_details['our_mission']['description']) ? $aboutus_details['our_mission']['description'] : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section abt-2-section">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="heading" data-aos="fade-in" data-aos-delay="">
                        <div class="sub-title">Product & Safety</div>
                        <h2>Our Product</h2>
                    </div>
                    <div class="clearfix"></div>
                    <?php echo isset($aboutus_details['our_product']['description']) ? $aboutus_details['our_product']['description'] : ''; ?>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3 abt-img-2" data-aos="fade-up">
                    <img src="<?= base_url(isset($aboutus_details['our_product']['image']) ? $aboutus_details['our_product']['image'] : ''); ?>">
                </div>
            </div>
        </div>
    </section>
    <section class="content-section design-section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="heading">
                        <div class="sub-title">Process</div>
                        <h2>Our <br>Design Process</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <?php echo isset($aboutus_details['our_design_process']['description']) ? $aboutus_details['our_design_process']['description'] : ''; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonialsec padd70">
        <div class="container">
            <h6 class="sub-title text-center">Testimonials</h6>
            <h2 class="mntlesecwrp text-center">feedback from customers</h2>
            <div id="customers-testimonials" class="three-slide-center owl-carousel">
                <?php $testimonials_list = testimonials_list(); ?>
                <?php if (isset($testimonials_list) && !empty($testimonials_list)) { ?>
                    <?php foreach ($testimonials_list as $trow) { ?>
                        <div class="item">
                            <div class="shadow-effect">
                                <div class="imgcicle"><img class="img-circle" src="<?= base_url('assets/images/quoteimg.png'); ?>" alt=""></div>
                                <h4><?= ($trow->name) ? $trow->name : ''; ?></h4>
                                <span><?= ($trow->city) ? $trow->city : ''; ?></span>
                                <div class="rating">
                                    <?php
                                    $rating = (int)$trow->rating;
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<span class="fa fa-star"></span>'; // filled star
                                        } else {
                                            echo '<span class="fa fa-star-o"></span>'; // empty star
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="testictn">
                                <p><?= ($trow->description) ? $trow->description : ''; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
</main>
<?php $this->load->view("frontend/layout/footer.php"); ?>