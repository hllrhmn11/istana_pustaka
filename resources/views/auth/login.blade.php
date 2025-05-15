@extends('layouts.app')

@section('title', 'Login / Register')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-sm" style="max-width: 480px; width: 100%; border-radius: 15px; background: #2d2d44;">
        <div class="card-body p-4">
            <ul class="nav nav-tabs mb-3" id="authTab" role="tablist" style="border-bottom-color: #ffeba7;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-warning" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-warning" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                </li>
            </ul>

            <div class="tab-content" id="authTabContent">
                {{-- LOGIN FORM --}}
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="email_login" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">Email</label>
                            <div class="col-md-6">
                                <input id="email_login" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password_login" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">Password</label>
                            <div class="col-md-6">
                                <input id="password_login" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check" style="color: #ffeba7;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="mb-0 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning w-100" style="font-weight: 600;">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- REGISTER FORM --}}
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="no_wa" class="col-md-4 col-form-label text-md-end" style="color: #ffeba7;">{{ __('No. Whatsapp') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-warning border-0">+62</span>
                                    <input id="no_wa" type="text" class="form-control" name="no_wa" required placeholder="81234567890" value="{{ old('no_wa') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning w-100" style="font-weight: 600;">{{ __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
