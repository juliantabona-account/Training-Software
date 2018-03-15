<?php 

    $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; 
    $unreadCount = $thread->userUnreadMessagesCount(Auth::id()) ? '('.$thread->userUnreadMessagesCount(Auth::id()).')': ''

?>

<li class="notification {{ $class }}">
    <div class="media">
      <img data-src="holder.js/50x50?bg=cccccc" class="mr-2 img-circle" alt="50x50" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2250%22%20height%3D%2250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2050%2050%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_161ba02b9dd%20text%20%7B%20fill%3A%23919191%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_161ba02b9dd%22%3E%3Crect%20width%3D%2250%22%20height%3D%2250%22%20fill%3D%22%23cccccc%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%226.46875%22%20y%3D%2229.5%22%3E50x50%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 50px; height: 50px;">
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