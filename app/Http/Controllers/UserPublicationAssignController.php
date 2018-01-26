<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Publication;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserPublicationAssignController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth'); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::role('Press')->get(); 
        return view('userpublications.index',compact('users'));

    }

    public function list($id)
    {
        $user = User::findOrFail($id);
       
        $publications = Publication::pluck('name','id')->all();
        // $publications = Publication::whereDoesntHave('users',function($q) use ($user){
        //     $q->where('user_id',$user);
        // })->get();
        // print_r($publications);
        // exit;
        return view('userpublications.publication',compact('user','publications'));
       // return($subcategories[1]->categor->name);
        // return $publications;

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
        $ip  = $request->ip();
        $login_user = \Auth::user()->id;
        $user = User::findOrFail($request->user_id);

        $publication = Publication::find($request->publication_id);

        if ($user->publications->contains($publication)) {

          return redirect()->route('user.publication.list', $request->user_id)
            ->with('flash_message',
             ' Publication'. $publication->name.' Already Exsist');

        } 
        else {

          
          $user->publications()->attach(
            [$request->publication_id => ['upload_status' => $request->upload_status,'tag_status' => $request->tag_status,'user_created' => $login_user,'user_edited' => $login_user,'ip_created' => $ip,'ip_edited' => $ip]]
          );

          return redirect()->route('user.publication.list', $request->user_id)
            ->with('flash_message',
             ' Publication'. $publication->name.' Added');

        }

        
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


      return $id;
    }
    public function remove($user_id, $publication_id)
    {
        
        $user = User::findOrFail($user_id);
        $publication = Publication::findOrFail($publication_id);
        $user->publications()->detach($publication->id);   
        return redirect()->route('user.publication.list', $user->id)
            ->with('flash_message',
             ' Publication'. $publication->name.' Removed');   
      
    }
}
