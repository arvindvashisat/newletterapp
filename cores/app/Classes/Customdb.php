<?php

namespace App\Classes;
use DB;
use App\Helpers\Helper;
use App\Models\Post;
use App\Models\Subscription;

use Illuminate\Support\Facades\Hash;
class Customdb
{
	function postList(){
		return $list = Post::get();
	}
	function addSubcribe($request){
		$subscribe = new Subscription;
		$subscribe->web_id = $request->web_id;
		$subscribe->name = $request->name;
		$subscribe->email = $request->email;
		if($subscribe->save()){
			return $subscribe;
		}else{
			return false;
		}

	}
	function savePost($request){
		$post = new Post();
		$post->user_id = $request->user_id;
		$post->web_id = $request->web_id;
		$post->post_heading = $request->post_heading;
		$post->description = $request->description;
		if($post->description){
			return $post;
		}else{
			return false;
		}
		
	}
}