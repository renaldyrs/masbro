@extends('layouts.master-mini')

@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one"
    style="background-image: url({{ url('assets/images/auth/Regis.jpg') }}); background-size: cover;">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="d-flex justify-content-center mb-3 pb-1">

                        <span class="h1 fw-bold mb-0">Laundry MASBRO</span>
                    </div>
                    <div class="form-group">
                    <label class="label">Nama</label>
                        <div class="input-group">
                        <input type="hidden" name="role" value="1">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Nama" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="label">Email</label>
                        <div class="input-group">
                        
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="label">Password</label>
                        <div class="input-group">
                        
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="label">Confirm Password</label>
                        <div class="input-group">
                        
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group ">
                        <div class="col-3"></div>
                        <button class="btn btn-primary submit-btn btn-block col-6 justify-content-center">Register</button>
                    </div>

                    <div class="text-block text-center my-3">
                        <span class="text-small font-weight-semibold">Sudah punya akun ?</span>
                        <a href="{{ route('login') }}" class="text-black text-small">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection