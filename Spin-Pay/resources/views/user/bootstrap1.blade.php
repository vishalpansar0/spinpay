{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @stack('css')
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


    @extends('agent.agentLayouts.header')
@include('agent.agentLayouts.header')
@push('title')
    <title>Agent Dashboard</title>
@endpush

<div class="navbar">
    <div class="main-logo-head">
        SpinPay
    </div>
    <div class="nav-menu">
        <a href="">Vishal Sharma </a>&nbsp;&nbsp;&nbsp;
        <a href=""> Logout</a>
    </div>
</div>

<div class="main-container">
    <div class="row text-center p-4" style="background-color: #17202A">
        <div class="col-sm-3">
            <button class="capbtn" id="allUserBtn">All Users</button>
        </div>
        <div class="col-sm-3">
            <button class="capbtn" id="pendingUsersBtn">Pending Users</button>
        </div>
        <div class="col-sm-3">
            <button class="capbtn" id="userQueriesBtn">Users Queries</button>
        </div>
        <div class="col-sm-3">
            <button class="capbtn" id="Btn">Some Btn</button>
        </div>

    </div>

    <div class="row text-center" id="filterDiv">
        <div class="col-sm-3" style="font-size:30px">
            Apply Filters:
        </div>
        <div class="col-sm-9">
            <div class="inputDiv">
                <h5>
                    <small class="form-text"
                        style="color:white;margin-left:15px;margin-top:10px;position:absolute;top:160px;">choose
                        role:</small>
                    <button class="register-role-btn-left reg-role-btn" id="lenderRole">lender</button><button
                        class="register-role-btn-right reg-role-btn" id="borrowerRole">borrower</button>&nbsp;&nbsp;
                    <small class="form-text"
                        style="color:white;margin-left:15px;margin-top:10px;position:absolute;top:160px;">from
                        date:</small>
                    <input type="date" id="fromDate">&nbsp;&nbsp;
                    <small class="form-text"
                        style="color:white;margin-left:15px;margin-top:10px;position:absolute;top:160px;">to
                        date:</small>
                    <input type="date" id="toDate" value="@php
                        echo date('Y-m-d');
                    @endphp">&nbsp;&nbsp;
                    <input type="text" id="searchFilter" placeholder="enter user's name or email" required>&nbsp;&nbsp;
                    <button class="capbtn" id="applyFilterBtn">Search</button>
                </h5>
            </div>
        </div>
        <div class="alert alert-danger text-center" id="errorDiv" style="padding:0%;display:none"></div>

    </div>

    <div class="row text-center" style="color:white;background-color:#17202A;justify-content:center">
        <div class="col-4 mt-4">
            <h3>Users Details </h3>
        </div>

        {{-- <div class="col-4 mt-4">{{ $users->links('vendor.pagination.customLinks') }}</div> --}}

    </div>


    <div class="table-container" id="allUsers">
        <table class="table table-dark text-center users-table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        @if ($user->role_id == 3)
                            <td><span
                                    style="padding:5px 15px;border-radius:1000px;background-color:#3498DB;">Lender</span>
                            </td>
                        @else
                            <td><span style="padding:5px 15px;border-radius:1000px;background-color:#E74C3C;">Borrower
                            </td>
                        @endif
                        <td><button class="actionbtn" id="pendingUsersBtn">view</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="table-container" >
        <table class="table table-dark text-center users-table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody id="records_table">
                
            </tbody>
        </table>

    </div>


    <div id="page-links" style="background-color: #17202A;padding:10px">
        <div class="row">
            <div class="offset-9 col-sm-3">
                {{ $users->links('vendor.pagination.customLinks') }}
            </div>
        </div>
    </div>
    <div class="loader-container" id="loader-container" style="width: 100%;">
        <div>
            <div class="row">
                <div class="loader mt-4"></div>
            </div>
            <div class="row mt-3" style="margin-left:15.5px">
                loading...
            </div>
        </div>
    </div>
</div>


<script>
    let role = 0;
    $('#lenderRole').on('click', function() {
        if (role == 0) {
            $('#errorDiv').css('display', 'none');
        }
        if (role == 3) {
            role = 0;
            $('#lenderRole').css('background-color', 'white');
        } else {
            role = 3;
            $('#borrowerRole').css('background-color', 'white');
            $('#lenderRole').css('background-color', '#138D75');
        }
    });
    $('#borrowerRole').on('click', function() {
        if (role == 0) {
            $('#errorDiv').css('display', 'none');
        }
        if (role == 4) {
            role = 0;
            $('#borrowerRole').css('background-color', 'white');
        } else {
            role = 4;
            $('#errorDiv').css('display', 'none');
            $('#lenderRole').css('background-color', 'white');
            $('#borrowerRole').css('background-color', '#138D75');
        }
        // $("#allUsers").empty();
    });

    $(document).ready(function() {
        function errormsg(str) {
            $('#errorDiv').html(str);
            $('#errorDiv').css('display', 'block');
        }

        $('#applyFilterBtn').click(function() {
            $("#fromDate").val() == "" ? fromDate = "0000-00-00" : fromDate = $("#fromDate").val();
            $("#toDate").val() == "" ? toDate = "0000-00-00" : toDate = $("#toDate").val();
            $("#searchFilter").val() == "" ? searchInput = "" : searchInput = $("#searchFilter").val();
            if (fromDate == "" && toDate == "" && searchInput == "" && role == 0) {
                errormsg('apply at least one filter!');
            } else {
                const getData = {
                    'toDate': toDate,
                    'fromDate': fromDate,
                    'searchInput': searchInput,
                    'role': role,
                    'status': "all",
                };
                $.ajax({
                    url: "/api/AllLenRoBorr",
                    type: "post",
                    dataType: "json",
                    data: getData,
                    beforeSend: function() {
                        $('#allUsers').css('display', 'none');
                        $('#page-links').css('display', 'none');
                        $('#loader-container').css('display', 'block');
                    },
                    success: function(response) {
                        console.log(response[0]['name']);
                        var trHTML = '';
                        $.each(response, function(i, item) {
                            trHTML += '<tr><td>' + item.name + '</td><td>' 
                                +'</td><td>' + item.email + '</td></tr>';
                        });
                        $('#records_table').append(trHTML);
                    }
                });
            }
        });
    });
</script> --}}
