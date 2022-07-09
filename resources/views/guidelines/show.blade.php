@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="form-inline mb-4">
        {{--編集--}}
        {!! link_to_route('guidelines.edit', '編集', ['guideline' => $guideline->id], ['class' => 'btn btn-secondary mr-2']) !!}
        {{--削除--}}
        {!! Form::model($guideline, ['route' => ['guidelines.destroy', $guideline->id], 'method' => 'delete']) !!}
        @if (Auth::id() == $guideline->user_id)
            {{-- 投稿削除ボタンのフォーム --}}
            {!! Form::open(['route' => ['guidelines.destroy', $guideline->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
        {!! Form::close() !!}
    </div>

    
    
    <div>
        <h2 class="mb-4">{{ $guideline->title }}</h2>
        <div>{!!$guideline->content !!}</div>
    </div>
    @endif
@endsection