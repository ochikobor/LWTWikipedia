@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="form-inline mb-4">
        {{--編集--}}
        {!! link_to_route('tutorials.edit', '編集', ['tutorial' => $tutorial->id], ['class' => 'btn btn-secondary mr-2']) !!}
        {{--削除--}}
        {!! Form::model($tutorial, ['route' => ['tutorials.destroy', $tutorial->id], 'method' => 'delete']) !!}
        @if (Auth::id() == $tutorial->user_id)
            {{-- 投稿削除ボタンのフォーム --}}
            {!! Form::open(['route' => ['tutorials.destroy', $tutorial->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
        {!! Form::close() !!}
    </div>

    
    
    <div>
        <h2 class="mb-4">{{ $tutorial->title }}</h2>
        <div>{!!$tutorial->content !!}</div>
    </div>
    @endif
@endsection