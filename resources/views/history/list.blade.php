@extends('layouts.master')

@section('content')
    <div class="history">
        <div class="history-list">
            @each('history.entry', $entries, 'entry')
        </div>
    </div>

    {!! $entries->render() !!}
@endsection
