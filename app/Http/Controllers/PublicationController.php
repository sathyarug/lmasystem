<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Publication;
use App\Language;
use App\Highlight;



//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class PublicationController extends Controller
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
        $publications = Publication::all(); 
       
        return view('publication.index',compact('publications'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::all();
       // return $languages;
        return view('publication.create',compact('languages'));
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
            'type'=>'required',
            'language_id'=>'required',
            'frequency'=>'required',
            'c_rate'=>'required',
            'b_rate'=>'required',
            'bc1_rate'=>'required',
            'bc2_rate'=>'required',
            'c_width'=>'required',
            
        ]);

        $name = $request['name'];
        $type = $request['type'];
        $language_id = $request['language_id'];
        $frequency = $request['frequency'];
        $c_rate = $request['c_rate'];
        $b_rate = $request['b_rate'];
        $bc1_rate = $request['bc1_rate'];
        $bc2_rate = $request['bc2_rate'];
        $c_width = $request['c_width'];

        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $publication = new Publication();
        $publication->name = $name;
        $publication->type = $type;
        $publication->language_id = $language_id;
        $publication->frequency = $frequency;
        $publication->c_rate = $c_rate;
        $publication->b_rate = $b_rate;
        $publication->bc1_rate = $bc1_rate;
        $publication->bc2_rate = $bc2_rate;
        $publication->c_width = $c_width;
        $publication->user_created = $user;
        $publication->user_edited = $user;
        $publication->ip_created = $ip;
        $publication->ip_edited = $ip;
        $result = $publication->save();


        return redirect()->route('publications.index')
            ->with('flash_message',
             'Publication '. $publication->name.' added!');
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
         $publication = Publication::findOrFail($id);
         $languages = Language::all();

        return view('publication.edit', compact('publication','languages'));
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

       
        $publication = Publication::findOrFail($id);
         $this->validate($request, [
            'name'=>'required|min:3|max:40',
            'type'=>'required',
            'language_id'=>'required',
            'frequency'=>'required',
            'c_rate'=>'required',
            'b_rate'=>'required',
            'bc1_rate'=>'required',
            'bc2_rate'=>'required',
            'c_width'=>'required',
            
        ]);

        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $input = $request->all();
        $input['ip_edited'] = $ip;
        $input['user_edited'] = $user;
        $publication->fill($input)->save();

        return redirect()->route('publications.index')
            ->with('flash_message',
             'Publication '. $publication->name.' updated!');



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
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('publications.index')
            ->with('flash_message',
             'Publication deleted!');
    }
}
