<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Cancellation & Returns Policy Page</strong> Details</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="body">
                                <form method="POST" action="<?php echo base_url('admin/update-cancellation-returns-policy-page-details'); ?>" enctype="multipart/form-data">
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="description" id="description" class="form-control" placeholder="Enter description" style="height:150px;" required><?php echo $cancellation_returns_policy_page['description']; ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("admin/layout/footer.php"); ?>
<script>
    CKEDITOR.replace('description');
</script>