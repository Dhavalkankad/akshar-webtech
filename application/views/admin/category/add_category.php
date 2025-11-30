<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Category</h4>
        </div>
        <div class="modal-body">
            <?php
            $id = "";
            $name = "";
            $parent_id = "";
            $status = "";
            $icon_image = "";
            $old_icon_image = "";
            $poster_image = "";
            $old_poster_image = "";
            // $show_in_header = "";
            $show_in_footer = "";
            $show_in_shop_by_categories_section = "";
            if (!empty($category)) {
                $id = $category['id'];
                $name = $category['name'];
                $parent_id = $category['parent_id'];
                $status = $category['status'];
                $icon_image = $category['icon_image'];
                $old_icon_image = $category['icon_image'];
                $poster_image = $category['poster_image'];
                $old_poster_image = $category['poster_image'];
                // $show_in_header = ($category['show_in_header'] == 1) ? 'checked' : '';
                $show_in_footer = ($category['show_in_footer'] == 1) ? 'checked' : '';
                $show_in_shop_by_categories_section = ($category['show_in_shop_by_categories_section'] == 1) ? 'checked' : '';
            } ?>
            <form method="POST" action="<?php echo base_url('admin/category-commit'); ?>" id="<?php echo ($id == "") ? "add_category_form" : "edit_category_form"; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <label>Category name</label>
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name." value="<?php echo $name; ?>">
                </div>
                <label>Main Category</label>
                <div class="form-group">
                    <select name="parent_id" class="form-control">
                        <option value="0">Main Category</option>
                        <?php foreach ($main_categories as $mc): ?>
                            <?php if ($mc['id'] != $category['id']): // prevent assigning itself as parent 
                            ?>
                                <option value="<?= $mc['id']; ?>" <?= $mc['id'] == $parent_id ? 'selected' : ''; ?>>
                                    <?= $mc['name']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label>Icon (150 X 150)</label>
                <div class="form-group">
                    <input type="file" class="form-control" name="icon_image" id="icon_image" />
                    <input type="hidden" class="form-control" name="old_icon_image" value="<?php echo $old_icon_image; ?>" />
                    <?php if (isset($icon_image) && !empty($icon_image)) { ?>
                        <img src="<?php echo base_url($icon_image); ?>" class="img-image" style="height: 100px;width: 150px; margin:5px;" />
                    <?php } ?>
                </div>
                <label>Poster Image (850 X 525)</label>
                <div class="form-group">
                    <input type="file" class="form-control" name="poster_image" id="poster_image" />
                    <input type="hidden" class="form-control" name="old_poster_image" value="<?php echo $old_poster_image; ?>" />
                    <?php if (isset($poster_image) && !empty($poster_image)) { ?>
                        <img src="<?php echo base_url($poster_image); ?>" class="img-image" style="height: 100px;width: 150px; margin:5px;" />
                    <?php } ?>
                </div>
                <div class="form-group my-3">
                    <div class="checkbox">
                        <!-- <input id="show_in_header" type="checkbox" name="show_in_header" value="1" <?= $show_in_header; ?>>
                        <label for="show_in_header">Show in Header</label> -->
                        <input id="show_in_footer" type="checkbox" name="show_in_footer" value="1" <?= $show_in_footer; ?>>
                        <label for="show_in_footer" class="">Show in Footer</label>
                        <input id="show_in_shop_by_categories_section" type="checkbox" name="show_in_shop_by_categories_section" value="1" <?= $show_in_shop_by_categories_section; ?>>
                        <label for="show_in_shop_by_categories_section" class="ml-2">Show in Shop By Categories Section</label>
                    </div>
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
    $('#add_category_form').validate({
        rules: {
            name: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Enter category name.'
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
    $('#edit_category_form').validate({
        rules: {
            name: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Enter category name.'
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