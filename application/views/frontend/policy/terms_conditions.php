<?php $this->load->view("frontend/layout/header.php"); ?>
<main id="main-content">
    <div class="inner-header" data-aos="fade-in">
        <div class="container">
            <h1 data-aos="fade-up" data-aos-delay="100">Terms & Conditions</h1>
            <div class="breadcrums" data-aos="fade-up" data-aos-delay="200">
                <ul>
                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li><a href="javascript:void(0);" class="active">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="content-section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
</main>
<?php $this->load->view("frontend/layout/footer.php"); ?>