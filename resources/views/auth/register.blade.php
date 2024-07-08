@extends('template.auth')

@section('content')
<div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{asset('assets/images/logo-icon.png')}}" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign Up</div>
            <form action="/mahasiswa/register" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="name" name="name" class="form-control input-shadow" placeholder="Enter Name">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nim" class="sr-only">NIM</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="nim" name="nim" class="form-control input-shadow" placeholder="Enter NIM">
                        <div class="form-control-position">
                            <i class="fas fa-id-card"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prodi" class="sr-only">Prodi</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="prodi" name="prodi" class="form-control input-shadow" placeholder="Enter Prodi">
                        <div class="form-control-position">
                            <i class="fas fa-university"></i>
                        </div>
                    </div>
                </div>
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
                <button type="submit" class="btn btn-light btn-block">Sign Up</button>




            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0"> have an account? <a href="/loginIndex"> Sign In here</a></p>
    </div>
</div>

@endsection