<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Game;

use App\Comment;

use App\User;

class DisplayController extends Controller
{
    public function index(Request $request) {
        $game = new Game;
        $keyword = $request->input('keyword');
        if(empty($keyword)) {
        $games = $game->where('del_flg', '=', '0')->get()->toArray();
        } else {
            $games = $game->where('name', 'Like', "%{$keyword}%")->orWhere('category', 'Like', "%{$keyword}%")->get()->toArray();
        }
        return view('home',compact('keyword'), [
            'games' => $games,
        ]);
    }

    public function gameDetail($game){
        $comment = new Comment;

        $comments = $comment->where('game_id', '=', $game)->get();
        
        return view('impression', [
            'comments' => $comments,
            'id' => $game,
        ]);
    }

    public function myPage(){
        $user = Auth::user()->all();
        $comment = new Comment;
        $comments = $comment->where('user_id', '=', Auth::id())->get();

        return view('mypage',[
            'users' => $user,
            'comments' => $comments,
        ]);
    }
}
