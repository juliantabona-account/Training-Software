<li class="notification alert alert-info">
    <div class="media">
      <i aria-hidden="true" class="fa fa-trash ml-2 mr-2 mt-1 res-text-6 text-danger" ></i>
      <div class="media-body">
        <p class="notification-desc res-text-9">The course <a href = "#" class = "text-primary"><u>"{{ str_limit($notification->data['course']['title']) }}"</u></a> has been successfully trashed! <a href = "#" class = "text-primary"><u>Restore course?</u></a></p>

        <div class="notification-meta">
          <span class="timestamp float-right mt-2 mr-4" data-toggle="tooltip" data-placement="top" title="{{ Carbon\Carbon::parse($notification->created_at)->format('M j Y @ G:i A') }}">
            {{ Carbon\Carbon::parse($notification->created_at)->format('M j Y @ G:i A') }}</span>
        </div>
      </div>
    </div>
</li>