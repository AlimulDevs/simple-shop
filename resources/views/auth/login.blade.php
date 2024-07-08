@extends('template.auth')

@section('content')
<div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{asset('assets/images/logo-icon.png')}}" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign In</div>
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Email">
                        <div class="form-control-position">
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Enter Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="icheck-material-white">
                            <input type="checkbox" id="user-checkbox" checked="" />
                            <label for="user-checkbox">Remember me</label>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-light btn-block">Sign In</button>




            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Do not have an account? <a href="/registerIndex"> Sign Up here</a></p>
    </div>
</div>

@endsection