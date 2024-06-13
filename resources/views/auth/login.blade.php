@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf

                        <div class="d-flex justify-content-center mb-3 pb-1">

                            <span class="h1 fw-bold mb-0">Laundry MASBRO</span>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6 ">
                                <div data-mdb-input-init class="form-outline col-mb-4 ">
                                    <label class="form-label" for="form2Example17">Email address</label>
                                    <input type="email" name="email" id="password" class="form-control form-control-lg"
                                        placeholder="Email address" @error('email') is-invalid @enderror />

                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg" placeholder="Password" @error('password')
                                        is-invalid @enderror />

                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="mb-3 col-2">
                                <button class="btn btn-dark btn-lg" type="submit">Login</button>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <p class="" style="color: #393f81;">Don't have an account? <a
                                        href="{{ route('register') }}" style="color: #393f81;">Register here</a></p>
                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection