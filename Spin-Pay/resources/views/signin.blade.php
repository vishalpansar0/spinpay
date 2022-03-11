@include('bootstrap')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/signin.css') }}">
    <div class="container-s">
        <div class="left-align">
            <div class="logo">
                <img class="logo-img" src="{{ asset('/images/spinpay-removebg.png') }}" alt="">
            </div>
            <div class="login-form">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">enter your email address</label>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="john@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="********">
                    </div>
                    <button type="submit" class="btn btn-primary">Continue</button>
                </form>
            </div>
        </div>
        <div class="right-align">
        </div>
    </div>
    </body>

    </html>
