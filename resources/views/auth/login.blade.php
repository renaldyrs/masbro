@extends('layouts.master-mini')
@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one"
    style="background-image: url({{ url('assets/images/auth/Regis.jpg') }}); background-size: cover;">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Login</h2>
            <div class="auto-form-wrapper">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="d-flex justify-content-center mb-3 pb-1">

                        <span class="h1 fw-bold mb-0">Laundry MASBRO</span>
                    </div>
                    <div class="form-group">
                        <label class="label">Email</label>
                        <div class="input-group">

                            <input type="email" name="email" id="email" class="form-control " placeholder="Email"
                                @error('email') is-invalid @enderror />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <div class="input-group">

                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="*********" @error('password') is-invalid @enderror />

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    

                    

                    <div class="input-group">
                        <div class="col-3"></div>
                        <button class="btn btn-primary submit-btn btn-block col-6">Login</button>
                    </div>


                    <div class="text-block text-center my-3">
                        <span class="text-small font-weight-semibold">Not a member ?</span>
                        <a href="{{ route('register') }}" class="text-black text-small">Create new account</a>
                    </div>
                </form>
            </div>
            <ul class="auth-footer">
                <li>
                    <a href="#">Conditions</a>
                </li>
                <li>
                    <a href="#">Help</a>
                </li>
                <li>
                    <a href="#">Terms</a>
                </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
        </div>
    </div>
</div>

@endsection