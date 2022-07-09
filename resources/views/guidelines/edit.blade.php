@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="form-group mb-4">
            {!! Form::model($guideline,  ['route' => ['guidelines.update', $guideline->id], 'method' => 'put']) !!}

                <div class="form-group mb-4">
                    {!! Form::label('title', 'タイトル')!!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group mb-4">
                    {!! Form::label('thumbnail', 'サムネイル') !!}
                    {!! Form::file('thumbnail', null, ['class' => 'form-control-file']) !!}
                </div>
            
                <div id="editor" class="mb-4">{!! $guideline->content !!}</div>
                
                @include('commons.editor')

                {!! Form::submit('一時保存', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    @endif
@endsection