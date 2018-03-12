<li class="notification alert-info">
    <div class="media">
      <i aria-hidden="true" class="fa fa-book ml-2 mr-2 mt-1 res-text-6 text-info" ></i>
      <div class="media-body">
        <p class="notification-desc res-text-9">Hi <a href = "#" class = "text-primary"><u>{{ $notification->data['storage']['client']['first_name'] }}</u></a>, you've been successfully enrolled into <a href = "#" class = "text-primary"><u>"{{ $notification->data['storage']['course']['title'] }}"</u></a> course. <a href = "#" class = "text-primary">View course?</a></p>

        <div class="notification-meta">
          <span class="timestamp float-right mt-2 mr-4" data-toggle="tooltip" data-placement="top" title="{{ Carbon\Carbon::parse($notification->created_at)->format('M j Y @ G:i A') }}">
            {{ Carbon\Carbon::parse($notification->created_at)->format('M j Y @ G:i A') }}</span>
        </div>
      </div>
    </div>
</li>