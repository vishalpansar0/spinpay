
@include('layouts.header')
<div class="navbar fixed-top" id="nav" style="background-color:black">
  <div class="container">
    <div class="logo-container">
      <a href="{{url('/')}}" style="text-decoration:none;color:white">SpinPay</a>
    </div>
    <div class="menu-container">
      <h4><a href="/signin">login</a></h4>
      {{-- <form action="{{ url('/logout') }}" method="post">
       @csrf
       <button>login</button></form> --}}
   </div>
  </div>
</div>
<div class="container" style="margin-top:120px">
<h1 style='text-align: center'>About Us</h1><br>
<div style='text-align: center'>
    <h5>We created this website for any individuals to obtain loans directly from other individuals, cutting out the financial institution as the middleman.</h5>
    <h5>Our website connects borrowers directly to lenders. The site sets the rates and terms and enables the transactions.</h5>
    <h5>Our motive is lenders who are individual investors want to get a better return on their cash savings than a bank savings account. And borrowers who need instant money.</h5>
</div>


<section class="team text-center py-5">
    <div class="container">
      <div class="header my-5">
        <h1>Meet our Team </h1>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="img-block mb-5">
            <img style="min-width:310px" src="https://lh3.googleusercontent.com/qCWcTQszDEQIGyZDkkAyd8lf04tHDaMHVIJDbwGo6jvaUHuH-OJU3lRO4AYI3ahD-sBV_kx8vkvBmPeic6fBWOpR8aHy0Eg9DHCeWlNETNJSMnW4B1TQL4RtBs7FZwOGlaZqSjuKDOYVMdvxwwhEOVR_HWWCPrPi12yFVQriVjXSfEjULQ5UsD-A-kY_w7mmpQkL-VvujdwcOuZOunD-ewwLa3ietdCAyNFRP-1502UKniOzlIKbAfYKzHd1iKYmV4HF63LzCML69EnHBcceL3m1OnPgh-EN7XHfDVkypj1cIPyE_bHi9vX9ckOaos6YNt9lp4zznO_On16y4eP7zJwUvt-OtvRj6COOQU9aEFpbvcERtRP41nmDkMUkyvAMel0vu_OQqy8iozXmKCFkMlH50Llky60h3DaCIQE9MUsjSNhfGEWBv6Z7bdZogFQYleEV1_YcNczU_e2BnPYiFXPXiD_2LnZLtcq-RYBgkkMhlJb-Amd-fEjKQX9YnXyp0f400hLJb4SvWnb5Ky26L9K28z8X2l1HDPJOhEVV7z1XisHnMPs97dqU-eO6D0JeevbsbfVLyRs1mzxY-EwpzVSfPwy8SCBrSXGEBPLSEuC86xSRkoNvHx8IJowrEj66lwLv2dsP1KcakCoJN7UMXiraIaJdFoJenb3gGmQfjizeMeoFJxHV3cPvELO9QsyyVPkgXoOyCa-qxjMLBAu2Su1M6wEsyMRXBgY6VKfaH_F9hCmxiCt5w0bmeSo=w425-h426-no?authuser=0" class="img-fluid  img-thumbnail rounded-circle" alt="image1">
            <div class="content mt-2">
              <h4>Vishal Sharma</h4>
              <p class="text-muted">Full Stack Web Developer</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ">
          <div class="img-block mb-5">
            <img src="https://lh3.googleusercontent.com/BFHuaK8DPVhklNV0BZ2Yi4_PcXtkf0QCuArXXZRBp6uYKg5GqwWztd4tWn6X_6luQe7euelgyxeIwTSi2sc2spluQWKdXiUPjfnnEa9sW6g0HF5_tBGSFWNHue0PKVq3CrpTh9gn3hXJWOI3XPEUXDmnpyx_mJv0QESnnFpVb7-WX8uEdBcLXFYxMe7SE053ma1xEq0m95D938f3YOhkfyOaP9fPG9wNPG-rw5ppD2xJ7kgZLWJijn1LjOvS3FDIX1W7tbgbQIC8YCf1WccN-mJYHt13KMbixq3fFU06HnMiQpZlTyr9dZDF40QYlRWV8Rdi6SkDuZiEitbwQZ5TWhzjM2LGVLO0UTobyITfElspx0L7mzuOrVXu__OQS6srIKLuKqZ1z71M4EIg4tOaQG5Pnw_YjeKVSoyiHSniqk9KWdzZgTbGtPq9Wo0vczJv70zQtm5ETW-TIAfGqnTQ9QsDE4ifEoIb6qozEH1YBp7GxkAClbrI4Sy-wKyBiYn1MqdBiRReeSGkbDzWrC4yaxqSwOjpAHrv1vsdCiK52SheSoP2rQyWCvvIcBJUWAJcC3SbYPs1S_p9PXOvCIyMdfm_nXJUv1Z6vwzOtb19USmAcLkdlGXp2hrLT-t-oIS066EeYPKJyp5fC5RlOg72M653r-K5swjtlUOq5E48h8vH827btA_ZsXZY8GaZOSZgabh7tcfd69lQJYLByiI3x_laywcOsDY48rdfNw8qJ2XFWpXOgnF_cY4SEtM=s811-no?authuser=0" class="img-fluid  img-thumbnail rounded-circle" alt="image1">
            <div class="content mt-2">
              <h4>Sathwik</h4>
              <p class="text-muted">Full Stack Web Developer</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="img-block mb-5">
            <img src="https://lh3.googleusercontent.com/lBIMMlVK6ntqi0ybBi1LDB3XhwBLPzmVDn_w-b8JQNH1_AboYNEVvCUJTC3qNsiGCmZIHju-Q97djzdRhX_GbEvm3AGmQvQGUGd1WR_2rIFMaPVzMhTWyvwaWyitcy4O7KN1P0nmm_brQOIPtx4I4jvBQcDPYzGBmx9uwiN8MuuKXhI9wVUK_KLsmb7SGEEyO9k5I26uHMSheZVEyS9Mi8ZFjotA7z6O6tBls1zRbkVr9ydeI5PbThPmV7vLQr-lWg62ZWIM8W5q0G2_J97uKvjTt_fyA7XWUlviaoBGWsH3iU7e7XHzemQT5Fe3pPmkIyDWkz_KyEzbeuIphVa7POV6EylA7nl22W3NANXCbOhcetwgszicMjazdTn9B-WdwRQiyzVohe4pr8_mQMH5QRJ_TVSMframyigTI87fu8bX6ntimXiNpOefXfznASBEw5J0k0TBoIRiBW3J_2Y5So76i8D3xuWuccGVe2pZKaVh_bW8-eUIfH2UFq0-FgW0_S5OD84R8Sj2GecsNcgFaAAVDaVGf_HfbAhud-OheXLWppBoH7c2mrvhbksvuD0Ku-6yXZfNvcoAQFiqsSTROjSKJfwR-DVUDPB5d4pqDeOGihs3EWJ-A0MM2BT_c-AxV3wVkaLIJqFq9wIlq9iy7eOgz2MF6Q7meeRYPoJSx9oQtKg1aFH7lRVwWda22XmhoRHp4THKY6i9GAaRGk2G0fy3IZg8QIzp-xXwBX4e4Dd9W9gg_gQMLtnYk1Q=s640-no?authuser=0" class="img-fluid  img-thumbnail rounded-circle" alt="image1">
            <div class="content mt-2">
              <h4>Abhishek Borana</h4>
              <p class="text-muted">Full Stack Web Developer</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="img-block mb-5">
            <img src="https://lh3.googleusercontent.com/n8XLq33u4Vnwmz4MY4yLm2xI6qIJBz-Wgouj3vXgODWrUVm6GZIj79Uki0pxl9UydunDYpgXEajVqIZ-MQmmeGPIrM1V_60HmL9VC2sNbSeBRMEhSGYX2bggvw5plVWLr7rcTT6MZ0T2TSJdZ_L5t1f6BZDjjTdb7tXZ5rk3jttBkVT7OGJlKnqKMiFcbWsLrC3EBK8ZvCwwwUVZAFBq2lG0qEmSubH0pqvXF6HjfDRfq4hOb-gXdBCJQeGT1V8hcEaZYEohwpbZeeEf3FMqrlYRrqqF7vK89n16UCWxTWljTIxdKJmrxjfNjAZpb3y9i_XwvOk_hfa34HqQlfLOkVEuzudw2LPxrrQ0EO4HAXa_b8cn7xxGvj4Zcw1-BkDY0t8lbdhQthlCYVzEYRZb252HcQSgbiPne20QpUlbxC4bGXwP7PNxF_EhPWprI8lh5Bat17OG0Zi04JS5KkHsNRTmoyk4cXUEY9cCfpheslalE7LDYz51UuRND5LxLUa571tH3NkP_yD0dA0gq1LsUgWvtuRcsepY7BMnRtqIToqNhhEZyj222_8jHmGkVUmW_W1aZyEnJtwZQLgMLRlCj3AKgEqKpE71RDHuzaH0dzaU84QyI3oFrRuh2lIPYFGsOYMqEXzt9-Z7ngFGOHV-trszUNprnk_Rae7ghrEuWTELgr9NW1iB3JeOIkHZxWuvYtBDqqmn6dV4ctPHcyZYFxKIWQ-CfyH2yaIFKKKy_i4JPvxUW8CpFLOklQI=w639-h640-no?authuser=0" class="img-fluid  img-thumbnail rounded-circle" alt="image1">
            <div class="content mt-2">
              <h4>Arvind Maurya</h4>
              <p class="text-muted">Full Stack Web Developer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
