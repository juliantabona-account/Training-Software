@if(Session::has('status'))
    <div class="alert alert-{{ Session::get('type') }}" role="alert">
    	@if(Session::has('status-icon'))
    		<i class = "{{ Session::get('status-icon') }}"></i>
    	@endif
        <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-user mr-1"></i> {{ Session::get('status') }}</span>
        <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif