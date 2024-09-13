<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateData;

use App\Game;

use App\Comment;

class RegistrationController extends Controller
{
    public function createImpressionForm($id) {
        
        return view('impression_form',[
            'id' => $id,
        ]);
    }

    public function createImpression(CreateData $request) {
        $comment = new Comment;
        
        $comment->game_id = $request->game_id;
        $comment->comment = $request->comment;

        Auth::user()->comment()->save($comment);

        return redirect('/');
    }

    public function impressionDeleat($id) {
        $comment = new Comment;

        $comment->where('id', '=', $id)->delete();

        return redirect('/');
    }
}
