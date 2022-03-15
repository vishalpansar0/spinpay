@extends('layouts.header')
@include('layouts.header')
@push('title')
    <title>SpinPay | P2P Lending Platform</title>
@endpush
<div class="register-container-body">
    <div class="navbar" style="height:12%">
        <div class="container">
            <div class="logo-container">
                SpinPay
            </div>
            <div class="menu-container">
                <h4><a href="/signin">login</a></h4>
            </div>
        </div>
    </div>

    <div class="register-main-body">
        <div class="alert alert-danger text-center" id="errorDiv" style="padding:0%;display:none"></div>
        <div class="container reg-div-1">
            <div>
                <div class="row">
                    <h3 class="mt-5" style="font-family:myFirstFont;color:white">join as
                        a&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="register-role-btn-left reg-role-btn" id="lenderRole">lender</button><button
                            class="register-role-btn-right reg-role-btn" id="borrowerRole">borrower</button>
                    </h3>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <input type="text" id="username" placeholder="enter full name" required>
                            <small class="form-text text-muted">name should be as per in aadhar card.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <input type="email" placeholder="enter email" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <input type="password" placeholder="create a new password" required>
                            <small class="form-text text-muted">password should contain at least 8 characters.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputDiv">

                            <input type="tel" placeholder="enter mobile number" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <input type="password" placeholder="confirm your password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <button class="btn capbtn" id="verifyEmailBtn" style="float:right">verify email</button>
                            <div class="loader mt-2" id="emailVerLoader"
                                style="display:none;float:right;margin-right:10%;"></div>
                        </div>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <input class="text-center" id="first" style="color:white"
                                        onkeyup="movetoNext(this, 'second',1)" type="text" maxlength="1">
                                </div>
                                <div class="col-md-3">
                                    <input class="text-center" id="second" style="color:white" type="text"
                                        onkeyup="movetoNext(this, 'third',2)" maxlength="1">
                                </div>
                                <div class="col-md-3">
                                    <input class="text-center" id="third" style="color:white" type="text"
                                        onkeyup="movetoNext(this, 'fourth',3)" maxlength="1">
                                </div>
                                <div class="col-md-3">
                                    <input class="text-center" id="fourth" style="color:white" type="text"
                                        onkeyup="movetoNext(this, 'fourth',4)" maxlength="1">
                                </div>

                            </div>
                            <small class="form-text text-muted">an OTP has been sent to your email, enter here.</small>
                        </div>
                    </div>
                    <div>
                        <button></button>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

@include('layouts.footer')
