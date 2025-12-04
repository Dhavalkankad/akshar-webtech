<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Testimonials</strong> List</h2>
                        <a class="btn btn-raised btn-primary btn-round waves-effect" data-toggle="ajax-modal" href="<?php echo base_url('admin/add-testimonials'); ?>">Add Testimonials</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover testimonials_table dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">Name</th>
                                        <th class="col-md-2 text-center">Position</th>
                                        <th class="col-md-2 text-center">Image</th>
                                        <th class="col-md-1 text-center">Rating</th>
                                        <th class="col-md-2 text-center">Description</th>
                                        <th class="col-md-1 text-center">Status</th>
                                        <th class="col-md-1 text-center">Date</th>
                                        <th class="col-md-1 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($testimonials_details)) { ?>
                                        <?php foreach ($testimonials_details as $key => $row) {
                                            $status_html = "";
                                            if ($row['status'] == 1) {
                                                $status_html = '<span class="badge badge-success">Active</span>';
                                            } elseif ($row['status'] == 0) {
                                                $status_html = '<span class="badge badge-danger">Deactive</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['name']; ?></td>
                                                <td class="text-center"><?php echo $row['position']; ?></td>
                                                <td><img src="<?php echo get_user_image($row['image']); ?>" class="img-thumbnail" /></td>
                                                <td class="text-center">
                                                    <span style="font-size:30px;">
                                                        <?php
                                                        $rating = (int)$row['rating'];
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $rating) {
                                                                echo '<span style="color: #FFD700;">&#9733;</span>'; // filled star
                                                            } else {
                                                                echo '<span style="color: #ddd;">&#9733;</span>'; // empty star
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </td>
                                                <td style="white-space: break-spaces;"><?php echo $row['description']; ?></td>
                                                <td><?php echo $status_html; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/edit-testimonials/') . $row['id']; ?>" data-toggle="ajax-modal"><i class="zmdi zmdi-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/delete-testimonials/') . $row['id']; ?>" data-toggle="delete-modal"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-md-2 text-center">Name</th>
                                        <th class="col-md-2 text-center">Position</th>
                                        <th class="col-md-2 text-center">Image</th>
                                        <th class="col-md-1 text-center">Rating</th>
                                        <th class="col-md-2 text-center">Description</th>
                                        <th class="col-md-1 text-center">Status</th>
                                        <th class="col-md-1 text-center">Date</th>
                                        <th class="col-md-1 text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("admin/layout/footer.php"); ?>