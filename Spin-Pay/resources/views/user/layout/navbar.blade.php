@include('user.layout.header')
@extends('user.layout.header')
@push('title')
  <title>SpinPay | P2P Lending Platform</title>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
@endpush

<nav class="navbar navbar-expand-lg navbar-dark" style = "background-color:#101010">
  <div class="container-fluid">
    <img src="{{ url('/images/borrower-lender.png') }}" alt="UploadingError" width="70" height="70">
    <a class="navbar-brand" href="#">SpinPay</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Arvind
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul> 
        </li>
      </ul>
      <h4 style="margin-right: 10px; color:white;">Arvind Kumar</h4>
      <p style="margin-right: 10px; color:white;">Logout</p>
      {{-- <img src="{{ url('/images/userlogo.png') }}" alt="UploadError" width="60" height="60"> --}}
      {{-- <button type="button" class="btn btn-dark">logout</button> --}}
      </div>
  </div>
</nav>
<hr style="margin: 0;padding:0; height:5px; background-color:green">