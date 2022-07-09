
@foreach ($guidelines as $guideline)
<div class="col-md-3">
    <a href="{{ route('guidelines.show', ['guideline'=>$guideline->id]) }}">
    <div class='card mb-2'>
        <img src='...' alt="カードの画像" class='card-img-top'>
        <div class="card-body">
            <h5 class="card-title">{{ $guideline->title }}</h5>
            <p class="card-text text-right">{{ $guideline->title }}</p>
        </div>
    </div>
    </a>
</div>
@endforeach
