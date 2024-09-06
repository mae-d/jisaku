@extends('admin/admin_layout')
@section('content')
<main class="py-4">
    <div class="col-md-9 mx-auto">
    <div class="card" style="width: 62rem;">
    <div class="card-header">
    <h4 class='text-center'>ユーザー情報一覧</h4>
    <a href="">
                <button type='button' class='btn btn-danger' onclick='return confirm("本当に削除しますか？")'>ユーザー削除</button>
            </a>
    <div class="card-title">
                <h5 class='text-center'>{{ $users->name }}</h5>
            <table class='table'> 
                <thead>
                <tr class="table-secondary">   
                    <th scope='col'>ユーザーコメント</th>
                    <th scope='col'>投稿日</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr class="table-info">
                    <th scope='col'>{{ $comment['comment'] }}</th>
                    <th scope='col'>{{ $comment['created_at'] }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
            {{ $comments->links() }}
        </div>
                </div>
</div>
</div>
</div>
</main>
@endsection