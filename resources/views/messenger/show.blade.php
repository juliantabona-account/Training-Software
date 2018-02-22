@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')

@endsection

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('messenger.partials.messages', $thread->messages, 'message')
    </div>
@stop
