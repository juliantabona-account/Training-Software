<?php 

    $class = $thread->isUnread(Auth::id()) ? 'new-message' : ''; 
    $unreadCount = $thread->userUnreadMessagesCount(Auth::id()) ? '('.$thread->userUnreadMessagesCount(Auth::id()).')': ''

?>

<li class="notification {{ $class }} mb-2 p-3">
    <div class="media">
      <div class="media-body">
        <p class="mb-1">
          <i class = "fa fa-thumb-tack mr-2"></i>
          {{ $thread->subject }}
        </p>
        <p class="notification-desc res-text-9">
          <a href = "{{ route('messages.show', $thread->id) }}" class = "text-muted">{{ str_limit($thread->latestMessage->body, 80) }}</a>
        </p>

        <div class="notification-meta">
          <span class="timestamp float-left badge badge-info float-right mt-2" data-toggle="tooltip" data-placement="top" title="{{ Carbon\Carbon::parse($thread->created_at)->format('M j Y @ G:i A') }}">
            {{ Carbon\Carbon::parse($thread->created_at)->format('M j Y @ G:i A') }}</span>
        </div>
      </div>
    </div>
</li>