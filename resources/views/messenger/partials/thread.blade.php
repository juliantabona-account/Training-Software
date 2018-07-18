<?php 

    $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; 
    $unreadCount = $thread->userUnreadMessagesCount(Auth::id()) ? '('.$thread->userUnreadMessagesCount(Auth::id()).')': '';

    $msg_image = '';

    foreach($thread->users as $user){
      if($user->id != Auth::id()){
          $msg_image = $user->avatar;
      }
    }

?>

<li class="notification {{ $class }}">
    <div class="media">
      @if($msg_image != '')
        <img class="mr-2 img-circle" src="{{ $msg_image }}" style="width: 50px;height: 50px;border-radius: 100%;border: 1px solid #bfbfbf;">
      @else
          <i class="fa fa-user-circle-o mr-2 res-text-9 res-text-md-8" aria-hidden="true" style="width: 50px;height: 50px;padding: 5px;background: #868e96;border-radius: 100%;color: #fff;font-size: 40px !important;"></i>  
      @endif
      <div class="media-body">
        <strong class="notification-title res-text-9"><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->participantsString(Auth::id(), ['first_name', 'last_name']) }} {{ $unreadCount }} </a></strong>
        <p class="notification-desc res-text-9"><a href = "{{ route('messages.show', $thread->id) }}" class = "text-muted">{{ str_limit($thread->latestMessage->body, 80) }}</a></p>

        <div class="notification-meta">
          <span class="timestamp float-left badge badge-info" data-toggle="tooltip" data-placement="top" title="{{ Carbon\Carbon::parse($thread->created_at)->format('M j Y @ G:i A') }}">
            {{ Carbon\Carbon::parse($thread->created_at)->format('M j Y @ G:i A') }}</span>
        </div>
      </div>
    </div>
</li>

