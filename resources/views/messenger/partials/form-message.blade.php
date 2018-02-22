<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}

    @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->first_name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->first_name }}
                </label>
            @endforeach
        </div>
    @endif

    <div class="input-group">
        <input id="btn-input" type="text" class="form-control res-text-9 res-text-sm-9 res-text-md-9 p-3" placeholder="Say something..." name="message" value = "{{ old('message') }}"/>
        <span class="input-group-btn">
            <button class="btn app-red-btn btn-sm res-text-9 res-text-sm-9 res-text-md-9 p-3">Send</button>
        </span>
    </div>

</form>