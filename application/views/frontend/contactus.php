<?php $this->load->view("frontend/layout/header.php"); ?>
<main id="main-content">
    <div class="inner-header" data-aos="fade-in">
        <div class="container">
            <h1 data-aos="fade-up" data-aos-delay="100">Contact Us</h1>
            <div class="breadcrums" data-aos="fade-up" data-aos-delay="200">
                <ul>
                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li><a href="javascript:void(0);" class="active">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mb-3 cntct-details">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12 mb-3">
                            <div class="cntct-row reach-us">
                                <h4>Reach Us</h4>
                                <p><?php echo (settings()->address) ? settings()->address : ""; ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-12 mb-3">
                            <div class="cntct-row">
                                <h4>Contact Number</h4>
                                <p><?php echo (settings()->contact_no) ? settings()->contact_no : ""; ?><br></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-12 mb-3">
                            <div class="cntct-row mb-0">
                                <h4>Email Address</h4>
                                <p><a href="mailto:<?php echo (settings()->email) ? settings()->email : ""; ?>"><?php echo (settings()->email) ? settings()->email : ""; ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section mt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 cntct-form">
                    <div class="heading " data-aos="fade-in" data-aos-delay="">
                        <div class="sub-title">Ask Your Query</div>
                        <h2>Get in <span>Touch</span></h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12">
                            <div id="alert_msg"></div>
                            <form action="<?php echo base_url('submit-contact'); ?>" method="POST" id="contact-form">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <input type="text" class="form-control" name="name" id="name" required placeholder="Full Name" />
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-12 mb-4">
                                        <input type="email" class="form-control" name="email" id="email" required placeholder="Email Address" />
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-12 mb-4">
                                        <input type="text" class="form-control" name="number" id="number" required pattern="^\d{10}$" title="Phone number must be 10 digits long" placeholder="Contact Number" />
                                    </div>
                                    <div class="col-12 mb-4">
                                        <textarea class="form-control" name="message" id="message" required placeholder="Your Query or Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit" id="submitButton">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section">
        <div class="container">
            <div class="map">
                <?php echo (settings()->company_map) ? settings()->company_map : ""; ?>
            </div>
        </div>
    </section>
</main>
<?php $this->load->view("frontend/layout/footer.php"); ?>