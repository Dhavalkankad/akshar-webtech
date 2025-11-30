<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="card mb-0">
            <div class="header custom_header">
                <h2><strong>Dashboard</strong> Statistics</h2>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-email zmdi-hc-3x col-yellow"></i></p>
                        <span>Total Contact Requests</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?php echo $total_contactus; ?>" data-speed="2000" data-fresh-interval="700"><?php echo $total_contactus; ?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-format-list-bulleted zmdi-hc-3x col-indigo"></i></p>
                        <span>Total Category</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?php echo $total_cateogry; ?>" data-speed="2000" data-fresh-interval="700"><?php echo $total_cateogry; ?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-shopping-cart zmdi-hc-3x col-deep-orange"></i></p>
                        <span>Total Products</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?php echo $total_products; ?>" data-speed="2000" data-fresh-interval="700"><?php echo $total_products; ?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-shopping-basket zmdi-hc-3x col-blue"></i></p>
                        <span>Total Orders</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?php echo $total_orders; ?>" data-speed="2000" data-fresh-interval="700"><?php echo $total_orders; ?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-accounts zmdi-hc-3x col-pink"></i></p>
                        <span>Total Users</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?php echo $total_users; ?>" data-speed="2000" data-fresh-interval="700"><?php echo $total_users; ?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-quote zmdi-hc-3x col-deep-purple"></i></p>
                        <span>Total Testimonials</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?php echo $total_testimonials; ?>" data-speed="2000" data-fresh-interval="700"><?php echo $total_testimonials; ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("admin/layout/footer.php"); ?>