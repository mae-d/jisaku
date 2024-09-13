@extends('admin/admin_layout')
@section('content')
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>ゲームタイトル追加</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>    
                        <form action="{{ route('create.game') }}" method="post">
                            @csrf
                            <label for='name'>ゲームタイトル</label>
                                <input type='text' class='form-control' name='name' value="{{ old('name') }}"/>
                            <label for='category' class='mt-2'>ゲームジャンル</label>
                                <input type='text' class='form-control' name='category' value="{{ old('category') }}"/>
                                <label for='model' class='mt-2'>ゲームハード</label>
                                <input type='text' class='form-control' name='model' value="{{ old('model') }}"/>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection