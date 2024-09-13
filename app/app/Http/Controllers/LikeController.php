<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Like;

use Commnet;

class LikeController extends Controller
{
    public function store($commentId)
    {
        Auth::user()->like($commentId);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($commentId)
    {
        Auth::user()->unlike($commentId);
        return 'ok!'; //レスポンス内容
    }

    
}

