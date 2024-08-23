<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Game;

use App\Comment;

class RegistrationController extends Controller
{
    public function createImpressionForm() {
        return view('impression_form');
    }

    public function createImpression(Request $request) {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->save();

        return redirect('/game.detail');
    }
}
