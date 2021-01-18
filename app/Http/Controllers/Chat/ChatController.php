<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ChatMessages;
use App\Models\ChatFriends;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userid = Auth::id();
      $userdata = User::where('id', $userid)->first();
      // dd($userdata);

      return \View::make('inbox')->with(compact('userdata'));
    }

    public function send(Request $request)
    {
        $type = 0;
      $file = $request->file('file');
      if($file != ''){
        $type = 1;
      }else{
        $type = 0;
      }

      $is_group = 0;
      $group_id = 0;
      $group = $request->input('is_group');
      if($group != ''){
        $is_group = 1;
        $group_id = $request->input('group_id');
      }else{
        $is_group = 0;
        $group_id = 0;
      }
      
      $data = [
        'sender_id' => $request->input('sender_id'),
        'receiver_id' => $request->input('receiver_id'),
        'receiver_name' => $request->input('receiver_name'),
        'sender_name' => $request->input('sender_name'),
        'is_group' => $is_group,
        'group_id' => $group_id,
        'message' => $request->input('message'),
        'message_type' => $type,
      ];
      if($file != ''){
        $filename= $file->getClientOriginalName();
        // $imagename= 'message-'.time().'-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
        $extension= $file->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('chat_images');
        $file->move($destinationpath, $imagename);
        $data['file'] = $imagename;
      }
      //dd($data);
      $Insert = ChatMessages::insert($data);
    }

    public function friends(Request $request){
      $friendsdata = [
        'receiver_id' => $request->input('receiver_id'),
        'sender_id' => $request->input('sender_id'),
        'receiver_name' => $request->input('receiver_name'),
        'sender_name' => $request->input('sender_name'),
        'receiver_image' => $request->input('receiver_image'),
        'sender_image' => $request->input('sender_image'),
      ];

      // dd($friendsdata);
      $receiver_id = $request->input('receiver_id');
      $sender_id = $request->input('sender_id');

      $getfriends = DB::table('chat_friends')->orWhere(function($q) use ($sender_id, $receiver_id){
         $q->where('sender_id', $sender_id)
           ->where('receiver_id', $receiver_id);
      })->orWhere(function($h) use ($sender_id, $receiver_id){
         $h->where('sender_id', $receiver_id)
           ->where('receiver_id', $sender_id);
      })->get();
      // dd($getfriends);
      if(count($getfriends) == ''){
        $insertFriend = ChatFriends::insert($friendsdata); 
        // DB::table('chat_friends')->insert($friendsdata);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
      }else{
        return redirect('/inbox');
      }

    }


    public function friendsList(Request $request, $id){

      $getfriends = ChatFriends::orWhere('sender_id',$id)->orWhere('receiver_id',$id)->with('user')->get();
       // dd($getfriends);
      return $getfriends;

    }


    public function singleChat(Request $request){

      $receiver_id = $request->input('receiver_id');
      $sender_id = $request->input('sender_id');

      $getsingleChat = DB::table('chat_messages')
       ->orWhere(function($q) use ($sender_id, $receiver_id){
         $q->where('sender_id', $sender_id)
           ->where('receiver_id', $receiver_id);
    })->orWhere(function($h) use ($sender_id, $receiver_id){
         $h->where('sender_id', $receiver_id)
           ->where('receiver_id', $sender_id);
    })->get();
      // dd($getsingleChat);
      return $getsingleChat;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
