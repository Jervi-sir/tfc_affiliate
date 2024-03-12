@extends('client.layouts.master')

@section('content')
<div class="main-content main-content-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Authentication
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">
                        Authentication
                    </h3>
                    <div class="customer_login">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">Login your Account</h5>
                                    <form class="login" action={{route('login')}} method="POST">
                                        @csrf
                                        <p class="form-row form-row-wide">
                                            <label class="text">Email</label>
                                            <input name="email" title="username" type="text" class="input-text" required>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Password</label>
                                            <input name="password" title="password" type="password" class="input-text" required>
                                        </p>
                                        <p class="lost_password">
                                            <span class="inline">
                                                <input type="checkbox" id="cb1">
                                                <label for="cb1" class="label-text">Remember me</label>
                                            </span>
                                            <a href="#" class="forgot-pw">Forgot password?</a>
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" class="button-submit" value="login">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">Register now</h5>
                                    <form class="register" action={{route('register')}} method="POST">
                                        @csrf
                                        <p class="form-row form-row-wide">
                                            <label class="text">Your email</label>
                                            <input name="email" title="email" type="email" class="input-text" required>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Username</label>
                                            <input name="name" title="name" type="text" class="input-text" required>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Password</label>
                                            <input name="password" title="pass" type="password" class="input-text" required>
                                        </p>
                                        <p class="form-row">
                                            <span class="inline">
                                                <input type="checkbox" id="cb2" required>
                                                <label for="cb2" class="label-text">I agree to <span>Terms & Conditions</span></label>
                                            </span>
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="Register Now">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
