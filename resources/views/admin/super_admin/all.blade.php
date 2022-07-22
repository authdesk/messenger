@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        @if($isAdmin->isMain ==1)
        <h2>{{__('Admin List')}}</h2>
        @else
        <h2>{{__('Admin Settings')}}</h2>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            
            <li class="breadcrumb-item active">
            @if($isAdmin->isMain ==1)
                <strong>{{__('All Admins')}}</strong>
            @else
                <strong>{{__('Admin Settings')}}</strong>
            @endif
            </li>
        </ol>
    </div>
  
    <div class="col-lg-2 align-self-center ">
        
    @if($isAdmin->isMain ==1)
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.super-admin.create')}}">{{__('Create Admin')}}</a>
        </div>
    @endif
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
            @if($isAdmin->isMain ==1)
                <h5>{{__('Admin List')}}</h5>
            @else
                <h5>{{__('Admin Settings')}}</h5>
            @endif
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                      <tr>
                          <th>{{__('#SL')}}</th>
                          <th>{{__('Name')}}</th>
                          <th>{{__('Email')}}</th>
                          @if($isAdmin->isMain ==1)
                          <th>{{__('Admin Status')}}</th>
                          @endif
                          <th>{{__('Action')}}</th>
                      </tr>
                    </thead>
                    <?php
                    $sl=1;
                    ?>

                    <tbody>
                      @if($isAdmin->isMain ==1)
                      @foreach($admins as $admin)
                      <tr class="gradeX">
                          <td>{{$sl++}}</td>

                          @if($admin->id == $isAdmin->id)
                          <td>{{$admin->name}} (You)</td>
                          @else
                          <td>{{$admin->name}}</td>
                          @endif

                          @if($admin->id == $isAdmin->id)
                          <td> {{$admin->email}} (You)</td>
                          @else
                          <td> {{$admin->email}}</td>
                          @endif

                          @if($isAdmin->isMain ==1)
                          <td>
                              
                              @if($admin->isMain ==1)
                              <span class="badge">{{__('Is Super Admin')}}</span>
                              @else
                              <span class="badge">{{__('Make Super Admin')}}</span>
                              @endif

                              @if($admin->id != $isAdmin->id)
                              @if($admin->isMain ==1)
                              <label class="switch ml-3">
                                  <input type="checkbox" class="input_status" checked value="{{URL::to('/admin/make-admin/'.$admin->id)}}">
                                  <span class="slider round"></span>
                              </label>
                              @else
                              <label class="switch ml-3">
                                  <input type="checkbox" class="input_status" value="{{URL::to('/admin/make-super-admin/'.$admin->id)}}">
                                  <span class="slider round"></span>
                              </label>
                              @endif
                              @endif
                          
                          </td>
                          @endif
                          
                          <td>
                          @if($admin->id == $isAdmin->id)
                          <a class="btn btn-info btn-sm" href="{{route('admin.super-admin.show', $admin->id)}}">{{__('View')}}</a>
                          @endif

                          @if($admin->id == $isAdmin->id)
                          <a class="btn btn-success btn-sm" href="{{route('admin.super-admin.edit', $admin->id)}}">{{__('Edit')}}</a>
                          @endif

                          @if($admin->id != $isAdmin->id)
                          <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="super-admin-delete-{{$admin->id}}">{{__('Delete')}} </a>
                          <form action="{{route('admin.super-admin.destroy', $admin->id)}}" id="super-admin-delete-{{$admin->id}}" method="post">
                          @csrf
                          @method('DELETE')
                          </form>
                          @endif

                          </td>
                      </tr>
                      @endforeach
                      @else
                      <tr class="gradeX">
                          <td>{{$sl++}}</td>
                          <td>{{$isAdmin->name}}</td>
                          <td> {{$isAdmin->email}}</td>
                          <td>
                            <a class="btn btn-info btn-sm" href="{{route('admin.super-admin.show', $isAdmin->id)}}">{{__('View')}}</a>
                            <a class="btn btn-success btn-sm" href="{{route('admin.super-admin.edit', $isAdmin->id)}}">{{__('Edit')}}</a>
                          </td>
                      </tr>
                      @endif
                    
                  
                    </tbody>
                
                  </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>






<style>
.switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 3px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #1AB394;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


@endsection