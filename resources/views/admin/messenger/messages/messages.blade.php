
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header chatbox-header text-center">
                    <span>{{$sender->username}}</span>
                </div>
                <div class="card-body chat-care">

                    <div class="messenger-wrapper">

                        <ul class="messages">

                            @foreach($messages as $message)
                            <li class="message clearfix">

                                <?php
                                    $admin_id = Auth::user()->id;
                                ?>


                                <div class="{{($message->from == $admin_id) ? 'sent' : 'received'}}">
                                    <p>{{$message->message}} </p>

                                        <small> 
                                            @if($message->is_read == 1)
                                           Seen {{ Carbon\Carbon::parse($message->updated_at)->format('h:i A d F, Y') }}
                                            @else
                                                {{ Carbon\Carbon::parse($message->created_at)->format('h:i A d F, Y') }}
                                            @endif
                                         </small>
                                     
                                </div>



                            </li>
                            @endforeach





                        </ul>

                    </div>

                </div>
                <div class="d-flex align-items-center justify-content-center card-footer chatbox-footer white-bg p-1">
                    <input type="text" name="message" id="input-text"  class=" submit">

                    <button class="btn btn-primary submit-message">Send</button>

                </div>
            </div>
        </div>
    </div>


