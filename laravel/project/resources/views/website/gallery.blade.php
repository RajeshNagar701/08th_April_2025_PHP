@extends('website.layout.structure')

@section('content')


    <!-- Hero Start -->
    <div class="container-fluid bg-light page-header py-5 mb-5">
        <div class="container text-center py-5">
            <h1 class="display-1 animated slideInLeft">Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.2s">
                <h1 class="font-dancing-script text-primary">Gallery</h1>
                <h1 class="mb-5">Explore Our Gallery</h1>
            </div>
            <div class="row g-0">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="gallery-item h-100">
                        <img src="<?php echo url('website/img/gallery-1.jpg')?>" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="<?php echo url('website/img/gallery-1.jpg')?>" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-1"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s">
                    <div class="gallery-item h-100">
                        <img src="<?php echo url('website/img/gallery-2.jpg')?>" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="<?php echo url('website/img/gallery-2.jpg')?>" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-2"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.6s">
                    <div class="gallery-item h-100">
                        <img src="<?php echo url('website/img/gallery-3.jpg')?>" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="<?php echo url('website/img/gallery-3.jpg')?>" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-3"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.2s">
                    <div class="gallery-item h-100">
                        <img src="<?php echo url('website/img/gallery-4.jpg')?>" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="<?php echo url('website/img/gallery-4.jpg')?>" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-4"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s">
                    <div class="gallery-item h-100">
                        <img src="<?php echo url('website/img/gallery-5.jpg')?>" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="<?php echo url('website/img/gallery-5.jpg')?>" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-5"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.6s">
                    <div class="gallery-item h-100">
                        <img src="<?php echo url('website/img/gallery-6.jpg')?>" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="<?php echo url('website/img/gallery-6.jpg')?>" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-6"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

@endsection