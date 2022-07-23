@extends('admin.layouts.app')
@section('admin_dashboard_content')

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
                $admin = App\Models\User::find(Auth::user()->id); 
                ?>
                
                
                <li >
                <a  href="{{route('admin.dashboard')}}" ><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>

                @if($admin->isMain == 1)
                <li>
                    <a  href="{{route('admin.super-admin.index')}}" ><i class="fa fa-user"></i> <span class="nav-label">Super Admin Settings</span></a>
                </li>
                @else
                <li>
                    <a  href="{{route('admin.super-admin.index')}}" ><i class="fa fa-user"></i> <span class="nav-label">Admin Settings</span></a>
                </li>
                @endif

                <li class="{{request()->is('settings*') ? 'active' : ''}}">
                <a href="{{route('admin.settings.index')}}" ><i class="fa fa-diamond"></i> <span class="nav-label">Site Settings</span></a>
                </li>

                <?php
          $admin_id = App\Models\User::where('isMain', 1)->first()->id;
          $user_messages = App\Models\Message::where('from', '!=',$admin_id)
                          ->where('is_read', 0)
                          ->count();
          ?>

                <li class="{{request()->is('messenger*') ? 'active' : ''}}">
                <a href="{{route('admin.messenger')}}" >
                <i class="fa fa-envelope"></i> <span class="nav-label">Message</span>
                <span class="float-right badge badge-primary message-count-badge">

              {{$user_messages}} </span>
                </a>
                </li>

                <?php
                    $guest_messages = App\Models\GuestMessage::where('is_read', 0)->count();
                ?>

                <li class="{{request()->is('guest-message.*') ? 'active' : ''}}">
                <a href="{{route('admin.guest-message.index')}}" >
                <i class="fa fa-envelope"></i> <span class="nav-label">Guest Message</span>
                <span class="float-right badge badge-primary message-count-badge">{{$guest_messages}}</span>
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
                            <span class="block m-t-xs font-bold">{{ Auth::user()->username ?? '' }}  <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li class="dropdown-item mt-1" >{{__('Name:')}} {{ Auth::user()->username ?? '' }} </li>
                            <li class="dropdown-item mt-1" >{{__('Email:')}} {{ Auth::user()->email ?? '' }} </li>
                         
                           
                            <li class="dropdown-divider"></li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <a class="dropdown-item mb-2 text-center" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
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
        @yield('admin_content')
        <!--content start-->


        <!--footer start-->
        <div class="footer">
            <div>
                <strong>{{ __('Copyright') }}</strong> &copy;  {{ __('2022') }}
            </div>
        </div>
        <!--footer end-->

    </div>
    <!--page wrapper start-->

    

</div>
<!--dashboard wrapper end-->

@endsection