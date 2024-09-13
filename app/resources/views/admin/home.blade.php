@extends('admin/admin_layout')
@section('content')
<main class="py-4">
    <div class="col-md-9 mx-auto">
    <div class="row justify-content-around">
            <a href="{{ route('create.game') }}">
                <button type='button' class='btn btn-primary'>ゲームタイトル追加</button>
            </a>
    </div>
    <div class="card" style="width: 62rem;">
    <div class="card-header">
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class='text-center'>管理者ページへようこそ</h4>
                </div>
                <div class="card-title">
                <h3 class='text-center'> ユーザー情報一覧</h3>
                </div>
                <div class="card-body">
                <form action="{{ route('admin.home') }}" method="GET">
            <input type="text" name="keyword" placeholder="ユーザー検索" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>
        <table class='table'>
    <thead>
        <tr class="table-secondary">
            <th scope='col'>詳細へ</th>
            <th scope='col'>ユーザー名</th>
            <th scope='col'>ユーザーメール</th>
            <th scope='col'>登録日</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="table-info">
                <th scope='col'><a href="{{ route('user.detail', ['id' => $user['id']]) }}">詳細</a></th>
                <th scope='col'>{{ $user['name'] }}</th>
                <th scope='col'>{{ $user['email'] }}</th>
                <th scope='col'>{{ $user['created_at'] }}</th>
            </tr>
        @endforeach
        </tbody>
        </table>
        <div class="text-center">
            {{ $users->links() }}
        </div>
                </div>
                </div>

</main>



@endsection