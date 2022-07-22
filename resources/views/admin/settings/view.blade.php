@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Create Settings')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.settings.index')}}">{{__('Settings')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Settings Details')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.settings.index')}}">{{__('Settings List')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Settings Details')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <dl class="row">
                           
                            <dt class="col-sm-3" >{{__('ID')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->id}}</dd>
                            <dt class="col-sm-3" >{{__('Site Name')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->Name}}</dd>
                            <dt class="col-sm-3" >{{__('Logo')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9"> <img src="{{URL::to($settings->Logo)}}" width="70px" height="70px"></dd>
                            <dt class="col-sm-3" >{{__('Email')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->Email}}</dd>
                            <dt class="col-sm-3" >{{__('Address')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->Address}}</dd>
                            <dt class="col-sm-3" >{{__('Contact Number')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->ContactNumber}}</dd>
                            <dt class="col-sm-3" >{{__('About')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->About}}</dd>

                           

                        </dl>


                </div>
            </div>
        </div>
    </div>
</div>




@endsection