@extends('frontend.dashboard')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Messenger')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">{{__('Home')}}</a>
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
                               

                                <li class="user" id="{{$admin->id}}">
                                    <!--will show unread count notification-->
                                    @if($admin->unread)
                                    <span class="pending">{{$admin->unread}}</span>
                                    @endif

                                    <div class="media px-3">


                                        <div class="media-body ">
                                            <p class="name">
                                                {{$admin->username ?? ''}} <br>
                                                <small>{{$admin->email ?? ''}}</small>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                              



                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8 " >

                    
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header chatbox-header text-center">
                    <span>{{$admin->username}}</span>
                    <input type="hidden" name="partner_id" id="partner_id" value="{{$admin->id}}">
                </div>
                <div class="card-body chat-care messenger-message-div" id="messages" style="height:500px;">

      

                </div>
                <div class="d-flex align-items-center justify-content-center card-footer chatbox-footer white-bg p-1">
                    <input type="text" name="message" id="input-text"  class=" submit">

                    <button class="btn btn-primary submit-message">Send</button>

                </div>
            </div>
        </div>
    </div>




                    </div>
                </div>
            </div>




        </div>
        <!-- /.content -->


    </div>




    @endsection