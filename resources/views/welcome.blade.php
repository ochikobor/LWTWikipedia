@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <form action="{{ route('posts.index') }}" method="GET" class='input-group mb-4'>
            <input type="text" name="keyword" class="form-control" class="form-control">
            <input type="submit" value="検索" class="btn btn-default">
        </form>

        <h2 class="mb-4">New</h2>
        
        <div class="row mb-4">
            @if(count($guidelines)>0)
                @include ('guidelines.guideline')
            @endif
        </div>
        
        <h2>Pick UP</h2>
        <div  class="mb-4">
            記事をおく
        </div>
    
        {{-- ガイドライン作成ページへのリンク --}}

        
        @else
            <div class="center jumbotron">
                <div class="text-center">
                    <h1>LWTWikipedia</h1>
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            </div>
    @endif
@endsection