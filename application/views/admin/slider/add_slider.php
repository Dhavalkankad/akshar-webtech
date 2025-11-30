<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Slider</h4>
        </div>
        <div class="modal-body">
            <?php
            $id = "";
            // $description = "";
            $ordering = "";
            $status = "";
            $image = "";
            $old_image = "";
            // $title = "";
            if (!empty($slider_details)) {
                $id = $slider_details['id'];
                // $description = $slider_details['description'];
                $ordering = $slider_details['ordering'];
                $status = $slider_details['status'];
                $image = $slider_details['image'];
                $old_image = $slider_details['image'];
                // $title = $slider_details['title'];
            } ?>
            <form method="post" action="<?php echo base_url('admin/slider-commit'); ?>" id="<?php echo ($id == "") ? "add_slider_form" : "edit_slider_form"; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <!-- <label>Title</label>
                <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title." value="<?php echo $title; ?>">
                </div>
                <label>Description</label>
                <div class="form-group">
                    <textarea name="description" id="description" class="form-control" placeholder="Enter description."><?php echo $description; ?></textarea>
                </div> -->
                <label>Ordering</label>
                <div class="form-group">
                    <input type="number" min="0" max="10000" name="ordering" id="ordering" class="form-control" placeholder="Enter ordering." value="<?php echo $ordering; ?>">
                </div>
                <label>Image (1280 X 501)</label>
                <div class="form-group">
                    <input type="file" class="form-control" name="image" id="image" />
                    <input type="hidden" class="form-control" name="old_image" value="<?php echo $old_image; ?>" />
                    <?php if (isset($image) && !empty($image)) { ?>
                        <img src="<?php echo base_url($image); ?>" class="img-thumbnail" style="height: 100px;width: 150px; margin:5px;" />
                    <?php } ?>
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
    $('#add_slider_form').validate({
        rules: {
            // description: {
            //     required: true
            // },
            // title: {
            //     required: true
            // },
            image: {
                required: true
            },
            ordering: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            // description: {
            //     required: 'Enter description.'
            // },
            // title: {
            //     required: 'Enter title.'
            // },
            image: {
                required: 'Select image.'
            },
            ordering: {
                required: 'Enter ordering.'
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
    $('#edit_slider_form').validate({
        rules: {
            // description: {
            //     required: true
            // },
            // title: {
            //     required: true
            // },
            ordering: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            // description: {
            //     required: 'Enter description.'
            // },
            // title: {
            //     required: 'Enter title.'
            // },
            ordering: {
                required: 'Enter ordering.'
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