<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Invoice</strong> Settings</h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?php echo base_url('admin/update-invoice-settings'); ?>" id="edit_invoice_settings_form" enctype="multipart/form-data">
                            <input type="hidden" name="invoice_settings_id" value="<?php echo $invoice_settings['id']; ?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Company Name</label>
                                    <div class="form-group">
                                        <input type="text" name="company_name" class="form-control" placeholder="Enter company name" value="<?php echo $invoice_settings['company_name']; ?>">
                                    </div>
                                    <label>City</label>
                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="Enter city" value="<?php echo $invoice_settings['city']; ?>">
                                    </div>
                                    <label>Country</label>
                                    <div class="form-group">
                                        <input type="text" name="country" class="form-control" placeholder="Enter country" value="<?php echo $invoice_settings['country']; ?>">
                                    </div>
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Enter email" value="<?php echo $invoice_settings['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="Enter address" value="<?php echo $invoice_settings['address']; ?>">
                                    </div>
                                    <label>State</label>
                                    <div class="form-group">
                                        <input type="text" name="state" class="form-control" placeholder="Enter state" value="<?php echo $invoice_settings['state']; ?>">
                                    </div>
                                    <label>Zipcode</label>
                                    <div class="form-group">
                                        <input type="text" name="zipcode" class="form-control" placeholder="Enter zipcode" value="<?php echo $invoice_settings['zipcode']; ?>">
                                    </div>
                                    <label>Phone No.</label>
                                    <div class="form-group">
                                        <input type="text" name="phone_no" class="form-control" placeholder="Enter phone no" value="<?php echo $invoice_settings['phone_no']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Terms & Condition</label>
                                    <div class="form-group">
                                        <textarea name="terms_condition" class="form-control" style="height:250px;" placeholder="Enter terms & condition"><?php echo $invoice_settings['terms_condition']; ?></textarea>
                                        <label id="terms_condition_error" class="error" for="terms_condition" style="display: none;"></label>
                                    </div>
                                </div>
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
<script>
    CKEDITOR.replace('terms_condition');
</script>