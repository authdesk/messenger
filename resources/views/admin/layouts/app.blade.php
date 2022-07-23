<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- App Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      
            <!-- Gritter -->
            <link href="{{asset('backend/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


        <!--Dashboard-->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/css/messenger.css')}}" rel="stylesheet">
      


    </head>
    <body>

         @yield('admin_dashboard_content')




        <!--App Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Mainly scripts -->
        <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('backend/js/popper.min.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap.js')}}"></script>
        <script src="{{asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/chosen/chosen.jquery.js')}}"></script>

        <!-- Flot -->
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
        <script src="{{asset('backend/js/plugins/flot/curvedLines.js')}}"></script>

        <script src="{{asset('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Peity -->
        <script src="{{asset('backend/js/plugins/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('backend/js/demo/peity-demo.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('backend/js/inspinia.js')}}"></script>
        <script src="{{asset('backend/js/plugins/pace/pace.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{asset('backend/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <!-- GITTER -->
        <script src="{{asset('backend/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

        <!-- Jvectormap -->
        <script src="{{asset('backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{asset('backend/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Sparkline demo data  -->
        <script src="{{asset('backend/js/demo/sparkline-demo.js')}}"></script>

        <!-- ChartJS-->
        <script src="{{asset('backend/js/plugins/chartJs/Chart.min.js')}}"></script>
        
        <!-- iCheck -->
        <script src="{{asset('backend/js/plugins/iCheck/icheck.min.js')}}"></script>
         
        <!-- sweetalert -->
        <script src="{{asset('backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
        
        <!-- toastr -->
        <script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>
        {!! Toastr::message() !!}

         <!--pusher-->
         <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <script>
            $(document).ready(function() {

                var lineData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "Example dataset",
                            backgroundColor: "rgba(26,179,148,0.5)",
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: "Example dataset",
                            backgroundColor: "rgba(220,220,220,0.5)",
                            borderColor: "rgba(220,220,220,1)",
                            pointBackgroundColor: "rgba(220,220,220,1)",
                            pointBorderColor: "#fff",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        }
                    ]
                };

                var lineOptions = {
                    responsive: true
                };


                var ctx = document.getElementById("lineChart").getContext("2d");
                new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            });
        </script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

        <!-- Sidebar Menu Active Script -->
        <script>
            $(function(){
                var current = location.pathname;

                $('ul.metismenu li a').each(function(){
                    if($(this).attr('href').indexOf(current) !== -1){
                        $(this).closest('li').addClass('active');
                    }
                });

                $('ul.metismenu .nav-second-level a').each(function(){
                    console.log($(this).attr('href').indexOf(current));
                    if($(this).attr('href').indexOf(current) !== -1)  {
                        $(this).parent().parent().closest('li').addClass('active');
                        $(this).closest('ul').addClass('in');
                    }
                });
            });
        </script>

        <!-- Cusrtom File Input Select Script -->
        <script>
            $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            }); 
        </script>
        

        <!-- Delete Data Scripts -->
        <script>
            $('.delete').on('click', function(){

                let form_id = $(this).data('form-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, this will be deleted permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+form_id).submit();
                        swal("File has been deleted!", {
                        icon: "success",
                        });

                    } else {
                        swal("File is safe!");
                    }
                }); 

            });

        </script>
       
       <!-- Active Inactive Scripts -->
        <script>
            $(function(){
                $("input:checkbox.input_status").change(function() {
                if(this.checked) {
                    window.location = this.value;
                }
            });
            });

            $(function(){
                $("input:checkbox.input_status").change(function() {
                if(this.checked == false) {
                    window.location = this.value;
                }
            });
            });
        </script>



   
    <!--messenger app -->

    <script>

        var receiver_id = '';
        var my_id = "{{ Auth::user()->id }}";

        $(document).ready(function () {
  
            //ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('5d86c52c224954e74858', {
            cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                //alert(JSON.stringify(data));

                if (my_id == data.from) {
                    $('#' + data.to).click();
                    
                } else if (my_id == data.to) {
                    if (receiver_id == data.from) {
                        // if receiver is selected, reload the selected user ...
                        $('#' + data.from).click();
                    } else {
                        // if receiver is not seleted, add notification for that user
                        var pending = parseInt($('#' + data.from).find('.pending').html());
                        if (pending) {
                            $('#' + data.from).find('.pending').html(pending + 1);
                        } else {
                            $('#' + data.from).append('<span class="pending">1</span>');
                        }
                    }
                
                }
            });






            $('.user').click(function () {
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();

                receiver_id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "message/" + receiver_id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        scrollToBottomFunc()
                        
                        
                    }
                });
            });



            $(document).on('click', '.submit-message', function (e) {

                var message = $('#input-text').val();

                // check if enter key is pressed and message is not null also receiver is selected
                
                if ( message != '' && receiver_id != '') {
                    
                     // while pressed enter text box will be empty
                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "send-message", // need to create this post route
                        data: datastr,
                        cache: false,
                        success: function (data) {
                            $('#input-text').val('');
                        },
                        error: function (jqXHR, status, err) {
                        },
                        complete: function () {
                            scrollToBottomFunc()
                        }
                    })
                }
            });

        });


        // make a function to scroll down auto
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 50);
        }
 
    </script>



    <script>

var receiver_id = '';
        var my_id = "{{ Auth::user()->id }}";
                $(document).ready(function () {
  
  //ajax setup form csrf token
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('5d86c52c224954e74858', {
  cluster: 'ap2'
  });

  var channel = pusher.subscribe('new-channel-name');
  channel.bind('new-event-name', function(data) {
      //alert(JSON.stringify(data));

      if (my_id == data.from) {
          $('#' + data.to).click();
          
      } else if (my_id == data.to) {
          if (receiver_id == data.from) {
              // if receiver is selected, reload the selected user ...
              $('#' + data.from).click();
          } else {
              // if receiver is not seleted, add notification for that user
              var pending = parseInt($('#' + data.from).find('.pending').html());
              if (pending) {
                  $('#' + data.from).find('.pending').html(pending + 1);
              } else {
                  $('#' + data.from).append('<span class="pending">1</span>');
              }
          }
      
      }
  });

                });

    </script>


    </body>
</html>
