<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Payments</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover payments_table dataTable">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Transaction Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Transaction Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($payments_details)) { ?>
                                        <?php foreach ($payments_details as $key => $row) {
                                            $order_details = $this->Orders_model->getRows(array('returnType' => 'single', 'conditions' => array('id' => $row['order_id'])));
                                        ?>
                                            <tr>
                                                <td>#<?php echo $order_details['order_no']; ?></td>
                                                <td><?php echo $row['transaction_id']; ?></td>
                                                <td><?php echo amount($row['amount']); ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo dateFormat($row['transaction_datetime']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Transaction Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Transaction Date Time</th>
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