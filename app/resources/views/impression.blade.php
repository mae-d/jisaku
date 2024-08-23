@extends('layout')
@section('content')
<main>
    <div>ゲームタイトル</div>
    <table>
        @foreach($comments as $comment)
        <tr>
            <th scop='col'>{{ $comment['comment'] }}</th>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('create.impression') }}">
    <button type='button' class='btn btn-primary'>投稿する</button>
    </a>
</main>
@endsection