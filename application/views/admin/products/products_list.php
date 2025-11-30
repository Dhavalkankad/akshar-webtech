<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Products</strong> List</h2>
                        <a class="btn btn-raised btn-primary btn-round waves-effect" data-toggle="ajax-modal" href="<?php echo base_url('admin/add-products'); ?>">Add Product</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover products_table dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Name</th>
                                        <th class="col-md-2">Image</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Stock Qty</th>
                                        <th class="col-md-1">Stock Status</th>
                                        <th class="col-md-1">Date</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products_details)) { ?>
                                        <?php foreach ($products_details as $key => $row) {
                                            $status_html = "";
                                            $stock_status_label = "";
                                            if ($row['status'] == 1) {
                                                $status_html = '<span class="badge badge-success">Active</span>';
                                            } elseif ($row['status'] == 0) {
                                                $status_html = '<span class="badge badge-danger">Deactive</span>';
                                            }
                                            if (isset($row['stock_status']) && $row['stock_status'] === 'in_stock') {
                                                $stock_status_label = '<span class="badge badge-success">In Stock</span>';
                                            } else {
                                                $stock_status_label = '<span class="badge badge-danger">Out of Stock</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><img src="<?php echo base_url($row['thumbnail']); ?>" class="img-thumbnail" /></td>
                                                <td><?php echo $status_html; ?></td>
                                                <td class="text-center"><?php echo $row['stock_quantity']; ?></td>
                                                <td class="text-center"><?php echo $stock_status_label; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/edit-products/') . $row['id']; ?>" data-toggle="ajax-modal"><i class="zmdi zmdi-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/delete-products/') . $row['id']; ?>" data-toggle="delete-modal"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-md-2">Name</th>
                                        <th class="col-md-2">Image</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Stock Qty</th>
                                        <th class="col-md-1">Stock Status</th>
                                        <th class="col-md-1">Date</th>
                                        <th class="col-md-1">Action</th>
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