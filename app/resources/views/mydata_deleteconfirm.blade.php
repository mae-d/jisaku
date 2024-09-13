@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">ユーザー情報削除確認ページ</div>
          <div class="card-body">
              <div class="text-center">
                <h4>{{ $users->name }}</h4>
                <h4>{{ $users->email }}</h4>

              </div>
              
              
              <div class="text-center">
                <h3>あなたのデータは完全に削除されます、本当に削除しますか？</h3>
                <a href="{{ route('mydata.delete') }}"><button type="submit" class="btn btn-danger"  onclick='return confirm("こちらの操作を行うとあなたのデータは完全に削除されます。本当に削除しますか？")'>削除する</button></a>
              </div>
         </div>
        </nav>
      </div>
    </div>
  </div>
  @endsection