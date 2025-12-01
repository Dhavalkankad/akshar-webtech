<header class="main-header">
    <div class="header-upper">
        <div class="auto-container clearfix">
            <div class="pull-left logo-box">
                <div class="logo"><a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/logo.png'); ?>" alt="<?= SITE_NAME; ?>" title="<?= SITE_NAME; ?>"></a></div>
            </div>
            <div class="nav-outer clearfix">
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'current' : ''; ?>"><a href="<?= base_url('home'); ?>" alt="<?= SITE_NAME; ?>" title="<?= SITE_NAME; ?>">Home</a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'about-us') ? 'current' : ''; ?>"><a href="<?= base_url('about-us'); ?>">About Us</a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'services') ? 'current' : ''; ?>"><a href="<?= base_url('services'); ?>">Services</a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'blogs') ? 'current' : ''; ?>"><a href="<?= base_url('blogs'); ?>">Blogs</a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'contact-us') ? 'current' : ''; ?>"><a href="<?= base_url('contact-us'); ?>">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="outer-box clearfix">
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <div class="logo pull-left">
                <a href="<?= base_url('home'); ?>" title=""><img src="<?= base_url('assets/images/logo-small.png'); ?>" alt="<?= SITE_NAME; ?>" title="<?= SITE_NAME; ?>"></a>
            </div>
            <div class="pull-right">
                <nav class="main-menu">
                </nav>
                <div class="outer-box clearfix">
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/images/logo-3.png'); ?>" alt="<?= SITE_NAME; ?>" title="<?= SITE_NAME; ?>"></a></div>
            <div class="menu-outer"></div>
        </nav>
    </div>
</header>