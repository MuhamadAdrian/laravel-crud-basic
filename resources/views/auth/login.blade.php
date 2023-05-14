@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div class="card" style="width: 26rem;">
        <div class="card-body">
            <h4 class="card-title mb-4 mt-1">Sign in</h4>
            <form method="post" action="/login">
                @csrf
                <div class="form-group">
                    <label>Your email</label>
                    <input name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" type="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> <!-- form-group// -->
                <div class="form-group">
                    <label>Your password</label>
                    <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="******"
                        type="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> <!-- form-group// -->
                <div class="form-group">
                    <div class="checkbox">
                        <label> <input name="remember" type="checkbox"> Remember me ? </label>
                    </div> <!-- checkbox .// -->
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                </div> <!-- form-group// -->
            </form>
        </div>
    </div>
@endsection
