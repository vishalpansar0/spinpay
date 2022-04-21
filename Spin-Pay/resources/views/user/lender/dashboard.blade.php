@include('user.layout.navbar')
@extends('user.layout.header')
<div class="left-menu">
    <ul>
        <button class="loan" id="loan">Loan</button>
        <button class="request" id="request">Request</button>
        <button class="transaction" id="transaction">Transaction</button>
        <button class="profile" id="profile">Profile</button>
        <button class="documents" id="documents">Documents</button>
    </ul>
</div>

<div class="staticpage" id="abc">
    <span id="error"></span>
    {{-- <button class="applyforloan" id=applyforlaon>ApplyForLoan</button> --}}
    <div class="content" id="content">
        <span id="error"></span>
        <table class="table table-bordered table-dark" >
            <thead>
                <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">status</th>
                    <th scope="col">Repayment</th>
                </tr>
            </thead>
            <tbody id="content">

            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#loan').click(function() {
            // $('#loan').css('background-color', 'grey');
            // $('#loan').css('border-radius', '10px');
            // $('#loan').css('padding-left', '40px');
            $.ajax({
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    loan_id: 1,
                    user_id: 1
                },
                success: function(response) {
                    // var parsed_data = $.parseJSON(response);
                    // $('#content').html(parsed_data);
                    // $('#content').html(response[]);
                    var trHTML = '';
                    $.each(response['message'], function(i, item) {
                        // console.log(item.message.amount);
                        trHTML += '<tr style="color:white"><td>' + item.amount + '</td><td>' + item
                            .start_date + '</td><td>' + item.end_date +
                            '</td><td>' +
                                item.status +
                            '</td><td><button id="1">Repayment<button>' +
                            '</td></tr>';
                    });
                    $('#content').append(trHTML);
                    console.log(response);
                    $('#error').append(response);
                    console.log("Data Receving from laon table");
                }
            });
        });
        $('#request').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    loan_id: 1
                },
                success: function(response) {
                    // $('#something').html(response);
                    console.log("Data Receving from request table");
                }
            });
        });
        $('#transaction').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    loan_id: 1
                },
                success: function(response) {
                    // $('#something').html(response);
                    console.log("Data Receving from transaction table");
                }
            });
        });
        $('#profile').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    loan_id: 1
                },
                success: function(response) {
                    // $('#something').html(response);
                    console.log("Data Receving from profile table");
                }
            });
        });
        $('#documents').click(function() {
            $.ajax({
                url: 'http://localhost:8000/api/request/loandetails',
                type: 'POST',
                data: {
                    loan_id: 1
                },
                success: function(response) {
                    // $('#something').html(response);
                    console.log("Data Receving from documents table");
                }
            });
        });
    });
    // const applyforloan = document.getElementById('applyforlaon');
    // const loan = document.querySelector('.loan');
    // const request = document.querySelector('.request');
    // const transaction = document.querySelector('.transaction');
    // const profile = document.querySelector('.profile');
    // const docoments = document.querySelector('.docoments');
    // const staticpage = document.querySelector('.staticpage');
    // const conn = document.getElementById('abc');
    // applyforlaon.addEventListener('click', () => {
    //     conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>
</script>
