@if(Auth::id() == $message->user_id)
    <div class="chat-message float-right right">
        <img class="message-avatar" src="http://saleschief-bucket.s3.amazonaws.com/assets/icons/profile-placeholder.jpg" img-died="image">
        <div class="message">
            <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> {{ $message->user->first_name }} {{ $message->user->last_name }} </a>
            <span class="message-date">  {{ Carbon\Carbon::parse($message->created_at)->format('M j Y @ G:i A') }} </span>
            <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
            {{ $message->body }}
            </span>
        </div>
    </div>

@elseif(Auth::id() != $message->user_id)
    <div class="chat-message float-left left">
        <img class="message-avatar" src="http://saleschief-bucket.s3.amazonaws.com/assets/icons/profile-placeholder.jpg" img-died="image">
        <div class="message">
            <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> {{ $message->user->first_name }} {{ $message->user->last_name }} </a>
            <span class="message-date">  {{ Carbon\Carbon::parse($message->created_at)->format('M j Y @ G:i A') }} </span>
            <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
            {{ $message->body }}
            </span>
        </div>
    </div>

@endif