<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Category</strong></h2>
                        <a class="btn btn-raised btn-primary btn-round waves-effect" data-toggle="ajax-modal" href="<?php echo base_url('admin/add-category'); ?>">Add Category</a>
                    </div>
                    <div class="col-md-12">
                        <p class="text-danger">Warning: Deleting the category will automatically remove all its subcategories permanently.</p>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover category_table dataTable" id="categoryTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-4">Category Name</th>
                                        <th class="col-md-2">Type</th>
                                        <th class="col-md-2">Icon</th>
                                        <th class="col-md-2">Poster Image</th>
                                        <th class="col-md-2">Status</th>
                                        <th class="col-md-2">Date</th>
                                        <th class="col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($category)) { ?>
                                        <?php foreach ($category as $key => $row) {
                                            $status_html = "";
                                            if ($row['status'] == 1) {
                                                $status_html = '<span class="badge badge-success">Active</span>';
                                            } elseif ($row['status'] == 0) {
                                                $status_html = '<span class="badge badge-danger">Deactive</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?= $row['parent_id'] == 0 ? 'Main Category' : 'Subcategory' ?></td>
                                                <td>
                                                    <?php if (!empty($row['icon_image'])) { ?>
                                                        <img src="<?php echo base_url($row['icon_image']); ?>" class="img-thumbnail" />
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if (!empty($row['poster_image'])) { ?>
                                                        <img src="<?php echo base_url($row['poster_image']); ?>" class="img-thumbnail" />
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $status_html; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/edit-category/') . $row['id']; ?>" data-toggle="ajax-modal" title="Edit" alt="Edit"><i class="zmdi zmdi-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/delete-category/') . $row['id']; ?>" data-toggle="delete-modal" title="Delete" alt="Delete"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-md-4">Category Name</th>
                                        <th class="col-md-2">Type</th>
                                        <th class="col-md-2">Icon</th>
                                        <th class="col-md-2">Poster Image</th>
                                        <th class="col-md-2">Status</th>
                                        <th class="col-md-2">Date</th>
                                        <th class="col-md-2">Action</th>
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
<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable();
    });
</script>