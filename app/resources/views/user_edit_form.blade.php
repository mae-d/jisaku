@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">ユーザー情報編集</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('user.edit') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email"  value="{{ $users->email }}" />
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}" />
              </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">編集する</button>
              </div>
            </form>
         </div>
        </nav>
      </div>
    </div>
  </div>
  @endsection