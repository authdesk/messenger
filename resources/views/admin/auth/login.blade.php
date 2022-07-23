@extends('admin.layouts.guest')
@section('admin_auth_content')
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
           

            <p>{{__('Login to see it in action.')}}</p>

            <form class="m-t" role="form" method="POST" action="{{ route('admin.adminlogin') }}">
            @csrf
                <div class="form-group">
                    <input id="email" class="form-control" type="email" name="email" placeholder="admin@example.com" value="{{old('email')}}" autofocus />
                </div>

                <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="123456789" autocomplete="current-password" />
                </div>

                <input type="hidden" name="account_type" value="admin">

                <button type="submit" class="btn btn-primary block full-width m-b">{{__('Login')}}</button>
                

                <a class="btn btn-sm btn-white btn-block" href="{{ route('/') }}">{{__('Back to site')}}</a>
            </form>

        </div>
    </div>
@endsection

