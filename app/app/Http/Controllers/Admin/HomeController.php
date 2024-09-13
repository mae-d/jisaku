<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Game;
use App\Comment;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $user = New User;

        $keyword = $request->input('keyword');
        
        if(empty($keyword)) {
            $users = $user->orderByDesc('name')->paginate(10);
            } else {
                $users = $user->where('name', 'Like', "%{$keyword}%")->orderByDesc('created_at')->paginate(10);
            }

        return view('admin.home',compact('keyword'),[
            'users' => $users,
        ]);
    }

    public function userDetail($id)
    {
        $comment = New Comment;
        $user = New User;

        $users = $user->where('id', '=', $id)->first();
        $comments = $comment->where('user_id', '=', $id)->orderByDesc('created_at')->paginate(10);

        return view('admin/user_detail',[
            'comments' => $comments,
            'users' => $users,
        ]);
    }


}
