@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Messenger')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>{{__('Messenger')}}</strong>
            </li>
        </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <div class="content container-fluid messenger-div">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="user-wrapper">
                            <ul class="users">
                                @foreach($users as $user)

                                <li class="user" id="{{$user->id}}">
                                    <!--will show unread count notification-->
                                    @if($user->unread)
                                    <span class="pending">{{$user->unread}}</span>
                                    @endif

                                    <div class="media px-3">


                                        <div class="media-body ">
                                            <p class="name">
                                                {{$user->username ?? ''}} <br>
                                                <small>{{$user->email ?? ''}}</small>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach



                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8 messenger-message-div" id="messages" style="height:500px;">



                    </div>
                </div>
            </div>




        </div>
        <!-- /.content -->


    </div>




    @endsection