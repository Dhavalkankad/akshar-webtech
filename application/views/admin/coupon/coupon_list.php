<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Coupon</strong> List</h2>
                        <a class="btn btn-raised btn-primary btn-round waves-effect" data-toggle="ajax-modal" href="<?php echo base_url('admin/add-coupon'); ?>">Add Coupon</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover coupon_table dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1 text-center">Code</th>
                                        <th class="col-md-1 text-center">Type</th>
                                        <th class="col-md-1 text-center">Value</th>
                                        <th class="col-md-1 text-center">Min Order Amount</th>
                                        <th class="col-md-1 text-center">Start Date</th>
                                        <th class="col-md-1 text-center">End Date</th>
                                        <th class="col-md-1 text-center">Status</th>
                                        <th class="col-md-1 text-center">Date</th>
                                        <th class="col-md-1 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($coupon_details)) { ?>
                                        <?php foreach ($coupon_details as $key => $row) {
                                            $status_html = "";
                                            if ($row['status'] == 1) {
                                                $status_html = '<span class="badge badge-success">Active</span>';
                                            } elseif ($row['status'] == 0) {
                                                $status_html = '<span class="badge badge-danger">Deactive</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo ucfirst($row['type']); ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['min_order_amount']; ?></td>
                                                <td><?php echo dateFormat($row['start_date'], true); ?></td>
                                                <td><?php echo dateFormat($row['end_date'], true); ?></td>
                                                <td><?php echo $status_html; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/edit-coupon/') . $row['id']; ?>" data-toggle="ajax-modal"><i class="zmdi zmdi-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/delete-coupon/') . $row['id']; ?>" data-toggle="delete-modal"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-md-1 text-center">Code</th>
                                        <th class="col-md-1 text-center">Type</th>
                                        <th class="col-md-1 text-center">Value</th>
                                        <th class="col-md-1 text-center">Min Order Amount</th>
                                        <th class="col-md-1 text-center">Start Date</th>
                                        <th class="col-md-1 text-center">End Date</th>
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