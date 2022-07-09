@extends('layouts.app')

@section('content')

    <h2>ガイドライン</h2>
    <div class="row mb-4">
        @if(count($guidelines)>0)
            @include ('guidelines.guideline')
        @endif
    </div>

@endsection