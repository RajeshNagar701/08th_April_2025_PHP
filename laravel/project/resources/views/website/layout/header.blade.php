<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ; // current page url
  $url = end($url_array);  
  if($currect_page == $url){
	  echo 'active'; //class name in css 
  } 
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Salone - Beauty Salon Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo url('website/img/favicon.ico')?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:wght@500&family=Work+Sans&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo url('website/lib/animate/animate.min.css')?>" rel="stylesheet">
    <link href="<?php echo url('website/lib/lightbox/css/lightbox.min.css')?>" rel="stylesheet">
    <link href="<?php echo url('website/lib/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo url('website/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo url('website/css/style.css')?>" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-light sticky-top p-0">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <a href="index" class="navbar-brand bg-primary py-4 px-5 me-0">
                <h1 class="mb-0"><i class="bi bi-scissors"></i>Salone</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index" class="nav-item nav-link <?php active('index')?>">Home</a>
                    <a href="about" class="nav-item nav-link <?php active('about')?>">About</a>
                    <a href="service" class="nav-item nav-link <?php active('service')?>">Service</a>
                    <a href="price" class="nav-item nav-link <?php active('price')?>">Price</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light mt-2">
                            <a href="gallery" class="dropdown-item <?php active('gallery')?>">Photo Gallery</a>
                            <a href="blog" class="dropdown-item <?php active('blog')?>">Beauty Blog</a>
                            <a href="team" class="dropdown-item <?php active('team')?>">Our Team</a>
                            <a href="testimonial" class="dropdown-item <?php active('testimonial')?>">Testimonial</a>
                            <a href="404" class="dropdown-item <?php active('404')?>">404 Page</a>
                        </div>
                    </div>
                    <a href="contact" class="nav-item nav-link">Contact</a>
                    @if(session()->has('cid'))
                    <a href="profile" class="nav-item nav-link">Hi.. {{Session()->get('cname')}}</a>
                    @endif
                </div>
                <div class="d-flex">
                    <a class="btn btn-primary btn-sm-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-sm-square me-3" href=""><i class="fab fa-instagram"></i></a>
                    @if(session()->has('cid'))
                    <a class="btn btn-primary btn-sm-square" href="/cust_logout">Logout</i></a>
                    @else
                    <a class="btn btn-primary btn-sm-square" href="/login">Login</i></a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->