@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

            <form class="m-t" role="form" method="POST" action="{{ route('password.email') }}">
            @csrf
                <div class="form-group">
                    <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="{{old('email')}}" required autofocus />
                </div>

              

                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Email Password Reset Link') }}</button>
                
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}"> {{ __('Back to Login.') }}</a>
            </form>
            <p class="m-t"> <small> {{ __('Copyright') }} &copy; {{ __('2021') }} </small> </p>
        </div>
    </div>
@endsection
