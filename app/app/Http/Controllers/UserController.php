<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function userEditForm() {
        $user = Auth::user()->all();
        
        return view('user_edit_form',[
            'users' => $user,
        ]);
    }

    public function userEdit(Request $request){
        $user = Auth::user();

        $user->email = $request->email;
        $user->name = $request->name;
        Auth::user()->user()->save($user);

        return redirect('/my.page');
    }

    public function userSoftdeleat(){}
}
