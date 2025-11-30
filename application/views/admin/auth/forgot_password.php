<?php $this->load->view("admin/layout/header.php"); ?>
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-plain">
                        <div class="header">                            
                            <h5>Forgot Password?</h5>
                            <span>Enter your e-mail address below to reset your password.</span>
                        </div>
                        <form class="form" method="post" action="<?php echo base_url('admin/forgot-password'); ?>" id="forgot_password_form">
                            <div class="mb-2">
                                <input type="email" name="email" class="form-control py-2" placeholder="Enter email address">
                            </div>
                            <div class="footer">
                                <input type="submit" name="submit" class="btn btn-primary btn-round btn-block" value="SUBMIT" />
                            </div>
                        </form>
                        <a href="<?php echo base_url('admin'); ?>" class="link">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/layout/footer.php"); ?>