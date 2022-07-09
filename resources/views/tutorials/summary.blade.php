@extends('layouts.app')

@section('content')

    <h2>チュートリアル</h2>
    <div class="row mb-4">
        @if(count($tutorials)>0)
            @include ('tutorials.tutorial')
        @endif
    </div>

@endsection