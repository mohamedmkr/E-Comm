@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <!-- Sign In Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <form action="{{url('login')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="avatar_link" class="form-control" id="floatingPassword" placeholder="choose Your image">
                            <label for="floatingInput">Your Image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <h6>Select Login Status</h6>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="btnradio" value="student" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Student</label>

                                <input type="radio" class="btn-check" name="btnradio" value="techer" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Teacher</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="{{url('register')}}">Sign Up</a></p>
                    
                </div>
            </form>
        </div>
       
    </div>
</div>
<!-- Sign In End -->

@endsection