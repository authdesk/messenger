@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>


            <form class="m-t" role="form" method="POST" action="{{ route('password.update') }}">
            @csrf

                <!-- Password Reset Token -->
                <input type="hidden"  name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <input id="email" class="form-control" type="email" name="email" placeholder="Username" value="{{old('email', $request->email)}}" required autofocus />
                </div>

                <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="password" required />
                </div>


                <div class="form-group">
                    <input id="password_confirmation" class="form-control" type="password" placeholder="Password Confirmation" name="password_confirmation" required />
                </div>

              

                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Reset Password') }}</button>
                
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}"> {{ __('Back to Login.') }}</a>
            </form>
            <p class="m-t"> <small> {{ __('Copyright') }} &copy; {{ __('2021') }} </small> </p>
        </div>
    </div>
@endsection
