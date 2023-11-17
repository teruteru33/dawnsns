<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }




    public function search(Request $request){
        $username = $request->input('searchUser');
        $id = Auth::id();
        if(isset($username)){
            $users = DB::table('users')
                ->where('username', 'like', "%$username%")
                ->get();
        }else{
            $users = DB::table('users')->get();
        }
        // dd($users);
        $following = DB::table('follows')
        ->where('follower', '=', Auth::id())
        ->pluck('follow');

        return view('users.search', compact('users', 'following','username'));
    }

    public function profileUp(Request $request){
        $username = $request->input('username');
        // dd($username);
        $mailadress = $request->input('mailadress');
        // dd($mailadress);
        $password = $request->input('password');
        // dd($password);
        $newpassword = $request->input('newpassword');
            if(isset($password)){
                $password = DB::table('users')
                    ->where('password', '=', '')
                    ->get();
            }else{
                $possword = DB::table('possword')->get();
            }

        $bio = $request->input('bio');
        // dd($bio);
         DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' =>$username,
                'mail' =>$mailadress,
                'bio' =>$bio,
            ]);


        return back();
    }




}
