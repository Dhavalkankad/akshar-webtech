<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Slider</strong> List</h2>
                        <a class="btn btn-raised btn-primary btn-round waves-effect" data-toggle="ajax-modal" href="<?php echo base_url('admin/add-slider'); ?>">Add Slider</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover slider_table dataTable">
                                <thead>
                                    <tr>
                                        <!-- <th class="col-md-1 text-center">Title</th>
                                        <th class="col-md-2 text-center">Description</th> -->
                                        <th class="col-md-2 text-center">Image</th>
                                        <th class="col-md-1 text-center">Ordering</th>
                                        <th class="col-md-1 text-center">Status</th>
                                        <th class="col-md-1 text-center">Date</th>
                                        <th class="col-md-1 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($slider_details)) { ?>
                                        <?php foreach ($slider_details as $key => $row) {
                                            $status_html = "";
                                            if ($row['status'] == 1) {
                                                $status_html = '<span class="badge badge-success">Active</span>';
                                            } elseif ($row['status'] == 0) {
                                                $status_html = '<span class="badge badge-danger">Deactive</span>';
                                            }
                                        ?>
                                            <tr>
                                                <!-- <td><?php echo $row['title']; ?></td>
                                                <td style="white-space: break-spaces;"><?php echo $row['description']; ?></td> -->
                                                <td><img src="<?php echo base_url($row['image']); ?>" class="img-thumbnail" /></td>
                                                <td class="text-center"><?php echo $row['ordering']; ?></td>
                                                <td><?php echo $status_html; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/edit-slider/') . $row['id']; ?>" data-toggle="ajax-modal"><i class="zmdi zmdi-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/delete-slider/') . $row['id']; ?>" data-toggle="delete-modal"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!-- <th class="col-md-1 text-center">Title</th>
                                        <th class="col-md-2 text-center">Description</th> -->
                                        <th class="col-md-2 text-center">Image</th>
                                        <th class="col-md-1 text-center">Ordering</th>
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