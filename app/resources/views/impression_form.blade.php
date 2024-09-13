@extends('layout')
@section('content')
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>感想投稿</h4>
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
                        <form action="{{ route('create.impression', ['id' => $id]) }}" method="post">
                            @csrf
                            <label for='comment' class='mt-2'>感想</label>
                                <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
                            <input type='hidden' name='game_id' value="{{ $id }}">
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>投稿する</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection