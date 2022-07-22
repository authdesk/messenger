
@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="middle-box-div">

            <h3>{{__('Welcome to Admin Login')}}</h3>

            @if ($errors->any())
                <div >
                    <div class="font-medium text-red-600">
                        {{ __('Error! Something went wrong.') }}
                    </div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                        <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input id="first_name" class="form-control" type="text" name="first_name" placeholder="First Name"  autofocus />
                            </div>

                            <div class="form-group">
                                <input id="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name"  autofocus />
                            </div>

                            <div class="form-group">
                                <input id="username" class="form-control" type="text" name="username" placeholder="Username"  autofocus />
                            </div>

                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" placeholder="Email"   />
                            </div>

                            <div class="form-group">
                                <input id="password" class="form-control" type="password" name="password" placeholder="Password"  autocomplete="new-password" />
                            </div>

                            <div class="form-group">
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation" />
                            </div>


                            <div class="form-group ">

                                
                                    <select class="form-control custom-select" name="account_type">
                                        <option value="en">{{__('User')}}</option>
                                    </select>
                            
                            </div>

                            <br>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">{{__('Register')}}</button>
                            </div>
                        </form>
                    
                        <div class="text-center dont-have">{{ __('Already registered?') }}
                            <a href="{{ route('login') }}">{{__('Login')}}</a>
                            <br>
                            <a href="{{ route('/') }}">{{__('Back to site')}}</a>
                        </div>
                       
                    </div>
                </div>
        

@endsection




