@extends('layouts.app')

@section('content')
{{-- ガイドライン --}}
    @if (count($tutorials) > 0)
    <h2 class="mb-4">投稿</h2>
    <div class="list-group">
        @foreach ($tutorials as $tutorial)
            <div class="list-group-item">
                <div style="display: flex; ">
                    {{--編集--}}
                    {!! link_to_route('tutorials.show', '詳細', ['tutorial' => $tutorial->id], ['class' => 'btn btn-secondary mr-2']) !!}
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['tutorials.destroy', $tutorial->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}                    
                </div>
            </div>
        @endforeach
    </div>
@else
    <h2>投稿はありません</h2>
@endsection