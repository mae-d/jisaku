<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\User;
use App\Game;
use App\Comment;

class admin_RegistrationController extends Controller
{
    public function createGameForm(){

        return view('admin/game_form');
    }

    public function createGame(Request $request){
        $game = new Game;
        
        $game->name = $request->name;
        $game->category = $request->category;
        $game->model = $request->model;

        $game->save();

        return redirect('admin/home');
    }

    public function userDelete($id){
        $user = new User;

        $users = $user->where('id', '=', $id)->first();

        $users->delete();

        return redirect('admin/home');
    }
}
