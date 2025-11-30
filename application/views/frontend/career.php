<?php $this->load->view("layout/header.php"); ?>
<main id="main-content">
    <div class="inner-header-section">
        <div class="container">
            <h1 data-aos="fade-down">Career</h1>
            <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Career</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="">
        <div class="container">
            <div class="title text-center">
                <h2><span class="text-dark">Our</span> Opeenings</h2>
            </div>
            <div class="accordion" id="careerdrop">
                <?php if (!empty($career_details)) { ?>
                    <?php foreach ($career_details as $key => $row) { ?>
                        <div class="accordion-item" data-aos="fade-down">
                            <h2 class="accordion-header" id="">
                                <button class="accordion-button d-flex justify-content-between collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#career<?= $key; ?>"><?= $row['title']; ?><div class="btn btn-primary btn-sm">Find out More</div>
                                </button>
                            </h2>
                            <div id="career<?= $key; ?>" class="accordion-collapse collapse" data-bs-parent="#careerdrop">
                                <div class="accordion-body">
                                    <?= $row['description']; ?>
                                    <br>
                                    <a class="btn btn-primary btn-sm mt-3 career_apply_btn" data-title="<?= $row['title']; ?>" data-career_id="<?= $row['id']; ?>">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="col-md-12 text-center ">
                        <p class="text-muted fw-bolder">No record found</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>
<?php $this->load->view("layout/footer.php"); ?>