<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Comapny</strong> Details</h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?php echo base_url('admin/update-company-details'); ?>" id="edit_company_form" enctype="multipart/form-data">
                            <input type="hidden" name="company_id" value="<?php echo $company['id']; ?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email address" value="<?php echo $company['email']; ?>">
                                    </div>
                                    <label>Contact No.</label>
                                    <div class="form-group">
                                        <input type="text" name="contact_no" class="form-control" placeholder="Enter contact no." value="<?php echo $company['contact_no']; ?>">
                                    </div>
                                    <label>Facebook link</label>
                                    <div class="form-group">
                                        <input type="text" name="facebook" class="form-control" placeholder="Enter facebook link" value="<?php echo $company['facebook']; ?>">
                                    </div>
                                    <label>Instagram link</label>
                                    <div class="form-group">
                                        <input type="text" name="instagram" class="form-control" placeholder="Enter instagram link" value="<?php echo $company['instagram']; ?>">
                                    </div>
                                    <label>Google link</label>
                                    <div class="form-group">
                                        <input type="text" name="google" class="form-control" placeholder="Enter google link" value="<?php echo $company['google']; ?>">
                                    </div>
                                    <label>Meta Keywords (e.g. Swing well cradle, Cradle, Swing Well)</label>
                                    <div class="form-group">
                                        <textarea name="meta_keywords" class="form-control" style="height:150px;" placeholder="Enter meta keywords"><?php echo $company['meta_keywords']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Whatsapp No. (e.g. 919876543210)</label>
                                    <div class="form-group">
                                        <input type="text" name="whatsapp_no" class="form-control" placeholder="Enter whatsapp no." value="<?php echo $company['whatsapp_no']; ?>">
                                    </div>
                                    <label>Address</label>
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="Enter address" value="<?php echo $company['address']; ?>">
                                    </div>
                                    <!-- <label>About us</label>
                                    <div class="form-group">
                                        <textarea name="aboutus" class="form-control" style="height:150px;" placeholder="Enter about company"><?php echo $company['aboutus']; ?></textarea>
                                    </div> -->
                                    <label>Location map iFrame</label>
                                    <div class="form-group">
                                        <textarea name="company_map" class="form-control" style="height:150px;" placeholder="Enter location map iFrame"><?php echo $company['company_map']; ?></textarea>
                                    </div>
                                    <label>Meta Description</label>
                                    <div class="form-group">
                                        <textarea name="meta_description" class="form-control" style="height:150px;" placeholder="Enter meta description"><?php echo $company['meta_description']; ?></textarea>
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