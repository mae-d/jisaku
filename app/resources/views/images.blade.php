@extends('layout')
@section('content')
<div class="row justify-content-around">
            <a href="{{ route('create') }}">
                <button type='button' class='btn btn-primary'>画像投稿ボタン</button>
            </a>
    </div>
<div class="bl_imgWrapper">
        @foreach ($images as $image)
        <div class="bl_imgContainer">
            <img src="{{ Storage::url($image->path) }}" alt="投稿用画面">
        </div>
        @endforeach
    </div>
    
@endsection