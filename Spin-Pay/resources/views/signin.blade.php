@extends('layouts.header')
@include('layouts.header')
@push('title')
  <title>SpinPay | P2P Lending Platform</title>
@endpush
<div class="register-container-body">
<div class="navbar" style="height:12%">
    <div class="container">
      <div class="logo-container">
         SpinPay
      </div>
      <div class="menu-container">
        <h4><a href="#">register</a></h4>
     </div>
    </div>
</div>

<div class="register-main-body">
    <div class="alert alert-danger text-center" id="errorDiv" style="padding:0%;display:none"></div>
    <div class="container">
   <div class="login-main-div" style="height:100%;">
       <div class="login-container">
        <h3 id="login-heading">login</h3>
        <div class="inputDiv mt-4">
            <input type="text" id="useremail" name="useremail" placeholder="enter email" required>
        </div>

        <div class="inputDiv mt-4">
            <input type="password" id="password" name="password" placeholder="enter password" required>
        </div>

        <div class="inputDiv mt-4 text-center">
            <button class="btn capbtn" id="loginBtn" style="width:306px">join</button>
            <div class="loader mt-2" id="loginBtnLoader" style="display:none;float:right;margin-right:10%;"></div>
         </div>

       </div>
   </div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        function errormsg(str){
            $('#errorDiv').html(str);
              $('#errorDiv').css('display','block');
        }
        $('#loginBtn').click(function() {
            $("#password").val()=="" ? errormsg('password can not be empty') : password = $("#password").val();
            $("#useremail").val()=="" ? errormsg('email can not be empty') : useremail = $("#useremail").val();
            if(useremail != "" || password != ""){
                const getData = {
                    'email': useremail,
                    'password': password
                }
                $.ajax({
                    url:"/api/login",
                    type:"post",
                    dataType: "json",
                    data: getData,
                    beforeSend: function(){
                        // $('#joinSpinpayBtn').css('display','none');
                        // $('#joinBtnLoader').css('display','block');
                    },
                    success: function(result) {
                        console.log(result);
                        // if(result['status']==200){
                        //     $('#joinBtnLoader').css('display','none');
                        //     $('#otpSubmitDiv').css('display','block');
                        // }
                    }
                }); 
            }
        });

    });

</script>

@include('layouts.jsfiles')

@include('layouts.footer')