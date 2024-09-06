@extends('layout')
@section('content')
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>ユーザー情報一覧</h4>
                </div>
                <div class="card-body">
                    @foreach($users as $user)
                    <div class='mt-2'>{{ $user['name'] }}</div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <a href="{{ route('user.edit') }}">
                        <button type='button' class='btn btn-primary'>ユーザー情報編集</button>
                    </a>
                </div>
                <div class="card-header">
                <h4 class="text-center">感想投稿一覧</h4>
                </div>
                <div class="card-body">
                    @foreach($comments as $comment)
                    <table>
                        <tr>
                            <th><a haref="{{ route('impression.deleat', ['id' => $comment['id']]) }}">
                                <button type='button' class='btn btn-danger' onclick='return confirm("本当に削除しますか？")'>削除する</button>
                            </a></th>
                            <th class='mt-2'>{{ $comment['comment'] }}</th>
                        </tr>
                    </table>
                    @endforeach
                    <div>
                        {{ $comments->links() }}
                    </div>
                </div>
                             
@endsection