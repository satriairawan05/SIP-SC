@extends('auth.layout.app')

@section('auth')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed!</strong> {{ session('loginError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- Authentication card start -->
                <form class="md-float-material form-material" action="{{ route('login_store') }}" method="post">
                    @csrf
                    <div class="text-center text-white">
                        {{-- <img src="assets/images/logo.png" alt="logo.png"> --}}
                        {{ $name }}
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Login</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Your Email Address</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>
                            {{-- <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone f-right text-right">
                                        <a href="#" class="f-w-600 text-right"> Forgot Password?</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect waves-light m-b-20 text-center">Login</button>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-inverse m-b-0 text-center">Thank you.</p>
                                    <p class="text-inverse text-center"><a href="{{ route('dashboard') }}"><b>Back to
                                                website</b></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
@endsection
