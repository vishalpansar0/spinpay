@include('user.layout.navbar')
@extends('user.layout.header')
@include('user.layout.header')

<div class="main-container" style="" id="main-container">
    <div class="left-container" id="leftContainer" style="transition:all .4s ease">
        <div class="ul"><button class="navbarBtn" id="dashboard">DASHBOARD</button></div>
        <div class="ul"><button class="" id="loan">LOAN</button></div>
        <div class="ul"><button class="" id="request">REQUEST</button></div>
        <div class="ul"><button class="" id="transaction">TRANSACTION</button></div>
        <div class="ul"><button class="" id="profile">PROFILE</button></div>
        <div class="ul"><button class="" id="documents">DOCUMENTS</button></div>
        <div class="ul"><button class="" id="anyquery">ANY QUERY</button></div>
    </div>
    <div class="right-container toggleContainerCSS" id="rightContainer">
        <button id="closeSideNavbar" style="border:none;background-color:rgb(37, 37, 37);color:white"><i
                class="fa-solid fa-eye-slash"></i></button>
        <button id="showSideNavbar" style="display: none;border: none;background-color:rgb(37, 37, 37);color:white"><i
                class="fa-solid fa-eye"></i></button>
        <span class="detailHeading" id="detailHeading"
            style="color:white;font-family: myFirstFont; margin-left:400px;font-size:30px;font-weight: bold;">
        </span>
        {{-- Dashboard --}}
        <div class="dashboard-div" id="dashboard-div" id="dashboard-div">
            <div class="credits" id="credits">
                {{-- <div class="summary-div" id="summary-div" style="width:800px">
                    <img src="" alt="">
                </div> --}}
                <div class="creditScore text-center" id="creditScore">
                    <h1 style="color:#f27a72;margin-top:10px;font-family: myFirstFont;"><i style=""
                            class="fa-solid fa-wallet"></i></h1>
                    <P style="color:white">700</P>
                </div>
                {{-- <div class="CreditPoint text-center" id="CreditPoint">
                    <h5 style="color:#f27a72;margin-top:10px;font-family: myFirstFont;">CREDIT POINT</h5>
                    <P>10000</P>
                </div> --}}
            </div>
            <div class="applyBtn-div" id="applyBtn-div">
                <div class="applyBtn-message" style="margin-left: 50px">
                    <h5>ADD MONEY TO LOAN</h5>
                    <p>Add money safely</p>
                </div>
                <div class="applyBtn" id="applyBtn">
                    <button id="btn">
                        Add Money
                    </button>
                </div>
            </div>
            <div class="heading" id="heading">
                <h5>LAST GIVEN LOAN</h5>
            </div>
            <div class="tableContnet" style="color:white; padding:0px;font-family: myFirstFont;" id="lastLoan">
                <table class="table text-center table-dark" id="dashboardTable">
                    <thead>
                        <tr>
                            <th scope="col">APPLICATION ID</th>
                            <th scope="col">LOAN AMOUNT</th>
                            <th scope="col">LOAN START DATE</th>
                            <th scope="col">LOAN DUE DATE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">TO USER</th>
                        </tr>
                    </thead>
                    <tbody id="lastLoan-row">
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Add Money Div --}}
        <div class="loanApply-div" id="loanApply-div" style="display: none;font-family: myFirstFont;margin-top:20px">
            <div class="container" style="width: 800px">
                <div class="alert alert-danger" id="errorMsg" role="alert" style="display:none">
                </div>
                <div class="alert alert-success" id="successMsg" role="alert" style="display:none">
                </div>
                <div class="inputDiv">
                    <label for="amount" style="color: white">Please Enter Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="enter amount" required>
                    {{-- <small class="form-text text-muted">Amount should be in multiple of 100.</small> --}}
                </div>
                {{-- <div class="inputDiv">
                    <label for="month" style="color:white">Please Enter Duration</label>
                    <input type="number" id="month" name="month" placeholder="enter duration" required>
                    <small class="form-text text-muted">Duration should be in multiple of month.</small>
                </div> --}}
                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
            </div>
        </div>

        {{-- Trnsaction Div --}}
        <div class="transaction-div" id="transaction-div"
            style="display: none;font-family: myFirstFont;margin-top:20px">
            <span id="error" style="color:white"></span>
            <table class="table text-center table-dark">
                <thead>
                    <tr>
                        <th scope="col">TRANSACTION ID</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">Type</th>
                        <th scope="col">TRANSACTION DATE</th>
                    </tr>
                </thead>
                <tbody id="transaction_row">

                </tbody>
            </table>
        </div>

        {{-- All Request Div --}}
        <div class="request-div" id="request-div" style="display: none;font-family: myFirstFont;margin-top:20px">
            <table class="table text-center table-dark">
                <thead>
                    <tr>
                        <th scope="col">REQUEST ID</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">TENURE</th>
                        <th scope="col">APPLY DATE</th>
                        <th scope="col">USER DETAILS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody id="request_row">

                </tbody>
            </table>
        </div>

        {{-- All-loans --}}
        <div class="loan-div" id="loan-div" style="display: none;font-family: myFirstFont; margin-top:20px">
            <span id="error" style="color:white"></span>
            <table class="table  text-center table-dark">
                <thead>
                    <tr>
                        <th scope="col">APPLICATION ID</th>
                        <th scope="col">LOAN AMOUNT</th>
                        <th scope="col">LOAN START DATE</th>
                        <th scope="col">LOAN DUE DATE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">TO USER</th>
                    </tr>
                </thead>
                <tbody id="row">

                </tbody>
            </table>
        </div>

        {{-- any query from the user --}}
        <div class="anyquery" id="query-div" style="display: none;font-family: myFirstFont;margin-top:20px">
            <div id="querybtn" style="display: flex">
                <h3 style="color:#0af7e8;margin-left:20px">If you have any concern raise a query</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalquery"
                    data-whatever="@mdo" id="borrowerquery" style="margin-left: auto">ASK QUERY</button>
            </div>
            <div class="allquery" id="allquery" style="margin-top: 50px">
                <table class="table text-center table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ISSUE ID</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">CONCERN</th>
                            <th scope="col">REPLY</th>
                            <th scope="col">RIASED TIME </th>
                            <th scope="col">REPLY TIME</th>
                        </tr>
                    </thead>
                    <tbody id="query_row">

                    </tbody>
                </table>

            </div>
            <div class="modal fade" id="exampleModalquery" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Raise A Query</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="error">

                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Category</label>
                                    <input type="text" class="form-control" id="category-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Issue</label>
                                    <textarea class="form-control" id="issue-text" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                id="closequery">Close</button>
                            <button type="button" class="btn btn-primary" id="submitquery">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Documents --}}
        <div class="document-div" id="document-div" style="display: none;font-family: myFirstFont;margin-top:20px">
            <span id="error" style="color:white"></span>
            <table class="table text-center table-dark">
                <thead>
                    <tr>
                        <th scope="col">Document</th>
                        <th scope="col">Document Number</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">OPTION</th>
                    </tr>
                </thead>
                <tbody id="document_row">

                </tbody>
            </table>


            <!-- Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="modalid"
                style="display: none">
                Launch demo modal
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div id="lenderdocsuploadkre"></div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="lenderdocuments">
                                <input type="text" name="document_number" id="document_input" required>
                                <input type="file" name="document_image" id="document_input_image" required>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="display: none" id="close">Close</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="documentUploadlender">Upload</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Profile Div --}}
    <div class="profile-div" id="profile-div" style="color:white; display: none;font-family: myFirstFont;">
        <div class="row">
            <div class="col-4">
                <div id="photo-container" style="margin-left:300px;margin-top:70px">

                </div>
            </div>
            <div class="col-8" style="color:white; padding-top: 5; padding:left:50px" id="details">

            </div>
        </div>
        <div class="row" id="down" style="margin-top: 60px;">
            <div class="col-4 text-center" style="color:#576deb" id="age-div">
                <h3>AGE</h3>
            </div>
            <div class="col-4 text-center" style="color:#576deb" id="gender-div">
                <h3>GENDER</h3>
            </div>
            <div class="col-4 text-center" style="color:#576deb" id="location-div">
                <h3>LOCATION</h3>
            </div>

        </div>
    </div>

    {{-- Borrower Profile Modal --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModale" id="borrowerdetails"
        style="display: none">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Borrower Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="display: none" id="PassingRequestID"></p>
                    <div id="basicdetails" style="display:flex">
                        <div id="borrower_name" style=" margin-left:80px;width:250px">
                            <h5>Name</h5>
                            <p id="ModalBname">Sathwik</p>
                        </div>
                        <div id="borrower_gender" style="width:250px">
                            <h5>Gender</h5>
                            <p id="ModalBgender">Male</p>
                        </div>
                        <div id="borrower_location">
                            <h5>Location</h5>
                            <p id="ModalBcity">Banglore</p>
                        </div>
                    </div>
                    <div id=basicdetails style="display:flex;" style="margin-top: 20px">
                        <div id="borrower_state" style="margin-left:80px;width:250px">
                            <h5>State</h5>
                            <p id="ModalBstate">700</p>
                        </div>
                        <div id="borrower_totalloan" style="width:250px">
                            <h5>Total Loan</h5>
                            <p id="ModalBtotal">300</p>
                        </div>
                        <div id="borrower_laoanstatus">
                            <h5>Repaid</h5>
                            <p id="ModalBrepaid">Male</p>
                        </div>
                    </div>

                    <div id=basicdetails style="display:flex;" style="margin-top: 20px">
                        <div id="borrower_creditScore" style="margin-left:80px;width:250px">
                            <h5>Credit Score</h5>
                            <p id="ModalBcreditscore">700</p>
                        </div>
                        <div id="borrower_creditlimit" style="">
                            <h5>Credit Limit</h5>
                            <p id="ModalBcreditlimit">300</p>
                        </div>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- Borrower give loan --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModala" id="giveloan"
        style="display: none">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Gateway</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 250px">
                    <div style="height:100px">
                        <h1>This is temporaray payment gateway</h1>
                    </div>
                    <p style="display: none;" id="PassingRequestID"></p>
                    <div class="alert alert-danger" role="alert" id="low_amount_error_message" style="display: none">
                    </div>
                    <p id="check"></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display: none "
                        id="modalhiddenloanapprove">Close</button>
                    <button type="button" class="btn btn-primary" id="completePayment">Complete Payment</button>
                </div>
            </div>
        </div>
    </div>

</div>



{{-- Script Code --}}

<script>
    $(document).ready(function() {
        $('#dashboard').click(function() {
            $("#transaction-div").hide();
            $("#request-div").hide();
            $('#loanApply-div').hide();
            $("#profile-div").hide();
            $("#document-div").hide();
            $("#query-div").hide();
            $("#loan-div").hide();
            $('#dashboard-div').show();
            $('#dashboard').addClass('navbarBtn');
            $('#loan').removeClass('navbarBtn');
            $('#transaction').removeClass('navbarBtn');
            $('#profile').removeClass('navbarBtn');
            $('#documents').removeClass('navbarBtn');
            $('#request').removeClass('navbarBtn');
            $("#detailHeading").empty();
        });

        $('#loan').click(function() {
            $.ajax({
                url: '/api/lenderloan',
                type: 'POST',
                data: {
                    lender_id: 4
                },
                beforeSend: function() {
                    $('#loan').addClass('navbarBtn');
                    $('#dashboard').removeClass('navbarBtn');
                    $('#transaction').removeClass('navbarBtn');
                    $('#profile').removeClass('navbarBtn');
                    $('#documents').removeClass('navbarBtn');
                    $('#request').removeClass('navbarBtn');
                },
                success: function(response) {
                    console.log(response);
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        $('#dashboard-div').hide();
                        $('#loanApply-div').hide();
                        $("#transaction-div").hide();
                        $("#request-div").hide();
                        $("#profile-div").hide();
                        $("#document-div").hide();
                        $("#query-div").hide();
                        $("#loan-div").show();
                        $("#row").empty();
                        $("#detailHeading").empty();
                        var hd = 'Total Given Loans'
                        $('#detailHeading').append(hd);
                        var trHTML = '';
                        $.each(response['message'], function(i, item) {
                            let status = "";
                            if (item.status == 'ongoing')
                                status =
                                '<span style="padding:5px 15px;border-radius:1000px;background-color:yellow; color:black">Ongoing</span>';
                            let buttonDisbaled = "";
                            if (item.status == 'overdue') {
                                status =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:red;">Overdue</span>';
                            }
                            if (item.status == 'repaid') {
                                status =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:green;">Repaid </span>';
                                buttonDisbaled = "disabled";
                            }
                            let applicationid = "SPINPAYOO12E" + item.id;
                            var date = new Date(item.start_date);
                            starting_date = date.getDate() + "/" + (date
                                .getMonth() + 1) + "/" + date.getFullYear();
                            var date2 = new Date(item.end_date);
                            ending_date = date2.getDate() + "/" + (date2
                                .getMonth() + 1) + "/" + date2.getFullYear();
                            trHTML += '<tr style="color:white"><td>' +
                                applicationid + '</td><td>$ ' + item
                                .amount + '</td><td>' + starting_date +
                                '</td><td>' + ending_date +
                                '</td><td>' +
                                status +
                                '</td><td>' + "username" + '</td></tr>';
                        });
                        $('#row').append(trHTML);
                    }
                }
            });
        });

        $('#transaction').click(function() {
            $.ajax({
                // url: 'http://localhost:8000/api/request/transactiondetails',
                url: '/api/lendertransaction',
                type: 'POST',
                data: {
                    lender_id: 3
                },
                beforeSend: function() {
                    $('#transaction').addClass('navbarBtn');
                    $('#dashboard').removeClass('navbarBtn');
                    $('#loan').removeClass('navbarBtn');
                    $('#profile').removeClass('navbarBtn');
                    $('#documents').removeClass('navbarBtn');
                    $('#request').removeClass('navbarBtn');
                },
                success: function(response) {
                    console.log(response['status']);
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        $('#dashboard-div').hide();
                        $("#loan-div").hide();
                        $('#loanApply-div').hide();
                        $("#request-div").hide();
                        $("#profile-div").hide();
                        $("#query-div").hide();
                        $("#document-div").hide();
                        $("#transaction-div").show();
                        $("#transaction_row").empty();
                        $("#detailHeading").empty();
                        var hd = 'All the transaction'
                        $('#detailHeading').append(hd);

                        var trHTML = '';
                        $.each(response['message'], function(i, item) {
                            let transactionid = "SPINPAYOO12E" + item.id;
                            var date = new Date(item.created_at);
                            created = date.getDate() + "/" + (date.getMonth() + 1) +
                                "/" + date.getFullYear();
                            let statustr = "";
                            let statustype = "";
                            if (item.status == "failed") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:red;">Failed</span>';
                            }
                            if (item.status == "successfull") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:green;">Success</span>';
                            }
                            if (item.type == "disburse") {
                                statustype =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:red;">Disbursed</span>';
                            }
                            if (item.type == "repayed") {
                                statustype =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:green;">Repayed</span>';
                            }
                            if (item.type == "self") {
                                statustype =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:yellow;color:black">Self</span>';
                            }
                            trHTML += '<tr style="color:white"><td>' +
                                transactionid + '</td><td>$ ' + item
                                .amount + '</td><td>' +
                                statustr + '</td><td>' + statustype + '</td><td>' +
                                created + '</td></tr>';
                        });
                        $('#transaction_row').append(trHTML);
                    }
                }
            });
        });
        $('#request').click(function() {
            $.ajax({
                url: '/api/lenderrequest',
                type: 'POST',
                data: {
                    lender_id: 47
                },
                beforeSend: function() {
                    $('#request').addClass('navbarBtn');
                    $('#dashboard').removeClass('navbarBtn');
                    $('#loan').removeClass('navbarBtn');
                    $('#transaction').removeClass('navbarBtn');
                    $('#profile').removeClass('navbarBtn');
                    $('#documents').removeClass('navbarBtn');
                },
                success: function(response) {
                    if (response['status'] == 300) {
                        alert('Profile Verification Pending');
                        // console.log(response);
                    } else if (response['status'] != 200) {
                        alert('We Are Facing Tetcnical Issue')
                    } else {
                        isapproved = "-";
                        $('#dashboard-div').hide();
                        $('#loanApply-div').hide();
                        $("#loan-div").hide();
                        $("#transaction-div").hide();
                        $("#profile-div").hide();
                        $("#document-div").hide();
                        $("#request-div").show();
                        $("#request_row").empty();
                        $("#detailHeading").empty();
                        var hd = 'All request raised by borrower';
                        $('#detailHeading').append(hd);
                        var trHTML = '';

                        $.each(response['message'], function(i, item) {
                            let requestid = "SPINPAYOO12E" + item.id;
                            if (item.status == 'approved') {
                                var date2 = new Date(item.updated_at);
                                isapproved = date2.getDate() + "/" + (date2
                                    .getMonth() + 1) + "/" + date2.getFullYear();
                            }
                            var date = new Date(item.created_at);
                            let created = date.getDate() + "/" + (date.getMonth() +
                                1) + "/" + date.getFullYear();
                            trHTML += '<tr style="color:white"><td>' + requestid +
                                '</td><td>$ ' + item
                                .amount + '</td><td>' + item
                                .tenure + ' month</td><td>' + created +
                                '</td><td>' +
                                '<button style="border-radius:15px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "ViewDetails(\'' +
                                item.user_id + '\')">viewdetails</button>' +
                                '</td><td>' +
                                '<button style="border-radius:15px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "GiveLoan(\'' +
                                item.id + '\')">aprove <button>' +
                                '</td></tr>';
                        });
                        $('#request_row').append(trHTML);
                        console.log(response);
                    }
                }
            });
        });
        $('#profile').click(function() {
            $.ajax({
                url: '/api/showuserdetails',
                type: 'GET',
                data: {
                    id: 47
                },
                beforeSend: function() {
                    $('#profile').addClass('navbarBtn');
                    $('#request').removeClass('navbarBtn');
                    $('#dashboard').removeClass('navbarBtn');
                    $('#loan').removeClass('navbarBtn');
                    $('#transaction').removeClass('navbarBtn');
                    $('#documents').removeClass('navbarBtn');
                },
                success: function(response) {
                    console.log(response);
                    if (response['status'] == 500) {
                        alert('We are facing some issue please try later');
                    } else {
                        $('#dashboard-div').hide();
                        $("#loan-div").hide();
                        $("#transaction-div").hide();
                        $("#request-div").hide();
                        $('#loanApply-div').hide();
                        $("#profile-div").show();
                        $("#document-div").hide();
                        $("#query-div").hide();
                        $("#details").empty();
                        $("#age-div").empty();
                        $("#gender-div").empty();
                        $("#location-div").empty();
                        $("#photo-container").empty();
                        $("#detailHeading").empty();
                        var hd = 'Profile Details'
                        // $('#detailHeading').append(hd);
                        var details =
                            '<h1 style = "color:goldenrod; margin-left:100px">Personal Details</h1><h3 style = "padding-left:200px;color:#d267f0">' +
                            response[0].name +
                            '</h3>' +
                            '<h3 style = "padding-left:200px;color:#d267f0">' + response[0]
                            .email +
                            '</h3>' +
                            '<h3 style = "padding-left:200px; color:#d267f0">' + response[0]
                            .phone +
                            '</h3>' +
                            '<h3 style = "padding-left:200px;color:#d267f0">' + response[0]
                            .address_line +
                            '</h3>' +
                            '<h3 style = "padding-left:200px;color:#d267f0">' + response[0]
                            .pincode +
                            '</h3>';
                        $('#details').append(details);
                        var a = '<h1>AGE</h1>';
                        $('#age-div').append(a);
                        var age = '<h3 style = "color:white">' + response[0].age + '</h3>';
                        $('#age-div').append(age);
                        var b = '<h1>GENDER</h1>';
                        $('#gender-div').append(b);
                        var gender = '<h3 style = "color:white">' + response[0].gender +
                            '</h3>';
                        $('#gender-div').append(gender);
                        var c = '<h1>LOCATION</h1>';
                        2
                        $('#location-div').append(c);
                        var location = '<h3 style = "color:white">' + response[0].city +
                            '</h3>';
                        $('#location-div').append(location);

                        var pfeimage =
                            '<img src="' + '{{ asset('storage') }}/' + response[0].image +
                            '" alt="Profile Image" width="225" height="225" style="border-radius:50%;">';
                        $('#photo-container').append(pfeimage);
                        var down = "";

                    }
                }
            });
        });
        $('#documents').click(function() {
            $.ajax({
                url: '/api/showuserdetails',
                type: 'GET',
                data: {
                    id: 46
                },
                beforeSend: function() {
                    $('#documents').addClass('navbarBtn');
                    $('#request').removeClass('navbarBtn');
                    $('#dashboard').removeClass('navbarBtn');
                    $('#loan').removeClass('navbarBtn');
                    $('#transaction').removeClass('navbarBtn');
                    $('#profile').removeClass('navbarBtn');
                },
                success: function(response) {
                    console.log('documnet');
                    if (response['status'] == 500) {
                        alert('We are facing issue please try')
                    } else {
                        $('#dashboard-div').hide();
                        $("#loan-div").hide();
                        $('#loanApply-div').hide();
                        $("#request-div").hide();
                        $("#profile-div").hide();
                        $("#transaction-div").hide();
                        $("#query-div").hide();
                        $("#document-div").show();
                        $("#detailHeading").empty();
                        $("#document_row").empty();
                        var hd = 'All the Documnets';
                        $('#detailHeading').append(hd);
                        console.log(response[1]);
                        var details = {};
                        var documentcheck = {
                            one: false,
                            two: false,
                        }
                        var trHTML = "";
                        $.each(response[1], function(i, item) {
                            if (item.master_document_id == 1) {
                                documentcheck.one = true;
                                details.name = "Adharcard Card";
                                details.number = item.document_number;
                                if (item.is_verified == 'approved') {
                                    details.status = "Approved";
                                }
                                if (item.is_verified == 'reject') {
                                    details.status = "Rejected";
                                }
                                if (item.is_verified == 'pending') {
                                    details.status = "Pending";
                                }

                            }
                            if (item.master_document_id == 2) {
                                documentcheck.two = true;
                                details.name = "Pan Card";
                                details.number = item.document_number;
                                if (item.is_verified == 'approved') {
                                    details.status = "Approved";
                                }
                                if (item.is_verified == 'reject') {
                                    details.status = "Rejected";
                                }
                                if (item.is_verified == 'pending') {
                                    details.status = "Pending";
                                }
                            }

                            let button =
                                '<button style="border-radius:15px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" disabled>reupload</button>';
                            if (details.status == 'Rejected') {
                                button =
                                    '<button style="border-radius:15px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                                    item.master_document_id +
                                    '\')">reupload</button>';
                                // console.log(details);
                            }
                            statustr = '';
                            if (details.status == "Approved") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:green;">' +
                                    details.status + '</span>';
                            }
                            if (details.status == "Rejected") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:red;">' +
                                    details.status + '</span>';
                            }
                            if (details.status == "Pending") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:yellow;color:black">' +
                                    details.status + '</span>';
                            }
                            trHTML += '<tr style="color:white"><td>' +
                                details.name + '</td><td> ' +
                                details.number + '</td><td>' +
                                statustr + '</td><td>' + button + '</td></tr>';
                        });
                        // console.log(documentcheck);
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            1 + '\'' + ',' + '\'' + 1 + '\')">reupload</button>';
                        if (documentcheck.one == false) {
                            trHTML +=
                                '<tr style="color:white"><td>Aadhar Card</td><td>-</td><td>Not Uploaded</td><td>' +
                                reupload + '</td></tr>';
                        }
                        if (documentcheck.two == false) {
                            var reupload =
                                '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                                2 + '\'' + ',' + '\'' + 2 + '\')">reupload</button>';
                            trHTML +=
                                '<tr style="color:white"><td>Pan Card</td><td>-</td><td>Not Uploaded</td><td>' +
                                reupload + '</td></tr>';
                        }
                        // if (documentcheck.threeone == false) {
                        //     trHTML +=
                        //         '<tr style="color:white"><td>Pay Slip-1</td><td>-</td><td>Not Uploaded</td><td>' +
                        //         reupload + '</td></tr>';
                        // }
                        // if (documentcheck.threetwo == false) {
                        //     trHTML +=
                        //         '<tr style="color:white"><td>Pay Slip-2</td><td>-</td><td>Not Uploaded</td><td>' +
                        //         reupload + '</td></tr>';
                        // }
                        // if (documentcheck.threethree == false) {
                        //     trHTML +=
                        //         '<tr style="color:white"><td>Pay Slip-3</td><td>-</td><td>Not Uploaded</td><td>' +
                        //         reupload + '</td></tr>';
                        // }
                        // if (documentcheck.four == false) {
                        //     trHTML +=
                        //         '<tr style="color:white"><td>Bank Statement</td><td>-</td><td>Not Uploaded</td><td>' +
                        //         reupload + '</td></tr>';
                        // }
                        $('#document_row').append(trHTML);
                        // console.log(trHTML);
                    }
                }
            });
        });
        $('#btn').click(function() {
            $("#transaction-div").hide();
            $("#request-div").hide();
            $("#profile-div").hide();
            $("#loan-div").hide();
            $('#dashboard-div').hide();
            $('#loanApply-div').show();
            // $.ajax({
            //     url: 'http://localhost:8000/api/ShowUsersDetails',
            //     type: 'GET',
            //     data: {
            //         id: 1
            //     },
            //     success: function(response) {
            //         console.log(response);
            //     }
            // });
        });
        $('#submitBtn').click(function() {
            var amount = $("#amount").val()
            $('#errorMsg').hide();
            $('#successMsg').hide();
            console.log(amount);
            $.ajax({
                url: '/api/addmoney',
                type: 'POST',
                data: {
                    'amount': amount,
                    'user_id': 3

                },
                success: function(response) {
                    console.log(response);
                    console.log(response['status']);
                    if (response['status'] == 500) {
                        alert('We are facing some issue please try later');
                    }
                    if (response['status'] == 401) {
                        // console.log(response);
                        $('#errorMsg').show();
                        $('#errorMsg').html(response['Validation Failed']['amount']);
                    }
                    if (response['status'] == 400) {
                        // console.log(response);
                        $('#errorMsg').show();
                        $('#errorMsg').html(response['message']);
                    }
                    if (response['status'] == 200) {
                        $('#successMsg').show();
                        $('#successMsg').html('Money added Successfully');

                    }
                }
            });
        });
        $('#closeSideNavbar').click(function() {
            $("#leftContainer").hide();
            $('#rightContainer').removeClass('toggleContainerCSS');
            $('#closeSideNavbar').hide();
            $('#showSideNavbar').show();
        });
        $('#showSideNavbar').click(function() {
            $('#leftContainer').show();
            $('#rightContainer').addClass('toggleContainerCSS');
            $('#showSideNavbar').hide();
            $('#closeSideNavbar').show();
        });
        $('#logoutBtn').click(function() {

            window.location.href = "/";
            // window.location.replace("/");
        });




        // ReUploading Documents
        $('#documentUploadlender').click(function(event) {
            event.preventDefault();
            let apiurl = $('#apiurl').text();
            let documentNumber = $('#documentNumber').text();
            let MasterdocumentNumber = $('#MasterdocumentNumber').text();

            console.log(apiurl, '  ', MasterdocumentNumber);

            let upload = new FormData(document.getElementById('lenderdocuments'));
            upload.append('user_id', 46);
            upload.append('master_document_id', MasterdocumentNumber);

            $.ajax({
                url: apiurl,
                type: 'post',
                dataType: 'json',
                data: upload,
                processData: false,
                contentType: false,
                success: function(result) {
                    console.log(result);
                    // console.log(result['status']);
                    if (result['status'] == 200) {
                        $('#modalerror').empty();
                        $('#document_input_image').val('');
                        $('#document_input').val('');
                        $('#close').click();
                        $('#documents').click();
                    } else {
                        $('#modalerror').append(result['message']);
                    }
                }
            });
        });


        $('#borrowerdetails').click(function() {
            // console.log('modal button clicked');
            let userids = $('#PassingRequestID').text();
            // console.log()
            $.ajax({
                url: "/api/showborrower",
                type: 'POST',
                dataType: 'json',
                data: {
                    'user_id': userids
                },
                success: function(result) {
                    // console.log(result.message);
                    let ids = {
                        name: "#ModalBname",
                        gender: "#ModalBgender",
                        city: "#ModalBcity",
                        state: "#ModalBstate",
                        totalloan: "#ModalBtotal",
                        repaid: "#ModalBrepaid",
                        cscore: "#ModalBcreditscore",
                        climit: "#ModalBcreditlimit"
                    };
                    $(ids.name).html(result.message.basicInfo.name);
                    $(ids.gender).html(result.message.basicInfo.gender);
                    $(ids.city).html(result.message.basicInfo.city);
                    $(ids.state).html(result.message.basicInfo.state);
                    $(ids.cscore).html(result.message.basicInfo.credit_score);
                    $(ids.climit).html(result.message.basicInfo.credit_limit);
                    $(ids.totalloan).html(result.message.lenderloans.total);
                    $(ids.repaid).html(result.message.lenderloans.repaid);
                }
            });
        });



        $('#completePayment').click(function() {
            // console.log('modal button clicked');
            let userrequestids = $('#PassingRequestID').text();
            console.log(userrequestids)
            $.ajax({
                url: "/api/approveloan",
                type: 'POST',
                dataType: 'json',
                data: {
                    'lender_id': 46,
                    'request_id': userrequestids
                },
                success: function(result) {
                    $('#low_amount_error_message').show();
                    console.log(result);
                    $('#low_amount_error_message').html(result['message']);
                    // if(result['status']==500){
                    //     $('#low_amount_error_message').show();
                    //     $('#low_amount_e
                    // }
                    $('#modalhiddenloanapprove').click();
                    $('#request').click();

                }
            });
        });

        // query div
        $('#anyquery').click(function(event) {
            console.log('hello');

            $.ajax({
                url: '/api/raise/show',
                type: 'post',
                data: {
                    'user_id': 1
                },
                success: function(response) {
                    console.log(response);
                    if (response['status'] == 500) {
                        alert('We are facing issue please try later');
                    }
                    if (response['status'] == 200) {
                        $('#dashboard-div').hide();
                        $("#loan-div").hide();
                        $('#loanApply-div').hide();
                        $("#request-div").hide();
                        $("#profile-div").hide();
                        $("#transaction-div").hide();
                        $("#document-div").hide();
                        $("#query-div").show();
                        $('#query_row').empty();
                        let trHTML = "";
                        $.each(response['message'], function(i, item) {
                            var updated = "-";
                            let issueid = "SPINPAYOO12E" + item.id;
                            if (item.reply_message != null) {
                                let date2 = new Date(item.updated_at);
                                updated = date2.getDate() + "/" + (date2
                                        .getMonth() + 1) + "/" + date2
                                    .getFullYear();
                            }
                            console.log('hello');
                            var date = new Date(item.created_at);
                            let created = date.getDate() + "/" + (date
                                .getMonth() +
                                1) + "/" + date.getFullYear();
                            console.log('hi');
                            trHTML += '<tr style="color:white"><td>' + issueid +
                                '</td><td>$ ' + item
                                .category + '</td><td>' +
                                item.user_message + '</td><td>' + item
                                .reply_message + ' month</td><td>' + created +
                                '</td><td>' + updated + '</td></tr>';
                        });
                        $('#query_row').append(trHTML);
                        console.log('asjghad');
                    }

                }
            });

        });

        // submit querybfrom the user
        $('#submitquery').click(function(event) {
            $('#error').empty();
            event.preventDefault();
            let category = $('#category-name').val();
            let issue = $('#issue-text').val();
            if (category == "" || issue == "") {
                $('#error').append("<p style='color:red'>*Fields Cannot Be Empty</p>");
            } else {
                let raisequery = {
                    'user_id': 1,
                    'category': category,
                    'user_message': issue
                }
                $.ajax({
                    url: '/api/raise/query',
                    type: 'post',
                    data: raisequery,
                    success: function(response) {
                        if (response['status'] == 401) {
                            console.log(response);
                            let ptag = "<p style='color:red'>*" + response[
                                'Validation Failed'] + "</p>"
                            $('#error').append(ptag);
                        } else if (response['status'] != 200) {
                            let ptag = "<p style='color:red'>*" + response['message'] +
                                "</p>"
                            $('#error').append(ptag);

                        } else {
                            $('#closequery').click();
                            $('#anyquery').click();
                        }
                    }
                });

            }

        });



    });

    function ViewDetails(details) {
        // console.log(details);
        // console.log('check');apiurl,'  ',MasterdocumentNumber
        $('#PassingRequestID').html(details);
        $('#borrowerdetails').click();
        // $('#exampleModalLabel').html('for checking');
        // let ptag = "<p>"+details+"</p>";
        // $('#exampleModalLabel').append(ptag);
    }

    function repayment(id, btid) {
        // console.log(id, btid);
        $.ajax({
            url: '/api/loanrepayment',
            type: 'POST',
            data: {
                loan_id: id
            },
            success: function(response) {
                console.log(btid, response)
                $("#" + btid).attr("disabled", true);
                console.log(response);
            }
        });
    }

    function DocumentReupload(master_document_id, document_number) {
        // console.log(master_document_id," // ",document_number);
        $('#document_input').css('display', 'block')
        let heading = "";
        let url = "";
        // exampleModalLabel
        if (master_document_id == 1) {
            heading = "Aadhar Card";
            url = "http://localhost:8000/api/aadhar";

        }
        if (master_document_id == 2) {
            heading = "Pan Card";
            url = "http://localhost:8000/api/pancard";
        }

        let ptag = '<p style="display:none" id="apiurl"' + '>' + url +
            '</p><p style="display:none" id="documentNumber"' + '>' + document_number +
            '</p><p style="display:none" id="MasterdocumentNumber"' + '>' + master_document_id + '</p>';
        // console.log(ptag);
        $('#exampleModalLabel').html(heading);
        $('#lenderdocsuploadkre').append(ptag)
        $('#modalid').click();
    }


    function GiveLoan(details) {
        // console.log(details);
        $('#PassingRequestID').html(details);
        $('#giveloan').click();
    }
</script>
