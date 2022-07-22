@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Create Admin')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.super-admin.index')}}">{{__('Admin Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Create Admin')}}</strong>
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
                    <h5>{{__('Create Admin')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.super-admin.store')}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Name')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="email" name="email" placeholder="Email" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Password')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="password" name="password" placeholder="Password" class="form-control" >
                            </div>
                        </div>


                        <div class="form-group  row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Password')}} </label>

                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"  class="form-control" >
                            </div>
                        </div>




                        <div class="form-group  i-checks row">
                            
                            <label class="col-sm-2 col-form-label">{{__('Is Main Admin')}} </label>

                            <div class="col-sm-10 pt-1">
                                <input type="checkbox" class="icheckbox_square-green" name="isMain" value="1" >
                            </div>
                        </div>
                        

                        

                        <div class="hr-line-dashed"></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('Create New')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
                
            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>

@endsection