@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <p> {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>


            <form class="m-t" role="form" method="POST" action="{{ route('password.confirm') }}">
            @csrf
                <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="password" required autocomplete="current-password" />
                </div>

              

                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Confirm') }}</button>
                
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}"> {{ __('Back to Login.') }}</a>
            </form>
            <p class="m-t"> <small> {{ __('Copyright') }} &copy; {{ __('2021') }} </small> </p>
        </div>
    </div>
@endsection

