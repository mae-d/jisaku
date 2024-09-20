<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Game;

use App\Comment;

use App\User;

use App\Image;

use App\Like;

class DisplayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    public function index(Request $request) {
        $game = new Game;
        $keyword = $request->input('keyword');
        if(empty($keyword)) {
        $games = $game->where('del_flg', '=', '0')->orderByDesc('name')->paginate(10);
        } else {
            $games = $game->where('name', 'Like', "%{$keyword}%")->orWhere('category', 'Like', "%{$keyword}%")->orderByDesc('name')->paginate(10);
        }
        return view('home',compact('keyword'), [
            'games' => $games,
        ]);
    }

    public function gameDetail(Request $request ,$game){
        $comment = new Comment;
        $title = new Game;
 
        $titles = $title->where('id', '=', $game)->first();
        $comments = $comment->where('game_id', '=', $game)->orderByDesc('created_at')->paginate(10);
        

        
        return view('impression', [
            'comments' => $comments,
            'id' => $game,
            'titles' => $titles,
        ]);
    }

    public function myPage(){
        $user = Auth::user();
        $comment = new Comment;
        $comments = $comment->where('user_id', '=', Auth::id())->orderByDesc('created_at')->paginate(10);

        return view('mypage',[
            'users' => $user,
            'comments' => $comments,
        ]);
    }
}
