@extends('layout')
@section('content')
<main class='py-4'>
    <div>ゲームタイトル</div>
    <table>
        @foreach($comments as $comment)
        <tr>
            <th scop='col'>{{ $comment['comment'] }}</th>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('create.impression', ['id' => $id]) }}">
    <button type='button' class='btn btn-primary'>投稿する</button>
    </a>
</main>
@endsection