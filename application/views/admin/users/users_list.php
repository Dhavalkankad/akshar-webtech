<?php $this->load->view("admin/layout/header.php"); ?>
<?php $this->load->view("admin/layout/sidebar.php"); ?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header custom_header">
                        <h2><strong>Users</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover users_table dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Name</th>
                                        <th class="col-md-3">Email</th>
                                        <th class="col-md-2">Contact No</th>
                                        <th class="col-md-2">Status</th>
                                        <th class="col-md-2">Created Date</th>
                                        <th class="col-md-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($users_details)) { ?>
                                        <?php foreach ($users_details as $key => $row) {
                                            $status_html = "";
                                            if ($row['status'] == 1) {
                                                $status_html = '<span class="badge badge-success">Active</span>';
                                            } elseif ($row['status'] == 0) {
                                                $status_html = '<span class="badge badge-danger">Deactive</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone_no']; ?></td>
                                                <td><?php echo $status_html; ?></td>
                                                <td><?php echo dateFormat($row['created_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/view-user-details/') . $row['id']; ?>" data-toggle="ajax-modal" title="View" alt="View"><i class="zmdi zmdi-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-md-2">Name</th>
                                        <th class="col-md-3">Email</th>
                                        <th class="col-md-2">Contact No</th>
                                        <th class="col-md-2">Status</th>
                                        <th class="col-md-2">Created Date</th>
                                        <th class="col-md-2">Actions</th>
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