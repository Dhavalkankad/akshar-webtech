<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Edit</strong> Profile</h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?php echo base_url('admin/settings'); ?>" id="edit_profile_form">
                            <input type="hidden" name="user_id" value="<?php echo $user_details['id']; ?>" />
                            <label>Name</label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="<?php echo $user_details['name']; ?>">
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" id="email_address" class="form-control" placeholder="Enter your email" value="<?php echo $user_details['email']; ?>">
                            </div>
                            <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Change</strong> Password</h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?php echo base_url('admin/change-profile-password'); ?>" id="change_profile_password_form">
                            <input type="hidden" name="user_id" value="<?php echo $user_details['id']; ?>" />
                            <label>New Password</label>
                            <div class="form-group">
                                <input type="password" name="password" id="new_profile_password" class="form-control" placeholder="Enter your new password">
                            </div>
                            <label>Confirm Password</label>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter your confirm password">
                            </div>
                            <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("admin/layout/footer.php"); ?>