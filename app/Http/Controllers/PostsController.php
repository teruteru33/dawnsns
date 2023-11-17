<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index(){
        $posts = DB::table('posts')
        ->join('users','posts.user_id','users.id')
        ->get();
        // dd($posts);
        return view('posts.index',['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $id = Auth::id();
        DB::table('posts')->insert([
            'posts' => $post,
             'user_id' => $id
        ]);

        return redirect('/top');
    }

    public function delete($id){

        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }


    public function edit(Request $request){
        $id = $request->input('id');
        $post = $request->input('upPost');
        // dd($post);
        DB::table('posts')
            ->where('id', $id)
            ->update(['posts' =>$post]);

        return redirect('/top');
    }








}
