<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Tag;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('tags.create');

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
        $this->validate($request, [
            'name'=>'required|min:3|max:40',
        ]);

        $name = $request['name'];
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $tag = new Tag();
        $tag->name = $name;
        $tag->user_created = $user;
        $tag->user_edited = $user;
        $tag->ip_created = $ip;
        $tag->ip_edited = $ip;
        $tag->save();
        return redirect()->route('tags.index')
            ->with('flash_message',
             'Tag '. $tag->name.' added!');
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
        $tag = Tag::findOrFail($id);

        return view('tags.edit', compact('tag'));
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
        $tag = Tag::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|min:3|max:40',
        ]);
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $input = $request->all();
        $input['ip_edited'] = $ip;
        $input['user_edited'] = $user;
        $tag->fill($input)->save();

        return redirect()->route('tags.index')
            ->with('flash_message',
             'Tag'. $tag->name.' updated!');
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
