<div class="messenger-wrapper" >

    <ul class="messages">
       @foreach($messages as $message)
        <li class="message clearfix">
        
            <?php
            
            $user_id = Auth::user()->id;

            ?>
            
            
            <div class="{{($message->from == $user_id) ? 'sent' : 'received'}}">
                <p>{{$message->message}}</p>
                
                <small class="date">
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




