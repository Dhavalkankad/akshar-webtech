<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url('admin'); ?>" title="GeeNex Admin Panel"><img src="<?php echo base_url('assets/admin/images/favicon.png'); ?>"></a>
        </li>
        <li><a href="javascript:void(0);" class="menu-sm" title="Hide/Show"><i class="zmdi zmdi-swap"></i></a></li>
        <li><a href="javascript:void(0);" class="fullscreen" data-provide="fullscreen" title="Fullscreen"><i class="zmdi zmdi-fullscreen"></i></a></li>
        <li class="">
            <a href="<?php echo base_url('admin/settings'); ?>" class="js-right-sidebar" title="Settings"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
            <a href="<?php echo base_url('admin/logout'); ?>" class="mega-menu" title="Logout"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>
</aside>
<aside class="right_menu">
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div class="image">
                            <a><img src="<?php echo base_url('assets/admin/images/user-avatar.png'); ?>" alt="User"></a>
                        </div>
                        <div class="detail">
                            <h6><?php echo ($this->session->userdata('user_detail')) ? $this->session->userdata('user_detail')['name'] : ""; ?></h6>
                            <p class="m-b-0"><?php echo ($this->session->userdata('user_detail')) ? $this->session->userdata('user_detail')['email'] : ""; ?></p>
                            <a href="<?php echo base_url('admin/settings'); ?>" title="Settings" class="waves-effect waves-block"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
                            <a href="<?php echo base_url('admin/logout'); ?>" title="Logout" class="waves-effect waves-block"><i class="zmdi zmdi-power"></i></a>
                        </div>
                    </div>
                </li>

                <li class="open <?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'contactus') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/contactus'); ?>"><i class="zmdi zmdi-email"></i> <span>Contact Us</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'category-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/category-list'); ?>"><i class="zmdi zmdi-format-list-bulleted"></i><span>Category</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'products-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/products-list'); ?>"><i class="zmdi zmdi-shopping-cart"></i><span>Products</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'orders-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/orders-list'); ?>"><i class="zmdi zmdi-shopping-basket"></i><span>Orders</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'payments-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/payments-list'); ?>"><i class="zmdi" style="font-weight: 700;">&#8377;</i><span>Payments</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'users-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/users-list'); ?>"><i class="zmdi zmdi-accounts"></i><span>Users</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'testimonials-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/testimonials-list'); ?>"><i class="zmdi zmdi-quote"></i><span>Testimonials</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'slider-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/slider-list'); ?>"><i class="zmdi zmdi-image"></i><span>Slider</span></a></li>

                <li class="open <?php echo ($this->uri->segment(2) == 'coupon-list') ? 'active' : ''; ?>"> <a href="<?php echo base_url('admin/coupon-list'); ?>"><i class="zmdi zmdi-ticket-star"></i><span>Coupon</span></a></li>

                <li class="<?php echo ($this->uri->segment(2) == 'homepage-details' || $this->uri->segment(2) == 'service-support-details' || $this->uri->segment(2) == 'privacy-policy-page-details' || $this->uri->segment(2) == 'terms-conditions-page-details' || $this->uri->segment(2) == 'cancellation-returns-policy-page-details' || $this->uri->segment(2) == 'refund-policy-page-details' || $this->uri->segment(2) == 'shipping-policy-page-details' || $this->uri->segment(2) == 'aboutpage-details') ? 'open active' : ''; ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span>Pages details</span></a>
                    <ul class="ml-menu">
                        <!-- <li><a href="<?php echo base_url('admin/homepage-details'); ?>">Home Page</a></li> -->
                        <li><a href="<?php echo base_url('admin/aboutpage-details'); ?>">About Us Page</a></li>
                        <li><a href="<?php echo base_url('admin/privacy-policy-page-details'); ?>">Privacy Policy Page</a></li>
                        <li><a href="<?php echo base_url('admin/terms-conditions-page-details'); ?>">Terms & Conditions Page</a></li>
                        <li><a href="<?php echo base_url('admin/cancellation-returns-policy-page-details'); ?>">Cancellation & Returns Policy Page</a></li>
                        <li><a href="<?php echo base_url('admin/refund-policy-page-details'); ?>">Refund Policy Page</a></li>
                        <li><a href="<?php echo base_url('admin/shipping-policy-page-details'); ?>">Shipping Policy Page</a></li>
                    </ul>
                </li>

                <li class="<?php echo ($this->uri->segment(2) == 'settings' || $this->uri->segment(2) == 'company-details') ? 'open active' : ''; ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo base_url('admin/settings'); ?>">Profile settings</a></li>
                        <li><a href="<?php echo base_url('admin/company-details'); ?>">Company Details</a></li>
                        <li><a href="<?php echo base_url('admin/invoice-settings'); ?>">Invoice Settings</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</aside>