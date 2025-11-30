<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
<!-- Jquery Core Js -->
<script src="<?php echo base_url('assets/admin/bundles/libscripts.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/bundles/vendorscripts.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/bundles/datatablescripts.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/bundles/mainscripts.bundle.js'); ?>"></script>

<script src="<?php echo base_url('assets/admin/js/pages/jquery.validate.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/pages/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/pages/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/pages/admin_custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        var msgtype = "";
        var message = "";
        <?php if ($this->session->flashdata('success')) : ?>
            msgtype = "success"
            message = "<?php echo $this->session->flashdata('success'); ?>"
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            msgtype = "error"
            message = "<?php echo $this->session->flashdata('error'); ?>"
        <?php endif; ?>
        if (message != "") {
            showNotification(msgtype, message);
        }
    });
</script>