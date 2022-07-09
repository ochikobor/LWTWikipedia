@extends('layouts.app')

@section('content')
{{-- ガイドライン --}}
    @if (count($guidelines) > 0)
    <h2 class="mb-4">投稿</h2>
    <div class="list-group">
        @foreach ($guidelines as $guideline)
            <div class="list-group-item">
                <div style="display: flex; ">
                    {{--編集--}}
                    {!! link_to_route('guidelines.show', '詳細', ['guideline' => $guideline->id], ['class' => 'btn btn-secondary mr-2']) !!}
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['guidelines.destroy', $guideline->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}                    
                </div>
            </div>
        @endforeach
    </div>
    @else
    <h2>投稿はありません</h2>
@endsection