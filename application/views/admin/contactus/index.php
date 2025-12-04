<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Contact Us</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover contact_us_table dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($contact_details)) { ?>
                                        <?php foreach ($contact_details as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone_no']; ?></td>
                                                <td><?php echo $row['subject']; ?></td>
                                                <td><?php echo $row['message']; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
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