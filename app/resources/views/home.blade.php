@extends('layout')
@section('content')
<main class="py-4">
<div class="col-md-9 mx-auto">
    <div class="card" style="width: 62rem;">
    <div class="card-header">
                    <h4 class='text-center'>ゲームタイトル一覧</h4>
                </div>
        <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword" placeholder="ゲームタイトルを探す" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>
        
    <table>
        <th><a href="{{ route('index') }}">全機種</a></th>
        <th>PS5</th>
        <th>Switch</th>
    </table>

    <table class='table'>
    <thead>
        <tr class="table-secondary">
            <th scope='col'>機種</th>
            <th scope='col'>ジャンル</th>
            <th scope='col'>タイトル</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr class="table-info">
                <th scope='col'>{{ $game['model'] }}</th>
                <th scope='col'>{{ $game['category'] }}</th>
                <th scope='col'><a href="{{ route('game.detail', ['game' => $game['id']]) }}">{{ $game['name'] }}</a></th>
            </tr>
        @endforeach
        </tbody>
        </table>
        <div class="text-center">
            {{ $games->links() }}
        </div>
    </div>
    </div>
    <!-- <a href="{{ route('images') }}">ゲームの面白いスクショなど</a> -->

</main>



@endsection