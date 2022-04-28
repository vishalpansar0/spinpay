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
    </div>
    <div class="right-container toggleContainerCSS" id="rightContainer">
        <button id="closeSideNavbar" style="border:none;background-color:rgb(37, 37, 37);color:white">hide</button>
        <button id="showSideNavbar"
            style="display: none;border: none;background-color:rgb(37, 37, 37);color:white">Show</button>
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
                    <h5 style="color:#f27a72;margin-top:10px;font-family: myFirstFont;">CREDIT SCORE</h5>
                    <P>700</P>
                </div>
                <div class="CreditPoint text-center" id="CreditPoint">
                    <h5 style="color:#f27a72;margin-top:10px;font-family: myFirstFont;">CREDIT LIMIT</h5>
                    <P>300</P>
                </div>
            </div>
            <div class="applyBtn-div" id="applyBtn-div">
                <div class="applyBtn-message" style="margin-left: 50px">
                    <h5>APPLY FOR A NEW LAON</h5>
                    <p>Start for a new loan</p>
                </div>
                <div class="applyBtn" id="applyBtn">
                    <button id="btn">
                        START LOAN
                    </button>
                </div>
            </div>
            <div class="heading" id="heading">
                <h5>DISBURSED APPLICATION</h5>
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
                            <th scope="col">REPAY</th>
                        </tr>
                    </thead>
                    <tbody id="lastLoan-row">
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Loan Apply Div --}}
        <div class="loanApply-div" id="loanApply-div" style="display: none;font-family: myFirstFont;margin-top:20px">
            <div class="container" style="width: 800px">
                <div class="alert alert-danger" id="errorMsg" role="alert" style="display:none">
                </div>
                <div class="alert alert-success" id="successMsg" role="alert" style="display:none">
                </div>
                <div class="inputDiv">
                    <label for="amount" style="color: white">Please Enter Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="enter amount" required>
                    <small class="form-text text-muted">Amount should be in multiple of 100.</small>
                </div>
                <div class="inputDiv">
                    <label for="month" style="color:white">Please Enter Duration</label>
                    <input type="number" id="month" name="month" placeholder="enter duration" required>
                    <small class="form-text text-muted">Duration should be in multiple of month.</small>
                </div>
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
                        <th scope="col">STATUS</th>
                        <th scope="col">TENURE</th>
                        <th scope="col">APPLY DATE</th>
                        <th scope="col">APPROVED DATE</th>
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
                        <th scope="col">REPAY</th>
                    </tr>
                </thead>
                <tbody id="row">

                </tbody>
            </table>
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
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="modalerror">

                            </div>
                            <form id="documentsReUploads">
                                <input type="text" name="document_number" id="document_input" required>
                                <input type="file" name="document_image" id="document_input_image" required>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="display: none" id="close" onclick="closeButton()">Close</button>
                                    <button type="submit" class="btn btn-primary" id="documentUpload">Upload</button>
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
                <div id="photo-container" style="margin-left:250px;margin-top:70px">

                </div>
            </div>
            <div class="col-8" style="color:white; padding-top: 5; padding:left:50px" id="details">

            </div>
        </div>
        <div class="row" id="down" style="margin-top: 60px;">
            <div class="col-4 text-center" style="color:#576deb;" id="age-div">
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
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    user_id: 1
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
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        $('#dashboard-div').hide();
                        $('#loanApply-div').hide();
                        $("#transaction-div").hide();
                        $("#request-div").hide();
                        $("#profile-div").hide();
                        $("#document-div").hide();
                        $("#loan-div").show();
                        $("#row").empty();
                        $("#detailHeading").empty();
                        var hd = 'Status of all the taken loan';
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
                                '</td><td><button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick="repayment(' +
                                item.id +
                                ',' + i +
                                ')" id="' + i + '" ' + buttonDisbaled +
                                '>PAY NOW<button>' +
                                '</td></tr>';
                        });
                        $('#row').append(trHTML);
                    }
                }
            });
        });

        $('#transaction').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/transactiondetails',
                type: 'POST',
                data: {
                    user_id: 3
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
                    // console.log(response);
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        $('#dashboard-div').hide();
                        $("#loan-div").hide();
                        $('#loanApply-div').hide();
                        $("#request-div").hide();
                        $("#profile-div").hide();
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
                            if (item.status == "failed") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:red;">Failed</span>';
                            }
                            if (item.status == "successfull") {
                                statustr =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:green;">Success</span>';
                            }
                            trHTML += '<tr style="color:white"><td>' +
                                transactionid + '</td><td>$ ' + item
                                .amount + '</td><td>' +
                                statustr + '</td><td>' + created + '</td></tr>';
                        });
                        $('#transaction_row').append(trHTML);
                    }
                }
            });
        });
        $('#request').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/allrequest',
                type: 'POST',
                data: {
                    user_id: 4
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
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
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
                        var hd = 'Total raised request for laon by me'
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
                            let statusCSS = "";
                            if (item.status == 'pending')
                                statusCSS =
                                '<span style="padding:5px 15px;border-radius:1000px;background-color:yellow;color:black">Peding</span>';
                            if (item.status == 'approved') {
                                statusCSS =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:green;">Approved</span>';
                            }
                            if (item.status == 'rejected') {
                                statusCSS =
                                    '<span style="padding:5px 15px;border-radius:1000px;background-color:red;">Rejected</span>';
                            }
                            trHTML += '<tr style="color:white"><td>' + requestid +
                                '</td><td>$ ' + item
                                .amount + '</td><td>' +
                                statusCSS + '</td><td>' + item
                                .tenure + ' month</td><td>' + created +
                                '</td><td>' + isapproved + '</td></tr>';
                        });
                        $('#request_row').append(trHTML);
                    }
                }
            });
        });
        $('#profile').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/showuserdetails',
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
                        $("#details").empty();
                        $("#age-div").empty();
                        $("#gender-div").empty();
                        $("#location-div").empty();
                        $("#photo-container").empty();
                        $("#detailHeading").empty();
                        var hd = 'Profile Details'
                        // $('#detailHeading').append(hd);
                        var details =
                            '<h1 style = "color:goldenrod ">Personal Details</h1><h3 style = "padding-left:100px;color:#d267f0">' +
                            response[0].name +
                            '</h3>' +
                            '<h3 style = "padding-left:100px;color:#d267f0">' + response[0]
                            .email +
                            '</h3>' +
                            '<h3 style = "padding-left:100px; color:#d267f0">' + response[0]
                            .phone +
                            '</h3>' +
                            '<h3 style = "padding-left:100px;color:#d267f0">' + response[0]
                            .address_line +
                            '</h3>' +
                            '<h3 style = "padding-left:100px;color:#d267f0">' + response[0]
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
                        var path = '{{asset("storage")}}/';
                        var pfeimage =
                            '<img src="'+path+response[0].image +
                            '" alt="Profile Image" width="225" height="225" style="border-radius:50%;">';
                        $('#photo-container').append(pfeimage);
                        var down = "";
                        console.log(response[0].image );
                    }
                }
            });
        });
        $('#documents').click(function() {
            // console.log("hola");
            $('#dashboard-div').hide();
            $("#loan-div").hide();
            $('#loanApply-div').hide();
            $("#request-div").hide();
            $("#profile-div").hide();
            $("#transaction-div").hide();
            $("#document-div").show();
            $("#detailHeading").empty();
            $("#document_row").empty();
            var hd = 'Document Details';
            $('#detailHeading').append(hd);
            $.ajax({
                url: 'http://localhost:8000/api/showuserdetails',
                type: 'GET',
                data:{
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
                    console.log(response[1]);
                    var details = {};
                    var documentcheck = {
                        one: false,
                        two: false,
                        threeone: false,
                        threetwo: false,
                        threethree: false,
                        four: false
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
                        if (item.master_document_id == 4) {
                            documentcheck.four = true;
                            details.name = "Bank Statement";
                            details.number = "SPINPAYOO12E" + item.document_number;
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
                        if (item.master_document_id == 3) {
                            if (item.document_number == 31) {
                                documentcheck.threeone = true;
                                details.name = "Pay Slip-1";
                                details.number = "SPINPAYOO12E" + item
                                    .document_number;
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
                            if (item.document_number == 32) {
                                documentcheck.threetwo = true;
                                details.name = "Pay Slip-2";
                                details.number = "SPINPAYOO12E" + item
                                    .document_number;
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
                            if (item.document_number == 33) {
                                documentcheck.threethree = true;
                                details.name = "Pay Slip-3";
                                details.number = "SPINPAYOO12E" + item
                                    .document_number;
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
                        }
                        // console.log(details);

                        let button =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" disabled>Re-Upload</button>';
                        if (details.status == 'Rejected') {
                            button =
                                '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                                item.master_document_id + '\'' + ',' + '\'' + item
                                .document_number + '\')">Re-Upload</button>';
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
                    if (documentcheck.one == false) {
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            1 + '\'' + ',' + '\'' + 1 + '\')">Re-Upload</button>';
                        trHTML +=
                            '<tr style="color:white"><td>Aadhar Card</td><td>-</td><td>Not Uploaded</td><td>' +
                            reupload + '</td></tr>';
                    }
                    if (documentcheck.two == false) {
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            2 + '\'' + ',' + '\'' + 2 + '\')">Re-Upload</button>';
                        trHTML +=
                            '<tr style="color:white"><td>Pan Card</td><td>-</td><td>Not Uploaded</td><td>' +
                            reupload + '</td></tr>';
                    }
                    if (documentcheck.threeone == false) {
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            3 + '\'' + ',' + '\'' + 31 + '\')">Re-Upload</button>';
                        trHTML +=
                            '<tr style="color:white"><td>Pay Slip-1</td><td>-</td><td>Not Uploaded</td><td>' +
                            reupload + '</td></tr>';
                    }
                    if (documentcheck.threetwo == false) {
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            3 + '\'' + ',' + '\'' + 32 + '\')">Re-Upload</button>';
                        trHTML +=
                            '<tr style="color:white"><td>Pay Slip-2</td><td>-</td><td>Not Uploaded</td><td>' +
                            reupload + '</td></tr>';
                    }
                    if (documentcheck.threethree == false) {
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            3 + '\'' + ',' + '\'' + 33 + '\')">Re-Upload</button>';
                        trHTML +=
                            '<tr style="color:white"><td>Pay Slip-3</td><td>-</td><td>Not Uploaded</td><td>' +
                            reupload + '</td></tr>';
                    }
                    if (documentcheck.four == false) {
                        var reupload =
                            '<button style="border-radius:10px;border:none; width:100px;height:27px;background-color:rgb(67, 181, 216)" onclick = "DocumentReupload(\'' +
                            4 + '\'' + ',' + '\'' + 41 + '\')">Re-Upload</button>';
                        trHTML +=
                            '<tr style="color:white"><td>Bank Statement</td><td>-</td><td>Not Uploaded</td><td>' +
                            reupload + '</td></tr>';
                    }
                    $('#document_row').append(trHTML);
                    // console.log(trHTML);

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
            var month = $("#month").val()
            var amount = $("#amount").val()
            $('#errorMsg').hide();
            $('#successMsg').hide();
            $.ajax({
                url: 'http://localhost:8000/api/request/loan',
                type: 'POST',
                data: {
                    tenure: month,
                    amount_request: amount,
                    user_id: 37

                },
                success: function(response) {
                    // console.log(response);
                    console.log(response['status']);
                    if (response['status'] == 500) {
                        alert('We are facing some issue please try later');
                    }
                    if (response['status'] == 400) {
                        $('#errorMsg').show();
                        $('#errorMsg').html(response['message']);
                    }
                    if (response['status'] == 401) {
                        let errors = "";
                        let t = 0;
                        $('#errorMsg').show();
                        if (response['Validation Failed']['amount_request']) {
                            // console.log('amount error');
                            errors += response['Validation Failed']['amount_request'];
                            t += 1;
                        }
                        if (response['Validation Failed']['tenure']) {
                            // console.log('tenure error');
                            errors += response['Validation Failed']['tenure'];
                            t += 1;
                        }
                        if (t == 2) {
                            $('#errorMsg').html("Fields Cannot Be empty");
                        } else {
                            $('#errorMsg').html(errors);
                        }

                    }
                    if (response['status'] == 200) {
                        $('#successMsg').show();
                        $('#successMsg').html(
                            'Your laon request is raised please waite till approvred');
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
        $('#documentUpload').click(function(event) {
            event.preventDefault();
            let apiurl = $('#apiurl').text();
            let documentNumber = $('#documentNumber').text();
            let MasterdocumentNumber = $('#MasterdocumentNumber').text();

            // console.log(documentNumber);
            let upload = new FormData(document.getElementById('documentsReUploads'));
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
                    } else {
                        $('#modalerror').append(result['message']);
                    }
                }
            });
        });


    });

    function repayment(id, btid) {
        console.log(id, btid);
        $.ajax({
            url: 'http://localhost:8000/api/loanrepayment',
            type: 'POST',
            data: {
                loan_id: id
            },
            success: function(response) {
                // console.log(btid, response)
                $("#" + btid).attr("disabled", true);
                console.log(response);
            }
        });
    }

    function DocumentReupload(master_document_id, document_number) {
        $('#document_input').css('display', 'block')
        // console.log(master_document_id, " ", document_number);
        let heading = "";
        let url = "";
        let document;
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
            '</p><p style="display:none" id="documentNumber"' + '>' + document +
            '</p><p style="display:none" id="MasterdocumentNumber"' + '>' + master_document_id + '</p>';
        $('#exampleModalLabel').html(heading);
        $('#modalerror').append(ptag)
        $('#modalid').click();
    }

    function closeButton() {
        $('#documents').click();
    }
</script>
