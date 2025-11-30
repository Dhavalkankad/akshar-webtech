<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Update Order Status</h4>
        </div>
        <div class="modal-body">
            <?php
            $id = "";
            $status = "";
            if (!empty($order)) {
                $id = $order['id'];
                $status = $order['status'];
            } ?>
            <form method="post" action="<?php echo base_url('admin/order-status-commit'); ?>" id="edit_order_status_form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <label>Status</label>
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="pending" <?= ($order['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="confirmed" <?= ($order['status'] == 'confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                        <option value="on_hold" <?= ($order['status'] == 'on_hold') ? 'selected' : ''; ?>>On Hold</option>
                        <option value="cancelled" <?= ($order['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        <option value="failed" <?= ($order['status'] == 'failed') ? 'selected' : ''; ?>>Failed</option>
                        <option value="refunded" <?= ($order['status'] == 'refunded') ? 'selected' : ''; ?>>Refunded</option>
                        <option value="shipped" <?= ($order['status'] == 'shipped') ? 'selected' : ''; ?>>Shipped</option>
                        <option value="out_for_delivery" <?= ($order['status'] == 'out_for_delivery') ? 'selected' : ''; ?>>Out for Delivery</option>
                        <option value="delivered" <?= ($order['status'] == 'delivered') ? 'selected' : ''; ?>>Delivered</option>
                        <option value="returned" <?= ($order['status'] == 'returned') ? 'selected' : ''; ?>>Returned</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Submit" />
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
        </div>
    </div>
</div>