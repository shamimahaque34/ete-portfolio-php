<?php 

$activePage="home"; 
$header = 'includes/header.php';
include($header);   
?>


<!--Preloader Starts Here-->
<!-- <div id="loading"></div> -->
<!--Preloader Ends Here-->



<!--Banner Starts Here-->
<div class="container section-padding banner">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 banner-content">

           <h3>Looking for...</h3>

            <h1>
                <span class="type"></span>
            </h1>


                <p>Let me provide <span>High-Quality</span> web developement services  <br>
                   at an <span>Affordable</span> cost.
                </p>

            <a href="about.html"><button type="button" class="main-button">About</button></a>
            <a href="portfolio.html">
            <button type="button" class="another-button"> Recent Projects</button></a>

        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 banner-img">
            <img src="../assets/images/banner-img.svg" alt="img">
        </div>
    </div>
</div>
<!--Banner Ends Here-->

<!--Project-idea Starts Here-->
    <section class="project-idea">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 promote-content">
                    <h3>Have any project idea?</h3>
                    <p>Let's bring it to life together. I thrive on turning visions into reality. Whether you're an individual with a groundbreaking concept or a business seeking innovative solutions, we're here to transform ideas into impactful projects.Get in touch today and let's make your project idea a resounding success."</p>
                        <a href="contact.html">
                           <button type="button" class="main-button">Get A Quote</button>
                        </a>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 content-preview">
                    <div class="d-flex justify-content-end">
                        <div class="content-preview-thumb">
                        <img src="{{ asset('/') }}frontend/assets/images/project-idea.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Project-idea Ends Here-->

<!--Testimonial Starts Here-->
 <div class="container section-padding">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div id="testimonial-slider" class="owl-carousel">
                <?php foreach($homes as $home) { extract($home)?>
                <div class="testimonial">
                    <div class="client">
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
                    <div class="testimonial-content">
                        <p class="description">
                        <?php echo $description; ?>
                        </p>
                        <h3 class="client-title"><?php echo $name; ?>
                            <small class="post"><?php echo $designation; ?></small>
                        </h3>
                    </div>
                </div>

                <?php } ?>

               </div>
        </div>
    </div>
</div>
<!--Portfolio Ends Here-->

<?php include 'includes/footer.php'; ?>