<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ChangeStateRequest;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard', ['users' => User::all()]);
    }
    public function update_statut(ChangeStateRequest $request){
        $data = $request->validated();
        $user = User::find($request->user_id);
        $user->is_admin = $request->statut=="admin"?1:0;
        $user->save();
        return redirect()->back();
    }
}
