@extends('layouts.app')

@section('content')

    <h2 class="mb-4">検索結果</h2>
    <div class="list-group">
        @if(count($data)>0)
            @foreach ($data as $data)
            <div class="list-group-item">
                <h2>{{ $data->title }}</h2>
                
                <div style="display: flex; ">
                    {{--編集--}}
                    {!! link_to_route('guidelines.show', '詳細', ['guideline' => $data->id], ['class' => 'btn btn-secondary mr-2']) !!}
                </div>
            </div>
             @endforeach
        @else
            <h2>見つかりませんでした</h2>
        @endif
    </div>
@endsection