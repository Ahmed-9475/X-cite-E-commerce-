@extends('Website.Layouts.master')

@section('title')
x-cite
@endsection


@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" action="{{route('register.store')}}" method="post">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" type="text" id="reg-fn">
                                    @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror  
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" id="reg-email" required>
                                    @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror  
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control  @error('password') is-invalid @enderror" name="password" type="password" id="reg-pass" required>
                                    @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror  
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <input class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" type="password" id="reg-pass-confirm" required>
                                    @error('confirm_password')<div class="alert alert-danger">{{ $message }}</div>@enderror  
                                </div>
                            </div> --}}
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            @if(Route::has('login.user'))
                            <p class="outer-link">Already have an account? <a href="{{route('login.user')}}">Login Now</a>

                            </p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->

@endsection
