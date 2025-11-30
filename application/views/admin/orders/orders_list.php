<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Orders</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover orders_table dataTable">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Order By</th>
                                        <th>Contact No.</th>
                                        <th>Grand Total</th>
                                        <th>Order Type</th>
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($orders_details)) { ?>
                                        <?php foreach ($orders_details as $key => $row) { ?>
                                            <tr>
                                                <td>#<?php echo $row['order_no']; ?></td>
                                                <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                                <td><?php echo $row['phone_no']; ?></td>
                                                <td><?php echo amount($row['grand_total']); ?></td>
                                                <td>
                                                    <?php if (isset($row['payment_method']) && ($row['payment_method'] == 'cod')) { ?>
                                                        <span class="badge badge-info">Cash on Delivery</span>
                                                    <?php } ?>
                                                    <?php if (isset($row['payment_method']) && ($row['payment_method'] == 'online')) { ?>
                                                        <span class="badge badge-primary">Prepaid</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($row['status']) && !empty($row['status'])) { ?>
                                                        <span class="badge badge-warning"><?= order_status($row['status']); ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($row['payment_status']) && ($row['payment_status'] == '0')) { ?>
                                                        <span class="badge badge-default">Pending</span>
                                                    <?php } else if (isset($row['payment_status']) && ($row['payment_status'] == '1')) {  ?>
                                                        <span class="badge badge-success">Paid</span>
                                                    <?php } else if (isset($row['payment_status']) && ($row['payment_status'] == '2')) {  ?>
                                                        <span class="badge badge-danger">Failed</span>
                                                    <?php } else if (isset($row['payment_status']) && ($row['payment_status'] == '3')) {  ?>
                                                        <span class="badge badge-warning">Refunded</span>
                                                    <?php } else if (isset($row['payment_status']) && ($row['payment_status'] == '4')) {  ?>
                                                        <span class="badge badge-danger">Cancelled</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/edit-order-status/') . encrypt($row['id']); ?>" data-toggle="ajax-modal" title="Update Status"><i class="zmdi zmdi-edit"></i></a>
                                                    <a class="btn btn-secondary btn-sm" href="<?php echo base_url('admin/view-order-details/') . encrypt($row['id']); ?>" data-toggle="ajax-modal" title="View Order Details"><i class="zmdi zmdi-eye"></i></a>
                                                    <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/view-invoice/') . encrypt($row['id']); ?>" target="_blank" title="View Invoice"><i class="zmdi zmdi-collection-pdf"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Order By</th>
                                        <th>Contact No.</th>
                                        <th>Grand Total</th>
                                        <th>Order Type</th>
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
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