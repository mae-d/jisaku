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
        $user = Auth::user();
        
        return view('user_edit_form',[
            'users' => $user,
        ]);
    }

    public function userEdit(Request $request){
        $user = Auth::user();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return redirect('/');
    }

    public function mydataDeleteConfirm() {
        $user = Auth::user();

        return view('mydata_deleteconfirm',[
            'users' => $user,
        ]);
    }

    public function mydataDelete() {
        $user = Auth::user();

        Auth::logout();
        $user->delete();
        
        return redirect("/");
    }

}
