<?php $this->load->view("admin/layout/header.php"); ?>
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Reset Password</h5>
                            <span>Enter your new password.</span>
                        </div>
                        <form class="form" method="post" action="<?php echo base_url('admin/reset-password'); ?>" id="reset_password_form">
                            <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>" />
                            <div class="mb-2">
                                <input type="password" name="password" id="new_password" class="form-control py-2" placeholder="Enter new password">
                            </div>
                            <div class="mb-2">
                                <input type="password" name="confirm_password" class="form-control py-2" placeholder="Enter confirm password">
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