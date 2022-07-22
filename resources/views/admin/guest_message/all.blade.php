@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Guest Message')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>{{__('Guest Message Index')}}</strong>
            </li>
        </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{__('Guest List')}}</h5>
           
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>{{__('#SL')}}</th>
                <th>{{__('Name')}}</th>
              
                <th>{{__(' Status')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
            </thead>
            <?php
            $sl=1;
            ?>

            <tbody>
            
            @foreach($guest_messages as $guest_message)
            <tr class="gradeX">
                <td>{{$sl++}}</td>
                <td>{{$guest_message->name}}</td>
                
                <td class="text-center">
                @if($guest_message->is_read ==1)
                    <span class="badge badge-primary">{{__('Seen')}}</span>
                @else
                    <span class="badge">{{__('Not seen yet')}}</span>
                @endif

                
              
                
                </td>
                
                <td>
               
                <a class="btn btn-info btn-sm" href="{{route('admin.guest-message.show', $guest_message->id)}}"><i class="fa fa-eye"></i></a>
                
                <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="guest-message-delete-{{$guest_message->id}}"><i class="fa fa-trash-o"></i> </a>
                <form action="{{route('admin.guest-message.destroy', $guest_message->id)}}" id="guest-message-delete-{{$guest_message->id}}" method="post">
                @csrf
                @method('DELETE')
                </form>
                </td>
            </tr>
            @endforeach
           
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