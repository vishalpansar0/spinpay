@push('title')
    <title>SpinPay | P2P Lending Platform</title>
@endpush
@push('style')
@endpush

@extends('layouts.header')
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
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="inputDiv">
                            <input type="text" name="address" id="address" placeholder="enter full address" required>
                            <small class="form-text text-muted">address should be as per in aadhar card.</small>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="inputDiv">
                            <input type="text" name="city" id="city" placeholder="city" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inputDiv">
                            <input type="text" name="state" id="state" placeholder="state" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inputDiv">
                            <input type="number" name="pincode" placeholder="pincode" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <select name="gender" id="gender" placeholder="Gender" required>
                                <option value="Gender">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputDiv">
                            <input type="date" name="dob" id="dob" placeholder="DOB" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="inputDiv">
                            <input type="file" id="image" placeholder="image" required>
                            <small class="form-text text-muted">upload image</small>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button class="submit">Proceed</button>
                </div>
            </div>


        </div>
    </div>
</div>
