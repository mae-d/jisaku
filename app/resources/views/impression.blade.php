@extends('layout')
@section('content')
<main class='py-4'>
<div class="col-md-9 mx-auto">
    <div class="row justify-content-around">
<h3>{{ $titles->name }}</h3>
    </div>
    <div class="card" style="width: 62rem;">
    <div class="card-header">
        <table class='table'>
    <thead>
        <tr class="table-secondary">
            <th scope='col'>感想投稿一覧</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
        
            <tr class="table-info">
                <th scope='col'>{{ $comment['comment'] }}</th>
                <th scope='col'><button onclick="like({{$comment->id}})">いいね</button></th>
                <th scope='col'><button onclick="unlike({{$comment->id}})">いいね解除</button></th>
                <th scope='col'>{{ $comment->likes_count }}</th>
            </tr>
        
        @endforeach
        </tbody>
        </table>
        <div class="text-center">
            {{ $comments->links() }}
        </div>
        <a href="{{ route('create.impression', ['id' => $id]) }}">
    <button type='button' class='btn btn-primary'>投稿する</button>
    </a>
                </div>
                </div>

</main>
@endsection