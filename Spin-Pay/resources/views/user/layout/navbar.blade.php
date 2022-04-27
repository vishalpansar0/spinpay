@include('user.layout.header')
@extends('user.layout.header')
@push('title')
    <title>SpinPay | P2P Lending Platform</title>
@endpush

<nav class="navbar fixed-top" style="background-color: #101010;height:55px;color:white">
    <div class="logo" style="margin-left:25px">
      <h3>SpinPay</h3>
    </div>
    <div style="display:flex">
    <div class="logout" style="color:white;padding:8px 25px">
      <h5>Sathwik</h5>
    </div> 
    <div class="logout" style="color:white">
      <button class="btn btn-outline-primary" id="logoutBtn">Logout</button>
    </div> 
  </div>
</nav>
