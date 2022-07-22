
@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Edit Admin')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.super-admin.index')}}">{{__('Admin Index')}}</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>{{__('Edit Admin')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.super-admin.index')}}">{{__('Admin Index')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Edit Admin')}}</h5>
                    
                </div>
                <div class="ibox-content">
                   <form action="{{route('admin.super-admin.update', $edit->id)}}" method="POST">  
                        @csrf
                        @method('PUT')
                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Name')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="Name" value="{{$edit->name}}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="email" name="email" placeholder="Email" value="{{$edit->email}}" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Password')}} </label>

                            <div class="col-sm-10">
                                <input type="password" name="password" placeholder="Enter New Password" value="" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Password')}} </label>

                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" placeholder="Confirm New Password"  class="form-control" >
                            </div>
                        </div>
                        

                        <div class="hr-line-dashed"></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('Update')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection