<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function FollowList(){
        $follows = DB::table('follows')
            ->join('users','follows.follow','users.id')
        //  ※join('テーブル名','テーブルカラム名(外部キー)','テーブルカラム名(主キー)')
            ->where('follower', '=', Auth::id())
        //　※where('カラム名','オペレーター','比較、絞るための値')
            ->get();
        // dd($follows);
        $posts = DB::table('posts')
        ->join('users','posts.user_id','users.id')
        ->join('follows','users.id','follows.follow')
        ->where('posts.user_id', '!=', Auth::id())
        ->where('follows.follower','=',Auth::id())
        ->get();
        // dd($posts);
        return view('follows.followList', [
            'follows'=>$follows,
            'posts'=>$posts
        ]);
    }




    public function followerList(){
        $follows = DB::table('follows')
            ->join('users','follows.follower','users.id')
            ->where('follow','=',Auth::id())
            ->get();
        //   dd($follows);

        $posts = DB::table('posts')
        ->join('users','posts.user_id','users.id')
        ->join('follows','users.id','follows.follower')
        ->where('posts.user_id', '!=', Auth::id())
        ->where('follows.follow','=',Auth::id())
        ->get();
        //   dd($posts);
        return view('follows.followerList',[
            'follows'=>$follows,
            'posts'=>$posts
        ]);
    }





    public function addfollow(Request $request){
        $id = $request->id;
        DB::table('follows')
        ->insert([
            'follower' => Auth::id(),
            'follow' => $id,
        ]);
        return back();

    }
    public function delfollow(Request $request){
        $id = $request->id;
        // dd($id);
        // dd(Auth::id());
        DB::table('follows')
            ->where('follower', Auth::id())
            ->where('follow',$id)
            ->delete();
        return back();

    }



}
