<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Testimonials</h4>
        </div>
        <div class="modal-body">
            <?php
            $id = "";
            $name = "";
            $city = "";
            $rating = "";
            $description = "";
            $status = "";
            if (!empty($testimonials_details)) {
                $id = $testimonials_details['id'];
                $name = $testimonials_details['name'];
                $city = $testimonials_details['city'];
                $rating = $testimonials_details['rating'];
                $description = $testimonials_details['description'];
                $status = $testimonials_details['status'];
            } ?>
            <form method="post" action="<?php echo base_url('admin/testimonials-commit'); ?>" id="<?php echo ($id == "") ? "add_testimonials_form" : "edit_testimonials_form"; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <label>Name</label>
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name." value="<?php echo $name; ?>">
                </div>
                <label>City</label>
                <div class="form-group">
                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter city." value="<?php echo $city; ?>">
                </div>
                <label>Rating</label>
                <div class="form-group">
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Select Rating</option>
                        <option value="1" <?= (isset($rating) && $rating == 1) ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= (isset($rating) && $rating == 2) ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= (isset($rating) && $rating == 3) ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= (isset($rating) && $rating == 4) ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= (isset($rating) && $rating == 5) ? 'selected' : '' ?>>5</option>
                    </select>
                </div>
                <label>Description</label>
                <div class="form-group">
                    <textarea name="description" id="description" class="form-control" placeholder="Enter description."><?php echo $description; ?></textarea>
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
    $('#add_testimonials_form').validate({
        rules: {
            name: {
                required: true
            },
            description: {
                required: true
            },
            city: {
                required: true
            },
            rating: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Enter name.'
            },
            description: {
                required: 'Enter description.'
            },
            city: {
                required: 'Enter city.'
            },
            rating: {
                required: 'Select rating.'
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
    $('#edit_testimonials_form').validate({
        rules: {
            name: {
                required: true
            },
            city: {
                required: true
            },
            rating: {
                required: true
            },
            description: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Enter name.'
            },
            city: {
                required: 'Enter city.'
            },
            rating: {
                required: 'Select rating.'
            },
            description: {
                required: 'Enter description.'
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