@include('user.layout.navbar')
@extends('user.layout.header')
<div class="left-menu ">
    <ul>
        <button class="loan" id="loan">Loan</button>
        <button class="request" id="request">Request</button>
        <button class="transaction" id="transaction">Transaction</button>
        <button class="profile" id="profile">Profile</button>
        <button class="documents" id="documents">Documents</button>
    </ul>
</div>

<div class="staticpage" id="abc">

    <div class="content" id="content">
        <span id="error" style="color:white"></span>
        <table class="table table-bordered text-center table-dark">
            <thead>
                <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">status</th>
                    <th scope="col">Repayment</th>
                </tr>
            </thead>
            <tbody id="row">

            </tbody>
        </table>
    </div>


    {{-- Trnsaction Div --}}
    <div class="content" id="transaction-div">
        <span id="error" style="color:white"></span>
        <table class="table table-bordered  text-center table-dark">
            <thead>
                <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Transaction Date</th>
                </tr>
            </thead>
            <tbody id="transaction_row">

            </tbody>
        </table>
    </div>


    {{-- All Request Div --}}
    <div class="content" id="request-div" style="display: none;">
        <span id="error" style="color:white"></span>
        <table class="table table-bordered  text-center table-dark">
            <thead>
                <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tenure</th>
                    <th scope="col">Requested Date</th>
                    <th scope="col">Approved Date</th>
                </tr>
            </thead>
            <tbody id="request_row">

            </tbody>
        </table>
    </div>


    {{-- Profile Div --}}
    <div class="content text-center" id="profilediv" style="color:white;">
        <div class="row">
            <div class="col-4">
                <div id="photo-container">

                </div>
            </div>
            <div class="col-8" style="color:white; padding-top: 60px;" id="details">

            </div>
        </div>
        <div class="row" id="down">
            <div class="col-4 text-center" style="color:white;" id="age-div">
                <h2>AGE</h2>
            </div>
            <div class="col-4 text-center" style="color:white;" id="gender-div">
                <h2>GENDER</h2>
            </div>
            <div class="col-4 text-center" style="color:white;" id="location-div">
                 <h2>LOCATION</h2>
            </div>

        </div>

    </div>

</div>


<script>
    $(document).ready(function() {

        $('#loan').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    user_id: 1
                },
                success: function(response) {
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        $("#transaction-div").hide();
                        $("#request-div").hide();
                        $("#profilediv").hide();
                        $("#content").show();
                        $("#row").empty();
                        var trHTML = '';
                        $.each(response['message'], function(i, item) {
                            var date = new Date(item.start_date);
                            starting_date = date.getDate() + "/" + (date
                                .getMonth() + 1) + "/" + date.getFullYear();
                            var date2 = new Date(item.end_date);
                            ending_date = date2.getDate() + "/" + (date2
                                .getMonth() + 1) + "/" + date2.getFullYear();
                            trHTML += '<tr style="color:white"><td>$ ' + item
                                .amount + '</td><td>' + starting_date +
                                '</td><td>' + ending_date +
                                '</td><td>' +
                                item.status +
                                '</td><td><button onclick="repayment(' + item.id +
                                ')" id="' + i + '">Repayment<button>' +
                                '</td></tr>';
                            if (item.status == 'repaid') {
                                $('#0').attr("disabled", true);
                                console.log(item.status)
                                // $('#' + i).css('background-color', 'red');
                            }
                            // console.log('#' + i); 
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
                success: function(response) {
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        $("#content").hide();
                        $("#request-div").hide();
                        $("#profilediv").hide();
                        $("#transaction-div").show();
                        $("#transaction_row").empty();
                        var trHTML = '';
                        $.each(response['message'], function(i, item) {
                            var date = new Date(item.created_at);
                            created = date.getDate() + "/" + (date.getMonth() + 1) +
                                "/" + date.getFullYear();
                            trHTML += '<tr style="color:white"><td>$ ' + item
                                .amount + '</td><td>' + item
                                .type + '</td><td>' + created + '</td></tr>';
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
                success: function(response) {
                    if (response['status'] != 200) {
                        alert('We are facing some issue please try later');
                    } else {
                        isapproved = "-";
                        $("#content").hide();
                        $("#transaction-div").hide();
                        $("#profilediv").hide();
                        $("#request-div").show();
                        $("#request_row").empty();
                        var trHTML = '';
                        $.each(response['message'], function(i, item) {
                            if (item.status == 'approved') {
                                var date2 = new Date(item.updated_at);
                                isapproved = date2.getDate() + "/" + (date2
                                    .getMonth() + 1) + "/" + date2.getFullYear();
                            }
                            var date = new Date(item.created_at);
                            let created = date.getDate() + "/" + (date.getMonth() +
                                1) + "/" + date.getFullYear();

                            trHTML += '<tr style="color:white"><td>$ ' + item
                                .amount + '</td><td>' + item
                                .status + '</td><td>' + item
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
                url: 'http://localhost:8000/api/ShowUsersDetails',
                type: 'GET',
                data: {
                    id: 2
                },
                success: function(response) {
                    if (response['status'] == 500) {

                    } else {
                        $("#content").hide();
                        $("#transaction-div").hide();
                        $("#request-div").hide();
                        $("#profilediv").show();
                        $("#details").empty();
                        $("#age-div").empty();
                        $("#gender-div").empty();
                        $("#location-div").empty();
                        $("#photo-container").empty();
                        var details = '<h1>Personal Details</h1><h3>' + response[0].name +
                            '</h3>' +
                            '<h3>' + response[0].email + '</h3>' +
                            '<h3>' + response[0].phone + '</h3>' +
                            '<h3>' + response[0].address_line + '</h3>' +
                            '<h3>' + response[0].pincode + '</h3>';
                        $('#details').append(details);
                        var a= '<h1>AGE</h1>';
                        $('#age-div').append(a);
                        var age = '<h3>' + response[0].age + '</h3>';
                        $('#age-div').append(age);
                        var b= '<h1>GENDER</h1>';
                        $('#gender-div').append(b);
                        var gender = '<h3>' + response[0].gender + '</h3>';
                        $('#gender-div').append(gender);
                        var c= '<h1>LOCATION</h1>';2
                        $('#location-div').append(c);
                        var location = '<h3>' + response[0].city + '</h3>';
                        $('#location-div').append(location);

                        var image =
                            '<img width="350" height="350" style="border-radius:50%;background-color:rgb(64, 105, 64)">';
                        $('#photo-container').append(image);
                        var down = "";
                        // console.log(details);

                    }
                }
            });
        });
        $('#documents').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/ShowUsersDetails',
                type: 'GET',
                data: {
                    id: 1
                },
                success: function(response) {
                    console.log(response[0]);
                }
            });
        });
    });

    function repayment(id) {
        $.ajax({
            url: 'http://localhost:8000/api/loanrepayment',
            type: 'POST',
            data: {
                loan_id: 1
            },
            success: function(response) {
                $('#0').attr("disabled", true);
                // $('#0' ).css('background-color', 'green');
                $('#0').css({
                    'background-color': 'green',
                    'height': '35px',
                    'border-radius': '40px',
                    'color':'white',
                    'padding-left': '20px',
                    'padding-right': '20px'
                });
                console.log(response);
            }
        });
    }
</script>
