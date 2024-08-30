@extends('layout')
@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
    <div class="card">
    <div class="card-header">
                    <h4 class='text-center'>ゲームタイトル一覧</h4>
                </div>
        <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword" placeholder="ゲームタイトルを探す" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>
        
    <table>
        <th>全機種</th>
        <th>PS5</th>
        <th>Switch</th>
    </table>

    <tbody>
        @foreach($games as $game)
        <tr>
            <th scope='col'><a href="{{ route('game.detail', ['game' => $game['id']]) }}">{{ $game['name'] }}</a></th>
        </tr>
        @endforeach

    </div>
    </div>
    </tbody>
</main>



@endsection