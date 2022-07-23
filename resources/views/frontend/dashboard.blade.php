@extends('frontend.layouts.app')
@section('dashboard_content')

<?php
$settings = App\Models\Setting::latest()->first();

if (Auth::check()) {
  $admin = App\Models\User::where('isMain', 1)->first();
      
$admin_id = $admin->id;
$user_id = Auth::user()->id;

$admin_message = App\Models\Message::where('from',$admin_id)->where('is_read', 0)->count();

}

?>

<!--dashboard wrapper start-->
<div id="wrapper">

  <!--sidebar start-->
  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">

      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <!-- Brand Logo -->
          <?php
                    $settings = App\Models\Setting::where("Status",1)->first();
                    ?>
          <a href="{{route('admin.dashboard')}}" class="brand-link">
            <img src="{{URL::to($settings->Logo ?? '')}}" class="brand-image img-circle" style="opacity: .8">
            <span class="brand-text text-white">{{$settings->Name ?? ''}} </span>
          </a>
        </li>
        <?php
                $user = App\Models\User::find(Auth::user()->id); 
                ?>


        <li class="{{request()->is('dashboard') ? 'active' : ''}}">
          <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
        </li>





        <li class="{{request()->is('user-profile') ? 'active' : ''}}">
          <a href="{{route('user-profile')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Profile</span></a>
        </li>

        <?php
          $auth_id = Auth::user()->id;
          $user_messages = App\Models\Message::where('to', '=',$auth_id)
                          ->where('is_read', 0)
                          ->count();
          ?>

                <li class="{{request()->is('user-messenger*') ? 'active' : ''}}">
                <a href="{{route('user-messenger')}}" >
                <i class="fa fa-envelope"></i> <span class="nav-label">Message</span>
                <span class="float-right badge badge-primary message-count-badge">

              {{$user_messages}} </span>
                </a>
                </li>






      </ul>

    </div>
  </nav>
  <!--sidebar end-->


  <!--page wrapper start-->
  <div id="page-wrapper" class="gray-bg">

    <!--topbar start-->
    <div class="row border-bottom">
      <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
          <li class="mr-3">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="block m-t-xs font-bold">{{ Auth::user()->username ?? '' }} <b class="caret"></b></span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
              <li class="dropdown-item mt-1">{{__('Name:')}} {{ Auth::user()->username ?? '' }} </li>
              <li class="dropdown-item mt-1">{{__('Email:')}} {{ Auth::user()->email ?? '' }} </li>


              <li class="dropdown-divider"></li>
              <li>
                <!-- Authentication -->
                <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <a class="dropdown-item mb-2 text-center" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                  </a>
                </form>
              </li>
            </ul>
          </li>

        </ul>

      </nav>
    </div>
    <!--topbar end-->


    <!--content start-->
    @yield('content')
    <!--content start-->


    <!--footer start-->
    <div class="footer">
      <div>
        <strong>{{ __('Copyright') }}</strong> &copy; {{ __('2022') }}
      </div>
    </div>
    <!--footer end-->

  </div>
  <!--page wrapper start-->



</div>
<!--dashboard wrapper end-->





<a href="#" class="chatbox-auth-btn" id="btnShoChatAuth">
  <i class="fa fa-comments"></i>
  @if($admin_message != 0)
  <span class="pending badge badge-primary">{{$admin_message}}</span>
  @endif
</a>


<div class="chat-popup " id="mychatboxauth">
  <div class="form-container">

    <div class="card main-card" id="chatbot">
      <div class="card-header chatbot-header">
        <span class="user chatbox-title " id=""> {{$admin->username}}
          <input type="hidden" name="partner_id" id="partner_id" value="{{$admin->id}}">
        </span>
        <button class="btn btn-default float-right chatbot-close-btn"><i class="fa fa-times"></i></button>
      </div>
      <div class="card-body chat-area">
        <div class=" messenger-message-div" id="message-box">
        </div>

      </div>
      <div class="card-footer chatbot-footer">
      <div class="input-div  d-flex align-items-center justify-content-center mb-3">
        <input class="input-message form-control mt-3 p-3 border" name="message" type="text" id="message"  placeholder="Type your message ..." />
        
  
          <button class="btn btn-sm btn-primary input-send ml-3 mt-3" id="send_message"  type="button">Send</button>
        </div>
      </div>
       

      </div>

    </div>

  </div>
</div>




@endsection