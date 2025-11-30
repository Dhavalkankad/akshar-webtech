<?php $this->load->view("admin/layout/header.php"); ?>
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Log in</h5>
                        </div>
                        <form class="form" method="post" action="<?php echo base_url('admin/login'); ?>" id="login_form">
                            <div class="mb-2">
                                <input type="email" name="email" class="form-control py-2" placeholder="Enter email address">
                            </div>
                            <div class="mb-2">
                                <input type="password" name="password" class="form-control py-2" placeholder="Enter password">
                            </div>
                            <div class="footer">
                                <input type="submit" name="submit" class="btn btn-primary btn-round btn-block" value="LOGIN" />
                            </div>
                        </form>
                        <a href="<?php echo base_url('admin/forgot-password'); ?>" class="link">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/layout/footer.php"); ?>