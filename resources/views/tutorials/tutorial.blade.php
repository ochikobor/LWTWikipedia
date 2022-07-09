
@foreach ($tutorials as $tutorial)
<div class="col-md-3">
    <a href="{{ route('tutorials.show', ['tutorial'=>$tutorial->id]) }}">
    <div class='card mb-2'>
        <img src='...' alt="カードの画像" class='card-img-top'>
        <div class="card-body">
            <h5 class="card-title">{{ $tutorial->title }}</h5>
            <p class="card-text text-right">{{ $tutorial->title }}</p>
        </div>
    </div>
    </a>
</div>
@endforeach
