@include('bootstrap')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/signup.css') }}">
    <div class="container-m">
        <div class="left-align">
            <div class="logo">
                <img src="{{ asset('/images/spinpay-removebg.png') }}" alt="spinpaylogo">
            </div>
            <div class="registration-form">
                <form>
                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your Name</label>

                            <input type="text" class="form-control" placeholder="John">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your email address</label>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                            <input type="Email" class="form-control" placeholder="john@gmail.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Create Your Password</label>
                            <input type="password" class="form-control" placeholder="*********">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="*********">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your Mobile Number</label>
                            <input type="number" class="form-control" placeholder="123456789">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your Date of Birth</label>
                            <input type="date" class="form-control" placeholder="DD/MM/YYYY">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your Age</label>
                            <input type="number" class="form-control" placeholder="23">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Please Select Your Gender</label>
                            <select class="form-control" name="gender">
                                <option type="radio">...</option>
                                <option type="radio">Male</option>
                                <option type="radio">Female</option>
                                <option type="radio">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your Complete Address</label>
                            <input type="textarea" class="form-control" placeholder="Full Address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your City</label>
                            <input type="text" class="form-control" placeholder="Example-Bengaluru">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter your State</label>
                            <input type="text" class="form-control" placeholder="Example-Karnataka">
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Continue</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
