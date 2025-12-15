@extends('website.layout.structure')

@section('content')


    <!-- Hero Start -->
    <div class="container-fluid bg-light page-header py-5 mb-5">
        <div class="container text-center py-5">
            <h1 class="display-1 animated slideInLeft">Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="font-dancing-script text-primary">Login</h1>
                <h1 class="mb-5">Have Any Query? Login Us</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                   <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form action="{{url('/auth_login')}}" method="post" >
                            @csrf
                            <div class="row g-3">
                               
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" value="{{old('pass')}}" name="pass" class="form-control" id="email" placeholder="Your Password">
                                        <label for="password">Your password</label>
                                         @error('pass')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                              
                                <div class="col-12">
                                    <button name="submit" class="btn btn-primary w-100 py-3 ms-0" type="submit">SEND MESSAGE</button>
                                </div>
                                <div class="col-12 mt-5">
                                   <a href="/signup" class="float-start">If you not registered then Signup Here</a>
                                   <a href="/forgot" class="float-end">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection