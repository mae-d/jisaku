<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Like;
use Commnet;
use User;

class LikeController extends Controller
{

            public function store($commentId)
            {
                
                Auth::user()->like($commentId);
                return response()->json($commentId); //レスポンス内容
            }
        


}


    


