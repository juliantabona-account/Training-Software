@if(Session::has('status'))
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-4">
            <div class="alert alert-{{ Session::get('type') }}" role="alert">
                <span class = "res-text-9 res-text-sm-9 res-text-md-9">
			    	@if(Session::has('status-icon'))
			    		<i class = "{{ Session::get('status-icon') }}"></i>
			    	@endif 
                	{{ Session::get('status') }}
                </span>
                <button type="button" class="close mt-2 d-block res-text-9" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @php

        Session::forget('status');

    @endphp
@endif