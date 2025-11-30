<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Home Page</strong> Details</h2>
                    </div>
                    <div class="row">
                        <?=
                        $image = "";
                        $old_image = "";
                        $image2 = "";
                        $old_image2 = "";
                        if (!empty($aboutus_homepage)) {
                            $image = $aboutus_homepage['image'];
                            $old_image = $aboutus_homepage['image'];
                            $image2 = $aboutus_homepage['image_two'];
                            $old_image2 = $aboutus_homepage['image_two'];
                        }
                        ?>
                        <div class="col-md-12">
                            <div class="body">
                                <h6 class="text-center text-info">SECTION: ABOUT US</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-homepage-details'); ?>" id="edit_homepage_aboutus_form" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="aboutus" />
                                    <!-- <label>Title</label>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo $aboutus_homepage['title']; ?>" />
                                    </div> -->
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" placeholder="Enter description" style="height:150px;"><?php echo $aboutus_homepage['description']; ?></textarea>
                                    </div>
                                    <label>Image (483px X 483px)</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" id="image" />
                                        <input type="hidden" class="form-control" name="old_image" value="<?php echo $old_image; ?>" />
                                        <?php if (isset($image) && !empty($image)) { ?>
                                            <img src="<?php echo base_url($image); ?>" class="img-thumbnail" style="height: 150px;width: 150px; margin:5px;" />
                                        <?php } ?>
                                    </div>
                                    <label>Background Image (1000px X 821px)</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image2" id="image2" />
                                        <input type="hidden" class="form-control" name="old_image2" value="<?php echo $old_image2; ?>" />
                                        <?php if (isset($image2) && !empty($image2)) { ?>
                                            <img src="<?php echo base_url($image2); ?>" class="img-thumbnail" style="height: 150px;width: 150px; margin:5px;" />
                                        <?php } ?>
                                    </div>
                                    <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Update" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="body">
                                <h6 class="text-center text-info">SECTION: WHY CHOOSE US</h6>
                                <hr>
                                <form method="post" action="<?php echo base_url('admin/update-homepage-details'); ?>" id="edit_homepage_why_choose_us_form" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="why_choose_us" />
                                    <!-- <label>Title</label>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo $why_choose_us_homepage['title']; ?>" />
                                    </div> -->
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" placeholder="Enter description" style="height:150px;"><?php echo $why_choose_us_homepage['description']; ?></textarea>
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