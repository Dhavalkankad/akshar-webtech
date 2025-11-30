<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>About Us Page</strong> Details</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="body">
                                <h6 class="text-center text-success">SECTION: ABOUT COMPANY</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-aboutpage-details'); ?>" id="edit_aboutpage_form" enctype="multipart/form-data">
                                    <?=
                                    $aboutpage_image = "";
                                    $aboutpage_old_image = "";
                                    if (!empty($aboutpage)) {
                                        $aboutpage_image = $aboutpage['image'];
                                        $aboutpage_old_image = $aboutpage['image'];
                                    }
                                    ?>
                                    <input type="hidden" name="type" value="aboutus" />
                                    <label>Title</label>
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $aboutpage['title']; ?>" placeholder="Enter title" />
                                    </div>
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="aboutus_description" id="aboutus_description" class="form-control" placeholder="Enter description" style="height:150px;"><?php echo $aboutpage['description']; ?></textarea>
                                        <label id="aboutus_description_error" class="error" for="aboutus_description" style="display: none;"></label>
                                    </div>
                                    <label>Image (657 X 780)</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" id="image" />
                                        <input type="hidden" class="form-control" name="old_image" value="<?php echo $aboutpage_old_image; ?>" />
                                        <?php if (isset($aboutpage_image) && !empty($aboutpage_image)) { ?>
                                            <img src="<?php echo base_url($aboutpage_image); ?>" class="img-thumbnail" style="height: 150px;width: 150px; margin:5px;" />
                                        <?php } ?>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="body">
                                <h6 class="text-center text-danger">SECTION: OUR VISION</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-aboutpage-details'); ?>" id="edit_aboutpage_our_vision_form" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="our_vision" />
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="our_vision_description" class="form-control" id="our_vision_description" placeholder="Enter description" style="height:150px;" required><?php echo $our_vision_aboutpage['description']; ?></textarea>
                                        <label id="our_vision_description_error" class="error" for="our_vision_description" style="display: none;"></label>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="body">
                                <h6 class="text-center text-warning">SECTION: OUR MISSION</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-aboutpage-details'); ?>" id="edit_aboutpage_our_mission_form" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="our_mission" />
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="our_mission_description" id="our_mission_description" class="form-control" placeholder="Enter description" style="height:150px;"><?php echo $our_mission_aboutpage['description']; ?></textarea>
                                        <label id="our_mission_description_error" class="error" for="our_mission_description" style="display: none;"></label>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="body">
                                <h6 class="text-center text-secondary">SECTION: OUR PRODUCT</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-aboutpage-details'); ?>" id="edit_aboutpage_our_product_form" enctype="multipart/form-data">
                                    <?=
                                    $our_product_image = "";
                                    $our_product_old_image = "";
                                    if (!empty($our_product_aboutpage)) {
                                        $our_product_image = $our_product_aboutpage['image'];
                                        $our_product_old_image = $our_product_aboutpage['image'];
                                    }
                                    ?>
                                    <input type="hidden" name="type" value="our_product" />
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="our_product_description" id="our_product_description" class="form-control" placeholder="Enter description" style="height:150px;"><?php echo $our_product_aboutpage['description']; ?></textarea>
                                        <label id="our_product_description_error" class="error" for="our_product_description" style="display: none;"></label>
                                    </div>
                                    <label>Image (657 X 780)</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" id="image" />
                                        <input type="hidden" class="form-control" name="old_image" value="<?php echo $our_product_old_image; ?>" />
                                        <?php if (isset($our_product_image) && !empty($our_product_image)) { ?>
                                            <img src="<?php echo base_url($our_product_image); ?>" class="img-thumbnail" style="height: 150px;width: 150px; margin:5px;" />
                                        <?php } ?>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="body">
                                <h6 class="text-center text-success">SECTION: OUR DESIGN PROCESS</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-aboutpage-details'); ?>" id="edit_aboutpage_our_design_process_form" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="our_design_process" />
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="our_design_process_description" id="our_design_process_description" class="form-control" placeholder="Enter description" style="height:150px;"><?php echo $our_design_process_aboutpage['description']; ?></textarea>
                                        <label id="our_design_process_description_error" class="error" for="our_design_process_description" style="display: none;"></label>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("admin/layout/footer.php"); ?>
<script>
    CKEDITOR.replace('aboutus_description');
    CKEDITOR.replace('our_vision_description');
    CKEDITOR.replace('our_mission_description');
    CKEDITOR.replace('our_product_description');
    CKEDITOR.replace('our_design_process_description');
</script>