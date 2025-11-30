<style>
    .img-pos {
        position: relative;
        height: 100px;
        width: 150px;
    }

    .img-pos .btnclose {
        position: absolute;
        left: 90%;
        margin-left: -20px;
        margin-top: 10px;
        cursor: pointer;
        color: #fd0000 !important;
    }

    .img-pos i {
        font-weight: 900;
        font-size: 25px;
    }
</style>

<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title">Product</h4>
        </div>
        <div class="modal-body">
            <?php
            $id = "";
            $name = "";
            $tagline = "";
            $key_features = "";
            $price = "";
            $description = "";
            $category = "";
            $shipping_description = "";
            $status = "";
            $thumbnail = "";
            $old_thumbnail = "";
            $stock_quantity = "";
            if (!empty($products)) {
                $id = $products['id'];
                $name = $products['name'];
                $tagline = $products['tagline'];
                $key_features = $products['key_features'];
                $price = $products['price'];
                $description = $products['description'];
                $category = $products['category_id'];
                $shipping_description = $products['shipping_description'];
                $status = $products['status'];
                $thumbnail = $products['thumbnail'];
                $old_thumbnail = $products['thumbnail'];
                $stock_quantity = isset($products['stock_quantity']) ? (int)$products['stock_quantity'] : '';
            } ?>
            <form method="post" action="<?php echo base_url('admin/products-commit'); ?>" id="<?php echo ($id == "") ? "add_products_form" : "edit_products_form"; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="old_thumbnail" value="<?php echo $old_thumbnail; ?>" />
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Name</label>
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name." value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Category</label>
                        <div class="form-group">
                            <select id="category" class="form-control" name="category" required>
                                <option value="">Select Category</option>
                                <?php if (!empty($category_list)) {
                                    foreach ($category_list as $main) {
                                        if ($main['parent_id'] == 0) {
                                            $selected_main = ($category == $main['id']) ? 'selected' : '';
                                            echo '<option value="' . $main['id'] . '" style="font-weight:bold;" ' . $selected_main . '>' . $main['name'] . '</option>';
                                            foreach ($category_list as $sub) {
                                                if ($sub['parent_id'] == $main['id']) {
                                                    $selected_sub = ($category == $sub['id']) ? 'selected' : '';
                                                    echo '<option value="' . $sub['id'] . '" style="padding-left: 20px;" ' . $selected_sub . '>&nbsp;&nbsp;&nbsp;' . $sub['name'] . '</option>';
                                                }
                                            }
                                        }
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Stock Quantity</label>
                        <div class="form-group">
                            <input type="number" name="stock_quantity" id="stock_quantity" min="0" class="form-control" placeholder="Enter stock quantity" value="<?php echo (int)$stock_quantity; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Tagline</label>
                        <div class="form-group">
                            <input type="text" name="tagline" id="tagline" class="form-control" placeholder="Enter product tagline." value="<?php echo $tagline; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Product Price</label>
                        <div class="form-group">
                            <input type="text" name="price" id="price" class="form-control" placeholder="Enter product price." value="<?php echo $price; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Product Key Features (comma separated)</label>
                        <small>Example: 1 Year warranty, Free delivery, 24 hours running capacity</small>
                        <div class="form-group">
                            <input type="text" name="key_features" id="key_features" class="form-control" placeholder="Enter product key features" value="<?php echo $key_features; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Description</label>
                        <div class="form-group">
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description."><?php echo $description; ?></textarea>
                            <label id="description-error" class="error" for="description" style="display: none;"></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Shipping Description</label>
                        <div class="form-group">
                            <textarea name="shipping_description" id="shipping_description" class="form-control" placeholder="Enter Shipping Description."><?php echo $shipping_description; ?></textarea>
                            <label id="shipping_description-error" class="error" for="shipping_description" style="display: none;"></label>
                        </div>
                    </div>
                </div>
                <div id="productFields">
                    <label>Specifications</label>
                    <?php if (!empty($products_details)): ?>
                        <?php foreach ($products_details as $index => $product): ?>
                            <div class="form-group productBlock" id="product_<?php echo $index + 1 ?>">
                                <div class="form-row productField" id="field_<?= $index + 1 ?>">
                                    <div class="col-md-6">
                                        <label>Specification Label <?= $index + 1 ?></label>
                                        <input type="text" name="label[]" class="form-control" value="<?= $product['product_label']; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Specification Value <?= $index + 1 ?></label>
                                        <input type="text" name="value[]" class="form-control" value="<?= $product['product_label_value']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="form-group productBlock" id="product_1">
                            <div class="form-row productField" id="field_1">
                                <div class="col-md-6">
                                    <label>Specification Label 1</label>
                                    <input type="text" name="label[]" class="form-control" placeholder="Enter label" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Specification Value 1</label>
                                    <input type="text" name="value[]" class="form-control" placeholder="Enter value" required>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <a id="addProduct" class="btn btn-success btn-sm mb-3" title="Add product" alt="Add product"><i class="zmdi zmdi-plus"></i></a>
                    <a id="removeProduct" class="btn btn-danger btn-sm mb-3" title="Remove product" alt="Remove product"><i class="zmdi zmdi-minus"></i></a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Thumbnail (800 X 800)</label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                            <?php if (!empty($thumbnail)) { ?>
                                <img src="<?php echo base_url($thumbnail); ?>" class="img-thumbnail" style="height: 100px;width: 150px; margin:5px;" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Product images (Multiple) (800 X 800)</label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="productimage[]" id="productimage" multiple="multiple" />
                            <?php $pimages = $this->Products_model->get_products_images(array('returnType' => '', 'conditions' => array('product_id' => $id))); ?>
                            <div class="row">
                                <?php if (!empty($pimages)) {
                                    foreach ($pimages as $row) { ?>
                                        <div class="img-pos col-md-4">
                                            <a class="btnclose" href="<?php echo base_url('admin/delete-products-image/') . $row['id']; ?>" data-toggle="delete-modal"><i class="zmdi zmdi-close"></i></a>
                                            <img src="<?php echo base_url($row['image']); ?>" class="img-thumbnail" style="height: 100px;width: 150px; margin:5px;" />
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Status</label>
                        <div class="radio form-group">
                            <div class="inlineblock m-r-20">
                                <input type="radio" name="status" id="active" class="with-gap" value="1" <?php echo ($status == "1") ? "checked" : ""; ?>>
                                <label for="active">Active</label>
                                <input type="radio" name="status" id="deactive" class="with-gap" value="0" <?php echo ($status == "0") ? "checked" : ""; ?>>
                                <label for="deactive">Deactive</label>
                            </div>
                        </div>
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
    CKEDITOR.replace('description');
    CKEDITOR.replace('shipping_description');
    CKEDITOR.on('instanceReady', function() {
        addValidation();
    });
    // for focus on ckeditor popups
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    function addValidation() {
        $.validator.addMethod("ckeditor_required", function(value, element) {
            var editorData = CKEDITOR.instances[element.name].getData();
            return editorData.trim().length > 0;
        }, "Please enter a description");

        // common rules for add form
        $('#add_products_form').validate({
            ignore: [],
            rules: {
                name: {
                    required: true
                },
                price: {
                    required: true,
                    number: true,
                    min: 1
                },
                category: {
                    required: true
                },
                description: {
                    ckeditor_required: true
                },
                shipping_description: {
                    ckeditor_required: true
                },
                thumbnail: {
                    required: true
                },
                "productimage[]": {
                    required: true
                },
                status: {
                    required: true
                },
                stock_quantity: {
                    required: true,
                    number: true,
                    min: 0
                }
            },
            messages: {
                name: {
                    required: 'Enter product name.'
                },
                price: {
                    required: 'Enter product price.',
                    number: "Enter a valid number",
                    min: "Price must be greater than 0"
                },
                category: {
                    required: 'Select category.'
                },
                description: {
                    ckeditor_required: 'Enter description.'
                },
                shipping_description: {
                    ckeditor_required: 'Enter shipping description.'
                },
                thumbnail: {
                    required: 'Select thumbnail.'
                },
                "productimage[]": {
                    required: 'Select product images.'
                },
                status: {
                    required: 'Select status.'
                },
                stock_quantity: {
                    required: 'Enter stock quantity.',
                    number: 'Enter valid quantity',
                    min: 'Stock quantity must be >= 0'
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                if (element.attr("type") == "radio") {
                    error.appendTo(element.parent('div'));
                } else if (element.attr("name") === "description") {
                    error.insertAfter("#description-error");
                } else if (element.attr("name") === "shipping_description") {
                    error.insertAfter("#shipping_description-error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // edit form: thumbnail & productimage not required
        $('#edit_products_form').validate({
            ignore: [],
            rules: {
                name: {
                    required: true
                },
                price: {
                    required: true,
                    number: true,
                    min: 1
                },
                category: {
                    required: true
                },
                description: {
                    ckeditor_required: true
                },
                shipping_description: {
                    ckeditor_required: true
                },
                status: {
                    required: true
                },
                stock_quantity: {
                    required: true,
                    number: true,
                    min: 0
                }
            },
            messages: {
                name: {
                    required: 'Enter product name.'
                },
                price: {
                    required: 'Enter product price.',
                    number: "Enter a valid number",
                    min: "Price must be greater than 0"
                },
                category: {
                    required: 'Select category.'
                },
                description: {
                    ckeditor_required: 'Enter description.'
                },
                shipping_description: {
                    ckeditor_required: 'Enter shipping description.'
                },
                status: {
                    required: 'Select status.'
                },
                stock_quantity: {
                    required: 'Enter stock quantity.',
                    number: 'Enter valid quantity',
                    min: 'Stock quantity must be >= 0'
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                if (element.attr("type") == "radio") {
                    error.appendTo(element.parent('div'));
                } else if (element.attr("name") === "description") {
                    error.insertAfter("#description-error");
                } else if (element.attr("name") === "shipping_description") {
                    error.insertAfter("#shipping_description-error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#add_products_form, #edit_products_form').on('submit', function() {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });
    }

    $(document).ready(function() {
        var productCount = <?php echo !empty($products_details) ? count($products_details) : 1; ?>;
        $('#addProduct').click(function() {
            productCount++;
            var newProduct = `<div class="form-group productBlock" id="product_${productCount}">
                                <div class="form-row productField" id="field_${productCount}">
                                    <div class="col-md-6">
                                        <label>Specification Label ${productCount}</label>
                                        <input type="text" name="label[]" class="form-control" placeholder="Enter label" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Specification Value ${productCount}</label>
                                        <input type="text" name="value[]" class="form-control" placeholder="Enter value" required>
                                    </div>
                                </div>
                            </div>`;
            $('#productFields').append(newProduct);
        });
        $(document).on('click', '#removeProduct', function() {
            if (productCount > 1) {
                $('#product_' + productCount).remove();
                productCount--;
            }
        });

    });
</script>