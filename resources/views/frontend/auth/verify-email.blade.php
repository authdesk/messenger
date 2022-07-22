@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <p> {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>

            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif

            <form class="m-t" role="form" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="form-group">
                    <input id="email" class="form-control" type="email" name="email" placeholder="Username" value="{{old('email')}}" required autofocus />
                </div>

              

                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Resend Verification Email') }}</button>
                
               
            </form>


            <form class="m-t" role="form" method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Log Out') }}</button>
            </form>


            <p class="m-t"> <small> {{ __('Copyright') }} &copy; {{ __('2021') }} </small> </p>
        </div>
    </div>
@endsection
