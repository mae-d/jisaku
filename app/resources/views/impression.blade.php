@extends('layout')
@section('content')
<main class='py-4'>
<div class="col-md-9 mx-auto">
    <div class="row justify-content-around">
<h3>{{ $titles->name }}</h3>
<a href="{{ route('create.impression', ['id' => $id]) }}">
    <button type='button' class='btn btn-primary'>投稿する</button>
    </a>
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
                @if (!$comment->isLikedBy(Auth::user()))
                <th scope='col'>
                    <button id='<?php echo $comment->id ?>' class='like likes-btn{{ $comment->id }}'  onclick="like({{$comment->id}})" data-id='{{ $comment->id }}' >いいね</button>
                </th>
                @else
                <th scope='col'>
                    <button  class="liked likes-btn{{ $comment->id }}" onclick="like({{$comment->id}})" data-id='{{ $comment->id }}'>いいねしました</button>
                </th>
                @endif
                <th scope='col'>
            <img src="{{ Storage::url($comment['path']) }}" alt="投稿写真はありません" style="width: 200px;">
        </th>

            </tr>
        @endforeach
        </tbody>
        </table>
        <div class="text-center">
            {{ $comments->links() }}
        </div>
        
                </div>
                </div>

</main>

@endsection