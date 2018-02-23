<li class="notification alert alert-info">
    <div class="media">
      <i aria-hidden="true" class="fa fa-film ml-2 mr-2 mt-1 res-text-7 text-info" ></i>
      <div class="media-body">
        <p class="notification-desc res-text-9">The video <a href = "#" class = "text-primary"><u>"{{ str_limit($notification->data['storage']['video_name']) }}"</u></a> has been successfully assigned to <a href = "#" class = "text-primary"><u>"{{ str_limit($notification->data['storage']['lesson']['title']) }}"</u></a></p>

        <div class="notification-meta">
          <span class="timestamp float-right mt-2 mr-4" data-toggle="tooltip" data-placement="top" title="{{ Carbon\Carbon::parse($notification->created_at)->format('M j Y @ G:i A') }}">
            {{ Carbon\Carbon::parse($notification->created_at)->format('M j Y @ G:i A') }}</span>
        </div>
      </div>
    </div>
</li>