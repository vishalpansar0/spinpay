@extends('agent.agentLayouts.header')
@include('agent.agentLayouts.header')
@push('title')
    <title>Admin Dashboard</title>
@endpush

<div class="navbar">
    <div class="main-logo-head">
        SpinPay
    </div>
    <div class="nav-menu">
        <a href="">{{Session::get('agent_name')}}</a>&nbsp;&nbsp;&nbsp;
        <a href="{{url('api/agentLogout')}}"> Logout</a>
    </div>
</div>

{{-- @php
    echo "<pre style='color:white'>";
    print_r($aadhar);
    echo '</pre>';
@endphp --}}
<div style="margin-top:70px">
    <div class="left-menu-div">
        <div class="menu-wrapper">

            <div class="menu-item-div active">
                <button class="m-btn"><i class="fas fa-user"></i><br>User</button>
            </div>

            {{-- Transactions --}}
            <div class="menu-item-div">
                <a href=><button class="m-btn"><i
                            class="fas fa-glass-cheers"></i><br> Transactions</button></a>
            </div>

            {{-- All Loans --}}
            <div class="menu-item-div">
                <a href=><button class="m-btn"><i
                            class="fas fa-users"></i><br> Loans </button></a>
            </div>

            {{-- All Requests --}}
            <div class="menu-item-div">
                <a href=><button class="m-btn"><i
                            class="fas fa-info-circle"></i><br> Requests </button></a>
            </div>

            {{-- Company transactions --}}
            <div class="menu-item-div">
                <a href=""><button class="m-btn"><i
                            class="fas fa-info-circle"></i><br> Requests </button></a>
            </div>


        </div>

    </div>
    <div class="right-main-div">

    </div>
</div>


