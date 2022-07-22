@extends('frontend.dashboard')
@section('content')

<div class="page-wrapper animated fadeInRight">
    <div class="content mt-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="payslip-title">Profile Details</h4>
                    <hr>
                  
                 
                    <div class="row  mt-3">
                        <dt class="col-sm-3" >{{__('Surname')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$user_profile->surname}}</dd>
                        <dt class="col-sm-3" >{{__('ID')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$user_profile->id}}</dd>
                        <dt class="col-sm-3" >{{__('First Name')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$user_profile->first_name}}</dd>
                        <dt class="col-sm-3" >{{__('Last Name')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$user_profile->last_name}}</dd>
                        <dt class="col-sm-3" >{{__('Username')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$user_profile->username}}</dd>
                        <dt class="col-sm-3" >{{__('Email address')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$user_profile->email}}</dd>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection