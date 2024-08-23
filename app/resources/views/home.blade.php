@extends('layout')
@section('content')
<main>
    <div>
        <form action="" method="GET">
            <input type="text" name="name" placeholder="ゲームタイトルを探す" value="">
            <input type="submit" value="検索">
        </form>
    </div>
    <table>
        <th>全機種</th>
        <th>スマホ</th>
        <th>PS5</th>
        <th>Switch</th>
        <th>PC</th>
    </table>
    <tbody>
        @foreach($games as $game)
        <tr>
            <th scope='col'><a href="{{ route('game.detail', ['game' => $game['id']]) }}">{{ $game['name'] }}</a></th>
        </tr>
        @endforeach
    </tbody>
</main>



@endsection