<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Game;

use App\Comment;

class DisplayController extends Controller
{
    public function index() {
        $game = new Game;

        $games = $game->all()->toArray();

        return view('home', [
            'games' => $games,
        ]);
    }

    public function gameDetail($game){
        $comment = new Comment;

        $comments = $comment->where('game_id', '=', $game)->get();

        return view('impression', [
            'comments' => $comments,
        ]);
    }
}
