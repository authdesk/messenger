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
      <link href="{{asset('frontend/css/magnific-popup.css')}}" rel="stylesheet">
      <link href="{{asset('site/css/messenger.css')}}" rel="stylesheet">
    
  </head>
  <body>

    @yield('dashboard_content')



    <!--App Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Mainly scripts -->
    <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('backend/js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>

    <!-- Magnific Popup -->
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>

    <!-- Ajax Contact -->
    <script src="{{asset('frontend/js/ajax-contact.js')}}"></script>

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


    <!--pusher-->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

      

    <!-- chatbot start -->

    <script>

    var partner_id = '';
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
          //  alert(JSON.stringify(data));
          

        if (my_id == data.to) {
            if (partner_id == data.from) {
                  // if partner is selected, reload the selected user ...
                  
                  $('#btnShoChatAuth').click();
                  get_messages()

                  var pending = parseInt($('#btnShoChatAuth').find('.pending').html());

                if (pending) {
                    $('#btnShoChatAuth').find('.pending').html(pending + 1);
                } else {
                  $('#btnShoChatAuth').append('<span class="pending badge badge-success">1</span>');
                }
                  
                  
            } else {
              get_messages()
                
            }
            
          }

        });

    });


    </script>




    <script>

    var partner_id = '';
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
          //  alert(JSON.stringify(data));
          

        if (my_id == data.to) {
            if (partner_id == data.from) {
                  // if partner is selected, reload the selected user ...
                  
                  $('#btnShoChatAuth').click();
                  get_messages()

            
            } else {

              var pending = parseInt($('#btnShoChatAuth').find('.pending').html());

              if (pending) {
                  $('#btnShoChatAuth').find('.pending').html(pending + 1);
              } else {
                $('#btnShoChatAuth').append('<span class="pending badge badge-success">1</span>');
              }

              get_messages()
                
            }
            
          }

        });

    });


    </script>


    <script>
    $('#btnShoChatAuth').on('click', function(){
      
      $(this).find('.pending').html('');
    });
    </script>



    <style>
    .pending{
      position: absolute;
    top: 7px;
    left:10px;
    }
    </style>


    <script>
      function get_messages() {

        //ajax setup form csrf token
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var partner_id = "{{ App\Models\Admin::where('isMain', 1)->first()->id; }}";

          $.ajax({
            type: "get",
            url: "{{url('user-message')}}"+ "/" + partner_id, // need to create this route
            data: "",
            cache: false,
            success: function (data) {
              
              $('#message-box').html(data);
              
            }
          });

      }
    </script>


    <script>

    $(document).ready(function () {


      $('#btnShoChatAuth').click(function () {

        get_messages()

      });


    });

    </script>


    <script>
      $(document).on('click','#send_message',  function (e) {

      

        var message = $("#message").val();

        var partner_id = $("#partner_id").val();;

        // check if enter key is pressed and message is not null also partner is selected

        if ( message != '' && partner_id != '') {
          
          $(this).val(''); // while pressed enter text box will be empty

          var datastr = "partner_id=" + partner_id + "&message=" + message;

          $.ajax({
            type: "post",
            url: "user-send-message", // need to create this post route
            data: datastr,
            cache: false,
            success: function (data) {
              $("#message").val("");
            },
            error: function (jqXHR, status, err) {
            },
            complete: function () {
              get_messages()
              
            }
          })

        }
      });

    </script>



    <script>
      $(document).ready(function () {
        $('#btnSend').click(function () {
          var guest_name = $('#name').val();
          var guest_message = $('#msg').val();

          $.ajax({
              type: "post",
              url: "{{url('send-guest-message')}}", // need to create this post route
              data: {name: guest_name, message: guest_message},
              cache: false,
              success: function (data) {
                closeForm()
                alert(data.message)
                $('#name').val("");
                $('#msg').val("");
                
                
              }
            
          })

        });
      });
    </script>


    <script>
      $(document).ready(function () {
        $('#btnShoChat').click(function () {
          $('#myForm').toggle();
        });
      });

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>

    <script>
      $(document).ready(function () {
        $('#btnShoChatAuth').click(function () {
          $('#mychatboxauth').toggle();
          
        });
      });

      function closeForm() {
        document.getElementById("mychatboxauth").style.display = "none";
      }
    </script>


    <script>
    
          //Animate the scroll to yop
          $(".chatbox-btn").on('click', function(event) {
            event.preventDefault();
            
          });
    </script>


    <script>
    
    $('.chatbot-close-btn').on('click',function() {
      $(this).closest('.chat-popup').toggle();
    })

    </script>

    <!-- chatbot end -->




   
    <!--messenger start -->

    <script>

      var partner_id = '';
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
                if (partner_id == data.from) {
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

            partner_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "user-message/" + partner_id, // need to create this route
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
            
            if ( message != '' && partner_id != '') {
                
                  // while pressed enter text box will be empty
                var datastr = "partner_id=" + partner_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "user-send-message", // need to create this post route
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

      var partner_id = '';
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
                if (partner_id == data.from) {
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

    <!--messenger end -->
  
    </body>
</html>
