<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Customdb;
use App\Models\Subscription;
use Validator;
use App\Rules\MakeUniqRule;
use Illuminate\Validation\Rule;
use App\Jobs\SendEmail;
use App\Models\Job;
class PostController extends Controller
{
	public $successStatus = 200;
	public function listpost(){
        $listData = Customdb::postList();
        return response()->json(['success' => true, 'post' => $listData], $this-> successStatus);
       
    }
    public function subscribe(Request $request){
    	$validator = Validator::make($request->all(), [
            'web_id' => ['required',Rule::unique('subscriptions')->where(fn ($query) => $query->where(['email'=> $request->email,'web_id' => $request->web_id]))],
            'name' => 'required',
            'email' => 'required|email'
        ]);
    	
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>'Form validation failed' ,'error_messages'=>$validator->errors()], 202);
        }

        $addData = Customdb::addSubcribe($request);
        if($addData == false){
        	return response()->json(['success'=>false, 'error'=>'Db error' ,'error_messages'=>"Something worng please retry"], 401);
        	
        }else{
        	return response()->json(['success' => true, 'subcribe' => $addData], $this-> successStatus);
        }
        
       
    }
    public function post(Request $request){
    	$validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'web_id' => 'required',
            'post_heading' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>'Form validation failed' ,'error_messages'=>$validator->errors()], 202);
        }
        
        
        $savePost = Customdb::savePost($request);
        if($savePost == false){
        	return response()->json(['success'=>false, 'error'=>'Db error' ,'error_messages'=>"Something worng please retry"], 401);
        	
        }else{
        	$mail_data = [
            'webId' => $savePost->web_id
        	];
        	SendEmail::dispatch($mail_data)->onQueue('processing');;
        	// $job = (new SendEmail($mail_data))->delay(now()->addSeconds(2)); 

        	// dispatch($job);
        	return response()->json(['success' => true, 'post' => $savePost], $this-> successStatus);
        }
    }
}
  