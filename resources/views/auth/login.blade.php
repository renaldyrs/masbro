@extends('layouts.master-mini')

<section class="content" style="background-image: url({{ url('assets/images/auth/bg-login.jpg') }});">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="d-flex justify-content-center mb-3 pb-1">

                                <span class="h1 fw-bold mb-0">Laundry MASBRO</span>
                            </div>
                            <div class="form-group">
                                <label class="label content" for="email">Email</label>
                                <div class="input-group">

                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" @error('email') is-invalid @enderror />
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
                                <a href="{{ route('register') }}" class="text-black text-small">Create new
                                    account</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>