<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Order Details</h4>
        </div>
        <div class="modal-body">
            <?php if (isset($orders_details) && !empty($orders_details)) { ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <h6> Order #<?= $orders_details['order_no']; ?>
                                <?php if (isset($orders_details['payment_method'])): ?>
                                    <?php if ($orders_details['payment_method'] == 'cod'): ?>
                                        <span class="badge badge-primary ml-2">Cash on Delivery</span>
                                    <?php elseif ($orders_details['payment_method'] == 'online'): ?>
                                        <span class="badge badge-info ml-2">Prepaid</span>
                                    <?php endif ?>
                                <?php endif ?>
                            </h6>
                            <p class="mb-1"><strong>Order Date:</strong> <?= $orders_details['created_at'] ? dateFormat($orders_details['created_at']) : '' ?></p>
                            <p class="mb-1"><strong>Total Items:</strong> <?= isset($orders_details['order_items_details']) ? count($orders_details['order_items_details']) : 0 ?></p>
                            <p class="mb-1">
                                <strong>Order Status:</strong>
                                <?php if (isset($orders_details['status']) && !empty($orders_details['status'])): ?>
                                    <span class="badge badge-warning ml-2"><?= order_status($orders_details['status']) ?></span>
                                <?php endif ?>
                            </p>
                            <p class="mb-1">
                                <strong>Payment Status:</strong>
                                <?php if (isset($orders_details['payment_status']) && ($orders_details['payment_status'] == '0')) { ?>
                                    <span class="badge badge-default">Pending</span>
                                <?php } else if (isset($orders_details['payment_status']) && ($orders_details['payment_status'] == '1')) {  ?>
                                    <span class="badge badge-success">Paid</span>
                                <?php } else if (isset($orders_details['payment_status']) && ($orders_details['payment_status'] == '2')) {  ?>
                                    <span class="badge badge-danger">Failed</span>
                                <?php } else if (isset($orders_details['payment_status']) && ($orders_details['payment_status'] == '3')) {  ?>
                                    <span class="badge badge-warning">Refunded</span>
                                <?php } else if (isset($orders_details['payment_status']) && ($orders_details['payment_status'] == '4')) {  ?>
                                    <span class="badge badge-danger">Cancelled</span>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if (isset($payment_details) && !empty($payment_details)) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Payment Information</h6>
                                    <p class="mb-1"><strong>Transaction ID:</strong> <?= htmlspecialchars($payment_details['transaction_id']); ?></p>
                                    <p class="mb-1"><strong>Amount:</strong> <?= amount($payment_details['amount']); ?></p>
                                    <p class="mb-0"><strong>Date & Time:</strong> <?= dateFormat($payment_details['transaction_datetime']); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 text-right">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <span><?= isset($orders_details['subtotal']) ? amount($orders_details['subtotal']) : 0 ?></span>
                            </li>
                            <?php if (!empty($orders_details['coupon_code'])): ?>
                                <li class="list-group-item px-0 d-flex justify-content-between text-danger">
                                    <span>Discount (<?= $orders_details['coupon_code'] ?>):</span>
                                    <span>-<?= amount($orders_details['discount']) ?></span>
                                </li>
                            <?php endif ?>
                            <li class="list-group-item px-0 d-flex justify-content-between font-weight-bold">
                                <span>Total Amount:</span>
                                <span><?= isset($orders_details['grand_total']) ? amount($orders_details['grand_total']) : 0 ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if (isset($orders_details['order_items_details']) && !empty($orders_details['order_items_details'])): ?>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:10px;">No.</th>
                                    <th style="width:60px;">Image</th>
                                    <th>Product</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($orders_details['order_items_details'] as $item_row): ?>
                                    <?php $product_details = $this->Products_model->get_all_products(['returnType' => 'single', 'conditions' => ['id' => $item_row['product_id']]]); ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td>
                                            <img src="<?= base_url($product_details['thumbnail']); ?>" alt="Product" class="img-fluid" style="max-width:48px;">
                                        </td>
                                        <td><?= $item_row['product_name']; ?></td>
                                        <td class="text-right"><?= amount($item_row['amount']); ?></td>
                                        <td class="text-center"><?= $item_row['quantity']; ?></td>
                                        <td class="text-right"><?= amount($item_row['subtotal']); ?></td>
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            <?php } else { ?>
                <div class="text-center my-5">
                    <span class="text-muted">No order found</span>
                </div>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
        </div>
    </div>
</div>