<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Coupon</h4>
        </div>
        <div class="modal-body">
            <?php
            $id = "";
            $code = "";
            $type = "";
            $value = "";
            $min_order_amount = "";
            $start_date = "";
            $end_date = "";
            $status = "";
            if (!empty($coupon_details)) {
                $id = $coupon_details['id'];
                $code = $coupon_details['code'];
                $type = $coupon_details['type'];
                $value = $coupon_details['value'];
                $min_order_amount = $coupon_details['min_order_amount'];
                $start_date = $coupon_details['start_date'];
                $end_date = $coupon_details['end_date'];
                $status = $coupon_details['status'];
            } ?>
            <form method="post" action="<?php echo base_url('admin/coupon-commit'); ?>" id="<?php echo ($id == "") ? "add_coupon_form" : "edit_coupon_form"; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <label>Code</label>
                <div class="form-group">
                    <input type="text" name="code" id="code" class="form-control" placeholder="Enter code" value="<?php echo $code; ?>">
                </div>
                <label>Type</label>
                <div class="radio form-group">
                    <div class="inlineblock m-r-20">
                        <input type="radio" name="type" id="percentage" class="with-gap" value="percentage" <?php echo ($type == "percentage") ? "checked" : ""; ?>>
                        <label for="percentage">Percentage</label>
                        <input type="radio" name="type" id="fixed" class="with-gap" value="fixed" <?php echo ($type == "fixed") ? "checked" : ""; ?>>
                        <label for="fixed">Fixed</label>
                    </div>
                </div>
                <label>Value</label>
                <div class="form-group">
                    <input type="text" name="value" id="value" class="form-control" placeholder="Enter value" value="<?php echo $value; ?>">
                </div>
                <label>Minimum Order Amount</label>
                <div class="form-group">
                    <input type="text" name="min_order_amount" id="min_order_amount" class="form-control" placeholder="Enter min order amount" value="<?php echo $min_order_amount; ?>">
                </div>
                <label>Start Date</label>
                <div class="form-group">
                    <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Enter start date" value="<?php echo $start_date; ?>">
                </div>
                <label>End Date</label>
                <div class="form-group">
                    <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Enter end date" value="<?php echo $end_date; ?>">
                </div>
                <label>Status</label>
                <div class="radio form-group">
                    <div class="inlineblock m-r-20">
                        <input type="radio" name="status" id="active" class="with-gap" value="1" <?php echo ($status == "1") ? "checked" : ""; ?>>
                        <label for="active">Active</label>
                        <input type="radio" name="status" id="deactive" class="with-gap" value="0" <?php echo ($status == "0") ? "checked" : ""; ?>>
                        <label for="deactive">Deactive</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Submit" />
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
        </div>
    </div>
</div>
<script>
    $('#add_coupon_form').validate({
        rules: {
            code: {
                required: true
            },
            type: {
                required: true
            },
            value: {
                required: true
            },
            min_order_amount: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            code: {
                required: 'Enter code'
            },
            type: {
                required: 'Select type'
            },
            value: {
                required: 'Enter value'
            },
            min_order_amount: {
                required: 'Enter minimum order amount'
            },
            start_date: {
                required: 'Select start date'
            },
            end_date: {
                required: 'Select end date'
            },
            status: {
                required: 'Select status.'
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio") {
                error.appendTo(element.parent('div'));
            } else {
                error.insertAfter(element);
            }
        }
    });
    $('#edit_coupon_form').validate({
        rules: {
            code: {
                required: true
            },
            type: {
                required: true
            },
            value: {
                required: true
            },
            min_order_amount: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            code: {
                required: 'Enter code'
            },
            type: {
                required: 'Select type'
            },
            value: {
                required: 'Enter value'
            },
            min_order_amount: {
                required: 'Enter minimum order amount'
            },
            start_date: {
                required: 'Select start date'
            },
            end_date: {
                required: 'Select end date'
            },
            status: {
                required: 'Select status.'
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio") {
                error.appendTo(element.parent('div'));
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>