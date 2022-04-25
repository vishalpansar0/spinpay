@extends('agent.agentLayouts.header')
@include('agent.agentLayouts.header')
@push('title')
    <title>Agent Dashboard</title>
@endpush

<div class="navbar fixed-top">
    <div class="main-logo-head">
        SpinPay
    </div>
    <div class="nav-menu">
        <a href="">Vishal Sharma </a>&nbsp;&nbsp;&nbsp;
        <a href=""> Logout</a>
    </div>
</div>
<div style="margin-top:70px">
    <div class="left-menu-div">
        <div class="menu-wrapper">

            <div class="menu-item-div active">
                <button class="m-btn"><i class="fas fa-user"></i><br>User</button>
            </div>

            <div class="menu-item-div">
                <button class="m-btn"><i class="fas fa-glass-cheers"></i><br> Transactions</button>
            </div>

            <div class="menu-item-div">
                <button class="m-btn"><i class="fas fa-users"></i><br> Loans </button>
            </div>

            <div class="menu-item-div">
                <button class="m-btn"><i class="fas fa-info-circle"></i><br> Requests </button>
            </div>


        </div>

    </div>
    <div class="right-main-div">
        @php
            echo '<pre style="color:white">';
    var_dump($user);
    echo '</pre>';
        @endphp
        {{-- docs view modal --}}
        <!-- Button trigger modal -->
        {{-- <button style="float:right;margin-top:7px;text-decoration:none;"
       data-bs-toggle="modal" data-bs-target="#newStorageAddModel">Forgot Password ?</button> --}}

        {{-- docs view modal ends --}}
        <div class="main-heading">
            Basic Details
        </div>

        <div style="display:flex;height:350px;padding:20px;">
            <div class="userImageContainer" style="width:20%">
                <img src="{{ url('/images/hands.jpg') }}" width="100%" style="border-radius: 10px">
            </div>
            <div class="userDataContainer" style="margin-left:2%;width:30%">
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        user name
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->name . ' (' . $user->gender . ')' }}
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        phone
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->phone }}
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        email
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->email }}
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        address
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->address_line . ' ' . $user->city . ' ' . $user->state . ' ' . $user->pincode }}
                    </div>
                </div>
            </div>
            <div class="userDataContainer" style="margin-left:2%;width:20%">
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        age
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->age }}
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        date of birth
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->dob }}
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        joining date
                    </div>
                    <div style="color:white;font-size:24px">
                        {{ $user->created_at }}
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        role
                    </div>
                    <div style="color:white;font-size:24px">

                        @if ($user->role_id == 3)
                            <span style="color:green">Lender</span>
                            
                        @else
                            <span style="color:blue">Borrower</span>
                            
                        @endif
                    </div>
                </div>
            </div>

            <div class="userDataContainer" style="margin-left:2%;width:25%">
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        status
                    </div>
                    <div style="color:white;font-size:24px">
                        
                        @if ($user->status == "pending")
                        <span style="color:orange;">pending</span>
                        
                    @elseif($user->status == "approved")
                    <span style="color:green;">approved</span>
                    @else
                    <span style="color:red;">rejected</span>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        credit limit
                    </div>
                    <div style="color:white;font-size:24px">
                        <span style="color:aqua;">{{ $user->credit_limit }}</span>
                    </div>
                </div>
                <div>
                    <div class="sub-headings" style="color:grey;font-size:18px">
                        loan status
                    </div>
                    <div style="color:white;font-size:24px">
                        <span style="color:red;">due: 20 may 2022</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="main-heading">
            Documents Details
        </div>

        <div style="display:flex;padding:20px;">
            <div class="userImageContainer"
                style="width:32%;height:100%;margin-left:1%;padding:10px;border:1px solid white;border-radius:10px">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="400px"
                    style="border-radius: 10px" />
                <div style="margin-left:10px">
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Type: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            Aadhar
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Status: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            <span style="color:green">approved</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px">Doc number: </div>
                        <div class="col-6" style="color:aqua;font-size:18px">
                            1234-1234-1234-1234
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#newStorageAddModel"
                                style="width:100%">View</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-success"
                                style="width:100%">Approve</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-warning"
                                style="width:100%">Reject</button></div>

                    </div>

                </div>
            </div>
            <div class="userImageContainer"
                style="width:32%;height:100%;margin-left:1%;padding:10px;border:1px solid white;border-radius:10px">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="400px"
                    style="border-radius: 10px" />
                <div style="margin-left:10px">
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Type: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            Aadhar
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Status: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            <span style="color:green">approved</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px">Doc number: </div>
                        <div class="col-6" style="color:aqua;font-size:18px">
                            1234-1234-1234-1234
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-primary"
                                style="width:100%">View</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-success"
                                style="width:100%">Approve</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-warning"
                                style="width:100%">Reject</button></div>

                    </div>

                </div>
            </div>
            <div class="userImageContainer"
                style="width:32%;height:100%;margin-left:1%;padding:10px;border:1px solid white;border-radius:10px">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="400px"
                    style="border-radius: 10px" />
                <div style="margin-left:10px">
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Type: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            Aadhar
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Status: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            <span style="color:green">approved</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px">Doc number: </div>
                        <div class="col-6" style="color:aqua;font-size:18px">
                            1234-1234-1234-1234
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-primary"
                                style="width:100%">View</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-success"
                                style="width:100%">Approve</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-warning"
                                style="width:100%">Reject</button></div>

                    </div>

                </div>
            </div>


        </div>

        <div class="main-heading">
            Payslips Details
        </div>

        <div style="display:flex;padding:20px;">
            <div class="userImageContainer"
                style="width:32%;height:100%;margin-left:1%;padding:10px;border:1px solid white;border-radius:10px">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="400px"
                    style="border-radius: 10px" />
                <div style="margin-left:10px">
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Type: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            Aadhar
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Status: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            <span style="color:green">approved</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px">Doc number: </div>
                        <div class="col-6" style="color:aqua;font-size:18px">
                            1234-1234-1234-1234
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-primary"
                                style="width:100%">View</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-success"
                                style="width:100%">Approve</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-warning"
                                style="width:100%">Reject</button></div>

                    </div>

                </div>
            </div>
            <div class="userImageContainer"
                style="width:32%;height:100%;margin-left:1%;padding:10px;border:1px solid white;border-radius:10px">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="400px"
                    style="border-radius: 10px" />
                <div style="margin-left:10px">
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Type: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            Aadhar
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Status: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            <span style="color:green">approved</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px">Doc number: </div>
                        <div class="col-6" style="color:aqua;font-size:18px">
                            1234-1234-1234-1234
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-primary"
                                style="width:100%">View</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-success"
                                style="width:100%">Approve</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-warning"
                                style="width:100%">Reject</button></div>

                    </div>

                </div>
            </div>
            <div class="userImageContainer"
                style="width:32%;height:100%;margin-left:1%;padding:10px;border:1px solid white;border-radius:10px">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="400px"
                    style="border-radius: 10px" />
                <div style="margin-left:10px">
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Type: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            Aadhar
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="color:white;font-size:24px">Status: </div>
                        <div class="col-6" style="color:aqua;font-size:24px">
                            <span style="color:green">approved</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px">Doc number: </div>
                        <div class="col-6" style="color:aqua;font-size:18px">
                            1234-1234-1234-1234
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-primary"
                                style="width:100%">View</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-success"
                                style="width:100%">Approve</button></div>
                        <div class="col-4" style="color:white;font-size:18px"><button class="btn btn-warning"
                                style="width:100%">Reject</button></div>

                    </div>

                </div>
            </div>


        </div>


    </div>
</div>
<!-- Add New Storage Modal -->
<div class="modal fade bd-example-modal-lg" id="newStorageAddModel" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="min-width:90vw ">
    <div class="modal-dialog modal-lg" style="min-width:90vw; ">
        <div class="modal-content" style="min-width:90vw;min-height:90vh">
            <div class="modal-header" style="min-width:90vw;">
                <h6 class="modal-title" id="staticBackdropLabel">Forgot Password?</h6>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" style="border:none;background:none;"><i
                        class="fas fa-times" style="color:blue;"></i></button>
            </div>
            <div class="modal-body" style="min-width:90vw;min-height:90vh">
                <embed src="{{ url('/images/payslip.pdf') }}" width="100%" height="1000px"
                    style="border-radius: 10px" />
            </div>
        </div>
    </div>
</div>


{{-- <p id="test111"></p> --}}
{{-- <button onclick="getData()">get data</button> --}}

@include('agent.agentLayouts.jsAgent')
@include('agent.agentLayouts.footer')
